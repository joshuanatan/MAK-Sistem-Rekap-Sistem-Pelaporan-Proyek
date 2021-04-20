<?php
date_default_timezone_set("Asia/Jakarta");
class M_jenis_rs extends CI_Model{

  public function get_jenis_rs(){
    $sql = "SELECT id_pk_jenis_rs, jenis_rs_nama, jenis_rs_kode, jenis_rs_status FROM mstr_jenis_rs";
    $result = $this->db->query($sql);
    return $result;
  }

  public function insert($jenis_rs_nama, $jenis_rs_kode, $jenis_rs_status) {
    $data = array(
      "jenis_rs_nama"=>$jenis_rs_nama,
      "jenis_rs_kode"=>$jenis_rs_kode,
      "jenis_rs_status"=>"aktif"
    );
    $this->db->insert("mstr_jenis_rs",$data);
  }

  public function delete_jenis_rs($id_pk_jenis_rs) {
    $sql = "UPDATE mstr_jenis_rs SET jenis_rs_status = 'nonaktif' WHERE id_pk_jenis_rs = $id_pk_jenis_rs";
    $result = $this->db->query($sql);
  }

  public function edit_jenis_rs($id_pk_jenis_rs, $jenis_rs_nama, $jenis_rs_kode, $temp_jenis_rs_status){
    $where = array(
      "id_pk_jenis_rs" => $id_pk_jenis_rs
    );
    $data = array(
      "jenis_rs_nama"=>$jenis_rs_nama,
      "jenis_rs_kode"=>$jenis_rs_kode,
      "jenis_rs_status"=>$jenis_rs_status
    );
    $this->db->update("mstr_jenis_rs",$data,$where);
  }

}
