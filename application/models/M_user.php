<?php
date_default_timezone_set("Asia/Jakarta");
class M_user extends CI_Model{
  public function get_user(){
    $sql = "select id_pk_user, user_role, user_username, user_email, user_telepon, user_status, user_tgl_create, user_tgl_update, user_tgl_delete, user_id_create, user_id_update, user_id_delete FROM mstr_user WHERE user_status='aktif'";
    $result = $this->db->query($sql);
    return $result;
  }
  public function insert($user_username, $user_password, $user_email, $user_telepon, $user_role){
    $data = array(
      "user_username" => $user_username,
      "user_password" => md5($user_password),
      "user_email" => $user_email,
      "user_telepon" => $user_telepon,
      "user_role" => $user_role,
      "user_status" => "aktif"
    );
    return insertRow("mstr_user", $data);
  }
  public function delete($id_pk_user) {
    $data = array(
      "user_status" => "nonaktif"
    );
    $where = array(
      "id_pk_user" => $id_pk_user
    );
    $this->db->update("mstr_user",$data,$where);
  }
  public function update($id_pk_user, $user_username, $user_email, $user_telepon, $user_role){
    $data = array(
      "user_username" => $user_username,
      "user_password" => $user_password,
      "user_email" => $user_email,
      "user_telepon" => $user_telepon,
      "user_role" => $user_role
    );
    $where = array(
      "id_pk_user" => $id_pk_user
    );
    $this->db->update("mstr_user",$data,$where);
  }
  public function authentication($email, $password){
    $password = md5($password);
    $sql = "select id_pk_user,user_role,user_username,user_email,user_status from mstr_user where user_email = ? and user_password = ? and user_status = 'aktif'";
    $args = array(
      $email, $password
    );
    $result = executeQuery($sql, $args);
    if($result->num_rows() > 0){
      $response["status"] = true;
      $response["msg"] = $result->result_array();
    }
    else{
      $response["status"] = false;
      $response["msg"] = "Data tidak ditemukan";
    }
    return $response;
  }

  public function get_kabupaten($id_pk_provinsi) {
    $sql = "SELECT id_pk_kabupaten, id_fk_provinsi, kabupaten_nama FROM mstr_kabupaten WHERE id_fk_provinsi = $id_pk_provinsi";
    $result = $this->db->query($sql);
    return $result;
  }

  public function get_rs($id_pk_kabupaten) {
    $sql = "SELECT id_pk_rs, rs_nama, rs_kelas, rs_alamat, rs_kategori, id_fk_kabupaten FROM mstr_rs WHERE id_fk_kabupaten = $id_pk_kabupaten and rs_status = 'aktif'";
    $result = $this->db->query($sql);
    return $result;
  }
}
