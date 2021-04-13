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
        $id = $response["data"][0]["id"];
        $pagu = $response["data"][0]["pagu"];

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
        
        $preg = "/[0-9]\./";
        $lokasi_pekerjaan = preg_split($preg,$lokasi_pekerjaan);
        print_r($lokasi_pekerjaan);
    }
    public function load_sirup(){
        #query semua, ambil yg mau di cari dari dB
        #insert ke table raw 
        #trigger after insert, bikin filtrasi like %katakunci%
        $this->load->model("m_pencarian_sirup");
        $search_keys = $this->m_pencarian_sirup->get_data();
        if($search_keys->num_rows() > 0){
            $search_keys = $search_keys->result_array();
            for($a = 0; $a<count($search_keys); $a++){
                $pencarian_sirup_tahun = $search_keys[$a]["pencarian_sirup_tahun"];
                $pencarian_sirup_frase = urlencode($search_keys[$a]["pencarian_sirup_frase"]);
                $pencarian_sirup_jenis = $search_keys[$a]["pencarian_sirup_jenis"];
                $amount = 100;

                $url = "https://sirup.lkpp.go.id/sirup/ro/cari/search?tahunAnggaran=".$tahunAnggaran."&keyword=".$keyword."&jenisPengadaan=0&metodePengadaan=0&draw=1&order%5B0%5D%5Bcolumn%5D=5&order%5B0%5D%5Bdir%5D=DESC&start=0&length=".$amount."&search%5Bvalue%5D=&search%5Bregex%5D=false";

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
                print_r($response);
                echo "------------------";
                for($b = 0; $b<count($response["data"]); $b++){
                    $this->m_sirup->insert_raw_result($response["data"][$b]["id"]);
                }
            }
        }
    }
    public function load_detail_sirup(){
        $this->load->model("m_sirup");
        $result = $this->m_sirup->load_sirup();
        $result = $result->result_array();
        $curl = curl_init();
        for($a = 0; $a<count($result); $a++){
            $sirup = $result[$a]["sirup"];
            $url = "https://sirup.lkpp.go.id/sirup/home/detailPaketPenyediaPublic2017/".$sirup;
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
            if($response){
                echo htmlentities($response);
                #$this->extract_data($response);
            }
        }
    }
    private function extract_data2($response){
        $dom = new domDocument;
        // load the html into the object
        $dom->loadHTML($response);
        $content = $dom->getElementsByTagName("tr");
        foreach ($content as $a) {
            $test = $a->getElementsByTagName("td");
            $counter = 0;
            print_r($test);
            foreach ($test as $b){
                echo $b->nodeValue;
                $counter++;
            }
            echo "<br/>";
        }   
    }
    // private function extract_data($response){
    //     error_reporting(0);
    //     $dom = new domDocument;
    //     // load the html into the object
    //     $dom->loadHTML($response);
    //     $content = $dom->getElementsByTagName("tr");
    //     foreach($content as $a){
    //         $child = $a->childNodes;
    //         $temp_array = array();
    //         $flag = 0;
    //         foreach($child as $b){
    //             if($b->nodeValue && $b->nodeType == 1){
    //                 $temp_array[$flag] = $b->nodeValue;
    //                 $flag++;
    //             }
    //             if($flag % 2 == 0){
    //                 echo $temp_array[0]." - ".$temp_array[1];
    //                 echo "<br/>";
    //             }
    //         }
    //     }
    // }
}