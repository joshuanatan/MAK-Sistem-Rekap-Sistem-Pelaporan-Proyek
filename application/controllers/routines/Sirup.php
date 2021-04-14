<?php 
class Sirup extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        echo 'controller accepted, dont forget to call the function';
    }
    public function load_sirup_poc(){
        #Pendekatan ini adalah fixed, berdasarkan form, wajib berdasarkan form
        $pencarian_sirup_tahun = 2021;
        $pencarian_sirup_frase = urlencode("alat tulis");
        $pencarian_sirup_jenis = 0;
        $amount = 1;
        
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
        $response = curl_exec($curl);
        $response = json_decode($response,true);
        #print_r($response);
        for($a = 0; $a<count($response["data"]); $a++){
            $id = $response["data"][$a]["id"];
            $pagu = $response["data"][$a]["pagu"];

            $url = "https://sirup.lkpp.go.id/sirup/home/detailPaketPenyediaPublic2017/".$id;
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
            echo $response;
            
            $dom = new domDocument;
            // load the html into the object
            $dom->loadHTML($response);
            $content = $dom->getElementById("detil");
            $response = strval($content->nodeValue);
            $response = preg_replace('/\s+/', ' ', $response);
            $response = preg_replace('/\t+/', ' ', $response);
            $response = preg_replace('/\n\r+/', '', $response);
            #echo $response;

            #asumsi history paket aja yang beda
            $kode_rup = explode("Nama Paket",explode("Kode RUP",$response)[1])[0];
            $nama_paket = explode("Nama KLPD",explode("Nama Paket",$response)[1])[0];
            $nama_klpd = explode("Satuan Kerja",explode("Nama KLPD",$response)[1])[0];
            $satuan_kerja = explode("Tahun Anggaran",explode("Satuan Kerja",$response)[1])[0];
            $tahun_anggaran = explode("Lokasi Pekerjaan",explode("Tahun Anggaran",$response)[1])[0];
            $volume_pekerjaan = explode("Uraian Pekerjaan",explode("Volume Pekerjaan",$response)[1])[0];
            $uraian_pekerjaan = explode("Spesifikasi Pekerjaan",explode("Uraian Pekerjaan",$response)[1])[0];
            $spesifikasi_pekerjaan = explode("Produk Dalam Negeri",explode("Spesifikasi Pekerjaan",$response)[1])[0];
            $produk_dalam_negri = explode("Usaha Kecil",explode("Produk Dalam Negeri",$response)[1])[0];
            $usaha_kecil = explode("Pra DIPA / DPA",explode("Usaha Kecil",$response)[1])[0];
            $pra_dipa = explode("Sumber Dana",explode("Pra DIPA / DPA",$response)[1])[0];
            $jenis_pengadaan = explode("Total Pagu",explode("Jenis Pengadaan",$response)[1])[0];
            $metode_pemilihan = explode("Pemanfaatan Barang/Jasa",explode("Metode Pemilihan",$response)[1])[0];
            $tanggal_perbarui_paket = explode("Tanggal Perbarui Paket",$response)[1];
            $lokasi_pekerjaan = explode("Volume Pekerjaan",explode("Lokasi Pekerjaan No. Provinsi Kabupaten/Kota Detail Lokasi",$response)[1])[0];
            $sumber_dana = explode("Total Pagu",explode("Sumber Dana No. Sumber Dana T.A. KLPD MAK Pagu",$response)[1])[0];
            $pemanfaatan_barang = explode("Jadwal Pelaksanaan Kontrak Mulai Akhir",explode("Pemanfaatan Barang/Jasa Mulai Akhir",$response)[1])[0];
            $jadwal_pelaksanaan = explode("Jadwal Pemilihan Penyedia Mulai Akhir",explode("Jadwal Pelaksanaan Kontrak Mulai Akhir",$response)[1])[0];
            $history_paket = "";
            $pemilihan_penyedia = "";
            if (strpos($response, 'History Paket') !== false) {
                $history_paket = explode("Tanggal Perbarui Paket",explode("History Paket",$response)[1])[0];
                $pemilihan_penyedia = explode("History Paket",explode("Jadwal Pemilihan Penyedia Mulai Akhir",$response)[1])[0];
            }
            else{
                $pemilihan_penyedia = explode("Tanggal Perbarui Paket",explode("Jadwal Pemilihan Penyedia Mulai Akhir",$response)[1])[0];
            }
            $id_user = 0;
            if($this->session->id_user != ""){
                $id_user = $this->session->id_user; 
            }
        }
    }
    public function load_sirup(){
        #query semua, ambil yg mau di cari dari dB
        #insert ke table raw 
        #trigger after insert, bikin filtrasi like %katakunci%
        $this->load->model("m_pencarian_sirup");
        $search_keys = $this->m_pencarian_sirup->get_data();
        if($search_keys->num_rows() > 0){
            $search_keys = $search_keys->result_array();
            for($a = 0; $a<1; $a++){
                echo $a."<br/>";
                $id_pk_pencarian_sirup = $search_keys[$a]["id_pk_pencarian_sirup"];
                $pencarian_sirup_tahun = $search_keys[$a]["pencarian_sirup_tahun"];
                $pencarian_sirup_frase = urlencode($search_keys[$a]["pencarian_sirup_frase"]);
                $pencarian_sirup_jenis = $search_keys[$a]["pencarian_sirup_jenis"];
                $amount = 1;
        
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
                $response = json_decode($response,true);
                #cek responsenya.   
                print_r($response);
                $response_data_count = count($response["data"]);
                for($b = 0; $b<$response_data_count; $b++){
                    $id = $response["data"][$b]["id"];
                    $pagu = $response["data"][$b]["pagu"];
        
                    $url = "https://sirup.lkpp.go.id/sirup/home/detailPaketPenyediaPublic2017/".$id;
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
                    $dom = new domDocument;
                    // load the html into the object
                    $dom->loadHTML($response);
                    $content = $dom->getElementById("detil");
                    $response = strval($content->nodeValue);
                    $response = preg_replace('/\s+/', ' ', $response);
                    $response = preg_replace('/\t+/', ' ', $response);
                    $response = preg_replace('/\n\r+/', '', $response);
                    #echo $response;
                    $this->extract_data($response,$pagu,$id_pk_pencarian_sirup);
                }
            }
        }
    }
    private function extract_data($response, $sirup_total, $id_fk_pencarian_sirup){
        #asumsi history paket aja yang beda
        $sirup_rup = explode("Nama Paket",explode("Kode RUP",$response)[1])[0];
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
        $id_pk_sirup = $this->m_sirup->insert($sirup_rup,$sirup_paket,$sirup_klpd,$sirup_satuan_kerja,$sirup_tahun_anggaran,$sirup_volume_pekerjaan,$sirup_uraian_pekerjaan,$sirup_spesifikasi_pekerjaan,$sirup_produk_dalam_negri,$sirup_usaha_kecil,$sirup_pra_dipa,$sirup_jenis_pengadaan,$sirup_total,$sirup_metode_pemilihan,$sirup_histori_paket,$sirup_tgl_perbarui_paket,$sirup_id_create,$id_fk_pencarian_sirup);

        $preg = '/[0-9]\.\ /';
        $lokasi_pekerjaan = preg_split($preg,$lokasi_pekerjaan);
        print_r($lokasi_pekerjaan);
        for($a = 0; $a<count($lokasi_pekerjaan); $a++){
            if($lokasi_pekerjaan[$a] == ""){
                continue;
            }
            #start dari 1 karena 0 nya pasti blank. Cth data 1. abcdef, nah karena split by 1. , jadinya abcdefnya itu ada di index 1
            #print_r($lokasi_pekerjaan);
            $this->m_sirup->insert_lokasi_pekerjaan($lokasi_pekerjaan[$a],$id_pk_sirup);
        }
        $sumber_dana = preg_split($preg,$sumber_dana);
        print_r($sumber_dana);
        for($a = 0; $a<count($sumber_dana); $a++){
            if($lokasi_pekerjaan[$a] == ""){
                continue;
            }
            #start dari 1 karena 0 nya pasti blank. Cth data 1. abcdef, nah karena split by 1. , jadinya abcdefnya itu ada di index 1
            #print_r($sumber_dana);
            $this->m_sirup->insert_sumber_dana($sumber_dana[$a],$id_pk_sirup);
        }
        $pemanfaatan_barang = preg_split($preg,$pemanfaatan_barang);
        print_r($pemanfaatan_barang);
        for($a = 0; $a<count($pemanfaatan_barang); $a++){
            if($lokasi_pekerjaan[$a] == ""){
                continue;
            }
            #start dari 1 karena 0 nya pasti blank. Cth data 1. abcdef, nah karena split by 1. , jadinya abcdefnya itu ada di index 1
            #print_r($pemanfaatan_barang);
            $this->m_sirup->insert_pemanfaatan_barang($pemanfaatan_barang[$a],$id_pk_sirup);
        }
        $jadwal_pelaksanaan = preg_split($preg,$jadwal_pelaksanaan);
        print_r($jadwal_pelaksanaan);
        for($a = 0; $a<count($jadwal_pelaksanaan); $a++){
            if($lokasi_pekerjaan[$a] == ""){
                continue;
            }
            #start dari 1 karena 0 nya pasti blank. Cth data 1. abcdef, nah karena split by 1. , jadinya abcdefnya itu ada di index 1
            #print_r($jadwal_pelaksanaan);
            $this->m_sirup->insert_jadwal_pelaksanaan($jadwal_pelaksanaan[$a],$id_pk_sirup);
        }
        $pemilihan_penyedia = preg_split($preg,$pemilihan_penyedia);
        print_r($pemilihan_penyedia);
        for($a = 0; $a<count($pemilihan_penyedia); $a++){
            if($lokasi_pekerjaan[$a] == ""){
                continue;
            }
            #start dari 1 karena 0 nya pasti blank. Cth data 1. abcdef, nah karena split by 1. , jadinya abcdefnya itu ada di index 1
            #print_r($pemilihan_penyedia);
            $this->m_sirup->insert_pemilihan_penyedia($pemilihan_penyedia[$a],$id_pk_sirup);
        }
    }
}