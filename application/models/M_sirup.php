<?php
class M_sirup extends CI_Model{
    public function load_search_key(){
        $sql = "select id_pk_sirup_search_key, sirup_search_key from mstr_sirup_search_key where status_sirup_search_key = 'aktif'";
        $result = executeQuery($sql);
        return $result;
    }
    public function insert_raw_result($sirup){
        $data = array(
            "sirup" => $sirup
        );
        insertRow("poc_sirup",$data);
    }
    public function insert_key_word($keyword){
        $data = array(
            "sirup_search_key" => $keyword,
            "status_sirup_search_key" => "aktif"
        );
        insertRow("mstr_sirup_search_key",$data);
    }
}