<?php
date_default_timezone_set("Asia/Jakarta");
class M_Penyelenggara extends CI_Model{

  public function get_penyelenggara(){
    $sql = "SELECT id_pk_penyelenggara, penyelenggara_nama, penyelenggara_status FROM mstr_penyelenggara where penyelenggara_status = 'aktif'";
    $result = $this->db->query($sql);
    return $result;
  }

  public function insert($penyelenggara_nama, $penyelenggara_status) {
    $data = array(
      "penyelenggara_nama"=>$penyelenggara_nama,
      "penyelenggara_status"=>"aktif"
    );
    $this->db->insert("mstr_penyelenggara",$data);
  }

  public function delete_penyelenggara($id_pk_penyelenggara) {
    $sql = "UPDATE mstr_penyelenggara SET penyelenggara_status = 'nonaktif' WHERE id_pk_penyelenggara = $id_pk_penyelenggara";
    $result = $this->db->query($sql);
  }

  public function edit_penyelenggara($id_pk_penyelenggara, $penyelenggara_nama, $penyelenggara_status){
    $where = array(
      "id_pk_penyelenggara" => $id_pk_penyelenggara
    );
    $data = array(
      "penyelenggara_nama"=>$penyelenggara_nama,
      "penyelenggara_status"=>$penyelenggara_status
    );
    $this->db->update("mstr_penyelenggara",$data,$where);
  }

}
