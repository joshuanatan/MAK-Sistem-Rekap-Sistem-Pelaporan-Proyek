<?php
date_default_timezone_set("Asia/Jakarta");
class Sch_sirup extends CI_Controller{
  public function reset_status_query(){
    $sql = "update mstr_pencarian_sirup set pencarian_sirup_status_query_today = 0";
    executeQuery($sql);
  }
  public function query_sirup(){
    $sql = "select * from mstr_pencarian_sirup where pencarian_sirup_status_query_today = 0 limit 1";
    $result = executeQuery($sql);
    $result = $result->result_array();
    if(count($result) != 0){
      $id_pk_pencarian_sirup = $result[0]["id_pk_pencarian_sirup"];
      $pencarian_sirup_tahun = $result[0]["pencarian_sirup_tahun"];
      $pencarian_sirup_frase = urlencode($result[0]["pencarian_sirup_frase"]);
      $pencarian_sirup_jenis = $result[0]["pencarian_sirup_jenis"];
      $search_phrase = $result[0]["pencarian_sirup_frase"]." ".$pencarian_sirup_tahun." ".$pencarian_sirup_jenis;
      $amount = 5000;

      $url = "https://sirup.lkpp.go.id/sirup/ro/cari/search?tahunAnggaran=".$pencarian_sirup_tahun."&keyword=".$pencarian_sirup_frase."&jenisPengadaan=$pencarian_sirup_jenis&metodePengadaan=0&draw=1&order%5B0%5D%5Bcolumn%5D=5&order%5B0%5D%5Bdir%5D=DESC&start=0&length=".$amount."&search%5Bvalue%5D=&search%5Bregex%5D=false";

      $curl = curl_init();
      curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
      ));
      $info = curl_getinfo($curl);
      $response = curl_exec($curl);
      #$response = json_decode($response,true);
      
      $data = array(
        "sirup_general" => $response,
        "id_fk_pencarian_sirup" => $id_pk_pencarian_sirup,
        "sirup_general_tgl_create" => date("Y-m-d H:i:s")
      );
      insertRow("temp_sirup_general",$data);

      $where = array(
        "id_pk_pencarian_sirup" => $id_pk_pencarian_sirup
      );
      $data = array(
        "pencarian_sirup_last_checkpoint" => date("Y-m-d H:i:s"),
        "pencarian_sirup_status_query_today" => 1
      );
      updateRow("mstr_pencarian_sirup",$data,$where);
    }
  }
  public function query_sirup_detail(){
    $sql = "
    select * from temp_sirup_general 
    inner join mstr_pencarian_sirup on mstr_pencarian_sirup.id_pk_pencarian_sirup = temp_sirup_general.id_fk_pencarian_sirup 
    where sirup_general_status_query_today	= 0 and sirup_general is not null limit 1";
    $result = executeQuery($sql);
    $result = $result->result_array();
    print_r($result);
    if(count($result) != 0){
      $this->load->model("m_sirup");
      $id_pk_sirup_general = $result[0]["id_pk_sirup_general"];
      $sirup_general = $result[0]["sirup_general"];
      $id_pk_pencarian_sirup = $result[0]["id_fk_pencarian_sirup"];
      $search_phrase = $result[0]["pencarian_sirup_frase"];

      $sirup_general = json_decode($sirup_general,true);
      
      $response_data_count = count($sirup_general["data"]);
      $response_data_var = $sirup_general["data"];
      for($b = 0; $b<$response_data_count; $b++){
        $id = str_replace(" ","",$response_data_var[$b]["id"]);
        $pagu = $response_data_var[$b]["pagu"];
        if($this->m_sirup->is_id_exists($id)){
          echo $id;
          continue;
        }
        $url = "https://sirup.lkpp.go.id/sirup/home/detailPaketPenyediaPublic2017/".$id;
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        
        $dom = new domDocument;
        $dom->loadHTML($response);
        $content = $dom->getElementById("detil");
        $response = strval($content->nodeValue);
        $response = preg_replace('/\s+/', ' ', $response);
        $response = preg_replace('/\t+/', ' ', $response);
        $response = preg_replace('/\n\r+/', '', $response);
        $this->extract_data($response,$pagu,$id_pk_pencarian_sirup, $search_phrase);
        sleep(3);
      }
      $where = array(
        "id_pk_sirup_general" => $id_pk_sirup_general
      );
      $data = array(
        "sirup_general_last_checkpoint" => date("Y-m-d H:i:s"),
        "sirup_general_status_query_today" => 1
      );
      updateRow("temp_sirup_general",$data,$where);
    }
  }  
  private function extract_data($response, $sirup_total, $id_fk_pencarian_sirup, $search_phrase){
    #asumsi history paket aja yang beda
    $sirup_rup = str_replace(" ","",explode("Nama Paket",explode("Kode RUP",$response)[1])[0]);
    $sirup_paket = explode("Nama KLPD",explode("Nama Paket",$response)[1])[0];
    $sirup_klpd = explode("Satuan Kerja",explode("Nama KLPD",$response)[1])[0];
    $sirup_satuan_kerja = explode("Tahun Anggaran",explode("Satuan Kerja",$response)[1])[0];
    $sirup_tahun_anggaran = explode("Lokasi Pekerjaan",explode("Tahun Anggaran",$response)[1])[0];
    $sirup_volume_pekerjaan = explode("Uraian Pekerjaan",explode("Volume Pekerjaan",$response)[1])[0];
    $sirup_uraian_pekerjaan = explode("Spesifikasi Pekerjaan",explode("Uraian Pekerjaan",$response)[1])[0];
    $sirup_spesifikasi_pekerjaan = explode("Produk Dalam Negeri",explode("Spesifikasi Pekerjaan",$response)[1])[0];
    $sirup_produk_dalam_negri = explode("Usaha Kecil",explode("Produk Dalam Negeri",$response)[1])[0];
    $sirup_usaha_kecil = explode("Pra DIPA / DPA",explode("Usaha Kecil",$response)[1])[0];
    $sirup_pra_dipa = explode("Sumber Dana",explode("Pra DIPA / DPA",$response)[1])[0];
    $sirup_jenis_pengadaan = explode("Total Pagu",explode("Jenis Pengadaan",$response)[1])[0];
    $sirup_metode_pemilihan = explode("Pemanfaatan Barang/Jasa",explode("Metode Pemilihan",$response)[1])[0];
    $sirup_histori_paket = "";
    $sirup_tgl_perbarui_paket = explode("Tanggal Perbarui Paket",$response)[1];

    $lokasi_pekerjaan = explode("Volume Pekerjaan",explode("Lokasi Pekerjaan No. Provinsi Kabupaten/Kota Detail Lokasi",$response)[1])[0];
    $sumber_dana = explode("Total Pagu",explode("Sumber Dana No. Sumber Dana T.A. KLPD MAK Pagu",$response)[1])[0];
    #echo "sumberdana atas:".$sumber_dana;
    $pemanfaatan_barang = explode("Jadwal Pelaksanaan Kontrak Mulai Akhir",explode("Pemanfaatan Barang/Jasa Mulai Akhir",$response)[1])[0];
    $jadwal_pelaksanaan = explode("Jadwal Pemilihan Penyedia Mulai Akhir",explode("Jadwal Pelaksanaan Kontrak Mulai Akhir",$response)[1])[0];
    $pemilihan_penyedia = "";
    if (strpos($response, 'History Paket') !== false) {
      $sirup_histori_paket = explode("Tanggal Perbarui Paket",explode("History Paket",$response)[1])[0];
      $pemilihan_penyedia = explode("History Paket",explode("Jadwal Pemilihan Penyedia Mulai Akhir",$response)[1])[0];
    }
    else{
      $pemilihan_penyedia = explode("Tanggal Perbarui Paket",explode("Jadwal Pemilihan Penyedia Mulai Akhir",$response)[1])[0];
    }
    $sirup_id_create = 0;
    if($this->session->id_user != ""){
      $sirup_id_create = $this->session->id_user; 
    }
    $this->load->model("m_sirup");
    if (strpos($sirup_paket, $search_phrase) !== false) {
      $id_pk_sirup = $this->m_sirup->insert($sirup_rup,$sirup_paket,$sirup_klpd,$sirup_satuan_kerja,$sirup_tahun_anggaran,$sirup_volume_pekerjaan,$sirup_uraian_pekerjaan,$sirup_spesifikasi_pekerjaan,$sirup_produk_dalam_negri,$sirup_usaha_kecil,$sirup_pra_dipa,$sirup_jenis_pengadaan,$sirup_total,$sirup_metode_pemilihan,$sirup_histori_paket,$sirup_tgl_perbarui_paket,$sirup_id_create,$id_fk_pencarian_sirup,"aktif",1);
    }
    else{
      $id_pk_sirup = $this->m_sirup->insert($sirup_rup,$sirup_paket,$sirup_klpd,$sirup_satuan_kerja,$sirup_tahun_anggaran,$sirup_volume_pekerjaan,$sirup_uraian_pekerjaan,$sirup_spesifikasi_pekerjaan,$sirup_produk_dalam_negri,$sirup_usaha_kecil,$sirup_pra_dipa,$sirup_jenis_pengadaan,$sirup_total,$sirup_metode_pemilihan,$sirup_histori_paket,$sirup_tgl_perbarui_paket,$sirup_id_create,$id_fk_pencarian_sirup,"aktif",0);
    }

    $preg = '/[0-9]\.\ /';
    $lokasi_pekerjaan = preg_split($preg,$lokasi_pekerjaan);
    for($a = 0; $a<count($lokasi_pekerjaan); $a++){
      if($lokasi_pekerjaan[$a] == ""){
        continue;
      }
      #start dari 1 karena 0 nya pasti blank. Cth data 1. abcdef, nah karena split by 1. , jadinya abcdefnya itu ada di index 1
      #print_r($lokasi_pekerjaan);
      $this->m_sirup->insert_lokasi_pekerjaan($lokasi_pekerjaan[$a],$id_pk_sirup);
    }
    $sumber_dana = preg_split($preg,$sumber_dana);
    for($a = 0; $a<count($sumber_dana); $a++){
      if($sumber_dana[$a] == ""){
        continue;
      }
      #start dari 1 karena 0 nya pasti blank. Cth data 1. abcdef, nah karena split by 1. , jadinya abcdefnya itu ada di index 1
      #print_r($sumber_dana);
      $this->m_sirup->insert_sumber_dana($sumber_dana[$a],$id_pk_sirup);
    }
    $pemanfaatan_barang = preg_split($preg,$pemanfaatan_barang);
    for($a = 0; $a<count($pemanfaatan_barang); $a++){
      if($pemanfaatan_barang[$a] == ""){
        continue;
      }
      #start dari 1 karena 0 nya pasti blank. Cth data 1. abcdef, nah karena split by 1. , jadinya abcdefnya itu ada di index 1
      #print_r($pemanfaatan_barang);
      $this->m_sirup->insert_pemanfaatan_barang($pemanfaatan_barang[$a],$id_pk_sirup);
    }
    $jadwal_pelaksanaan = preg_split($preg,$jadwal_pelaksanaan);
    for($a = 0; $a<count($jadwal_pelaksanaan); $a++){
      if($jadwal_pelaksanaan[$a] == ""){
        continue;
      }
      #start dari 1 karena 0 nya pasti blank. Cth data 1. abcdef, nah karena split by 1. , jadinya abcdefnya itu ada di index 1
      #print_r($jadwal_pelaksanaan);
      $this->m_sirup->insert_jadwal_pelaksanaan($jadwal_pelaksanaan[$a],$id_pk_sirup);
    }
    $pemilihan_penyedia = preg_split($preg,$pemilihan_penyedia);
    for($a = 0; $a<count($pemilihan_penyedia); $a++){
      if($pemilihan_penyedia[$a] == ""){
        continue;
      }
      #start dari 1 karena 0 nya pasti blank. Cth data 1. abcdef, nah karena split by 1. , jadinya abcdefnya itu ada di index 1
      #print_r($pemilihan_penyedia);
      $this->m_sirup->insert_pemilihan_penyedia($pemilihan_penyedia[$a],$id_pk_sirup);
    }
  }
}