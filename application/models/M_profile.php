<?php
date_default_timezone_set("Asia/Jakarta");
class M_profile extends CI_Model{
  public function get_user($id){
    $sql = "SELECT id_pk_user, user_role, user_username, user_password, user_email, user_telepon, user_status, user_tgl_create, user_tgl_update, user_tgl_delete FROM mstr_user WHERE id_pk_user = $id AND user_status='aktif'";
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
      "user_status" => "aktif",
      "user_tgl_create" => date("Y-m-d H:i:s"),
      "user_id_create" => $this->session->id_user
    );
    return insertRow("mstr_user", $data);
  }
  public function delete($id_pk_user) {
    $data = array(
      "user_status" => "nonaktif",
      "user_tgl_delete" => date("Y-m-d H:i:s"),
      "user_id_delete" => $this->session->id_user
    );
    $where = array(
      "id_pk_user" => $id_pk_user
    );
    $this->db->update("mstr_user",$data,$where);
  }
  public function updatePass($id_pk_user, $new_password){
    $new_password = md5($new_password);
    $data = array(
      "user_password" => $new_password,
      "user_tgl_update" => date("Y-m-d H:i:s"),
      "user_id_update" => $this->session->id_user
    );
    $where = array(
      "id_pk_user" => $id_pk_user
    );
    $this->db->update("mstr_user",$data,$where);
  }
  public function authentication($password){
    $password = md5($password);
    $sql = "SELECT user_password FROM mstr_user WHERE user_password = '$password' and user_status = 'aktif'";
    return executeQuery($sql);
  }
}
