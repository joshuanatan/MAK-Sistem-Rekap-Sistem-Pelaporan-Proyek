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
  public function get_selected_rs($id_pk_user){
    $sql = "
    select id_pk_user_rs, id_pk_rs, rs_nama, rs_kelas, rs_alamat, rs_kategori from tbl_user_rs
    inner join mstr_rs on mstr_rs.id_pk_rs = tbl_user_rs.id_fk_rs
    INNER JOIN mstr_kabupaten ON mstr_rs.id_fk_kabupaten = mstr_kabupaten.id_pk_kabupaten 
    INNER JOIN mstr_jenis_rs ON mstr_rs.id_fk_jenis_rs = mstr_jenis_rs.id_pk_jenis_rs
    INNER JOIN mstr_penyelenggara ON mstr_rs.id_fk_penyelenggara = mstr_penyelenggara.id_pk_penyelenggara 
    where user_rs_status = 'aktif' and id_fk_user = ? and rs_status = 'aktif'";
    $args = array(
      $id_pk_user
    );
    return executeQuery($sql,$args);
  }
  public function get_unselected_rs($id_pk_user,$id_kabupaten){
    #current justification: tampilin semua rs yang belom di assign ke siapapun. Jadi kaalau uda d assign ke org lain, itu juga gamuncul
    $sql = "
    select id_pk_rs, rs_nama, rs_kelas, rs_alamat, rs_kategori from mstr_rs 
    INNER JOIN mstr_kabupaten ON mstr_rs.id_fk_kabupaten = mstr_kabupaten.id_pk_kabupaten 
    INNER JOIN mstr_jenis_rs ON mstr_rs.id_fk_jenis_rs = mstr_jenis_rs.id_pk_jenis_rs
    INNER JOIN mstr_penyelenggara ON mstr_rs.id_fk_penyelenggara = mstr_penyelenggara.id_pk_penyelenggara 
    where id_pk_rs not in
    (select id_fk_rs from tbl_user_rs where user_rs_status = 'aktif')
    and rs_status = 'aktif' and id_fk_kabupaten = ?";
    $args = array(
      $id_kabupaten
    );
    return executeQuery($sql, $args);
  }
  public function deactive_data($id_user){
    $where = array(
      "id_fk_user" => $id_user
    );
    $data = array(
      "user_rs_status" => "nonaktif"
    );
    updateRow("tbl_user_rs", $data, $where);
  }
}