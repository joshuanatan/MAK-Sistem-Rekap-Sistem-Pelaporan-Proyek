<?php
class Sirup extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }
    public function load_sirup(){
        #query semua, ambil yg mau di cari dari dB
        #insert ke table raw 
        #trigger after insert, bikin filtrasi like %katakunci%
        $this->load->model("m_sirup");
        $search_keys = $this->m_sirup->load_search_key();
        if($search_keys->num_rows() > 0){
            $search_keys = $search_keys->result_array();
            for($a = 0; $a<count($search_keys); $a++){
                $tahunAnggaran = date("Y");
                $keyword = urlencode($search_keys[$a]["sirup_search_key"]);
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
    public function insert_key_word(){
        $this->load->model("m_sirup");
        $keyword = array(
            "rawat inap",
            "ranjang rumah sakit",
            "ranjang",
            "meja",
            "alat kantor"
        );
        for($a = 0; $a<count($keyword); $a++){
            $this->m_sirup->insert_key_word($keyword[$a]);
        }
    }
    
}