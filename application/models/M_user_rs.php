<?php
class M_user_rs extends CI_model{
  public function insert($id_fk_user, $id_fk_rs){
    $data = array(
      "id_fk_user" => $id_fk_user,
      "id_fk_rs" => $id_fk_rs,
      "user_rs_status" => "aktif",
    );
    insertRow("tbl_user_rs",$data);
  }
}