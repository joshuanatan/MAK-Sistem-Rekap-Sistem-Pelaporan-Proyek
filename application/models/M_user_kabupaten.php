<?php
class M_user_kabupaten extends CI_model{
  public function insert($id_fk_user, $id_fk_kabupaten){
    $data = array(
      "id_fk_user" => $id_fk_user,
      "id_fk_kabupaten" => $id_fk_kabupaten,
      "user_kabupaten_status" => "aktif",
    );
    insertRow("tbl_user_kabupaten",$data);
  }
}