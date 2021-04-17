<?php
date_default_timezone_set("Asia/Jakarta");
class M_kabupaten extends CI_Model{
    private $id_pk_kabupaten;
    private $id_fk_provinsi;
    private $kabupaten_nama;

    public function get_kabupaten(){
        $sql = "select kabupaten_nama from mstr_kabupaten";
        $result = $this->db->query($sql);
        return $result;
    }
  }
