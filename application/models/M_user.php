<?php
date_default_timezone_set("Asia/Jakarta");
class M_user extends CI_Model
{
  public function get_user()
  {
    $sql = "select id_pk_user, user_role, user_username, user_email, user_telepon, user_status, user_tgl_create, user_tgl_update, user_tgl_delete, user_id_create, user_id_update, user_id_delete FROM mstr_user WHERE user_status='aktif'";
    $result = $this->db->query($sql);
    return $result;
  }
  public function insert($user_username, $user_password, $user_email, $user_telepon, $user_role, $user_supervisor)
  {
    $data = array(
      "user_username" => $user_username,
      "user_password" => md5($user_password),
      "user_email" => $user_email,
      "user_telepon" => $user_telepon,
      "user_role" => $user_role,
      "user_supervisor" => $user_supervisor,
      "user_status" => "aktif",
      "user_tgl_create" => date("Y-m-d H:i:s"),
      "user_id_create" => $this->session->id_user
    );
    return insertRow("mstr_user", $data);
  }
  public function delete($id_pk_user)
  {
    $data = array(
      "user_status" => "nonaktif",
      "user_tgl_delete" => date("Y-m-d H:i:s"),
      "user_id_delete" => $this->session->id_user
    );
    $where = array(
      "id_pk_user" => $id_pk_user
    );
    $this->db->update("mstr_user", $data, $where);
  }
  public function update($id_pk_user, $user_username, $user_email, $user_telepon, $user_role, $user_supervisor)
  {
    $data = array(
      "user_username" => $user_username,
      "user_email" => $user_email,
      "user_telepon" => $user_telepon,
      "user_role" => $user_role,
      "user_supervisor" => $user_supervisor,
      "user_tgl_update" => date("Y-m-d H:i:s"),
      "user_id_update" => $this->session->id_user
    );
    $where = array(
      "id_pk_user" => $id_pk_user
    );
    $this->db->update("mstr_user", $data, $where);
  }
  public function authentication($email, $password)
  {
    $password = md5($password);
    $sql = "select id_pk_user,user_role,user_username,user_email,user_status from mstr_user where user_email = ? and user_password = ? and user_status = 'aktif'";
    $args = array(
      $email, $password
    );
    $result = executeQuery($sql, $args);
    if ($result->num_rows() > 0) {
      $response["status"] = true;
      $response["msg"] = $result->result_array();
    } else {
      $response["status"] = false;
      $response["msg"] = "Data tidak ditemukan";
    }
    return $response;
  }
  public function search($kolom_pengurutan, $arah_kolom_pengurutan, $pencarian_phrase, $kolom_pencarian, $current_page)
  {
    $search_query = "";
    if ($pencarian_phrase != "") {
      if ($kolom_pencarian == "all") {
        $search_query = "and (user_role like '%" . $pencarian_phrase . "%' or user_username like '%" . $pencarian_phrase . "%' or user_email like '%" . $pencarian_phrase . "%' or user_telepon like '%" . $pencarian_phrase . "%')";
      } else {
        $search_query = "and (" . $kolom_pencarian . " like '%" . $pencarian_phrase . "%')";
      }
    }
    $sql = "select id_pk_user, user_role, user_username, user_email, user_telepon, user_status, user_supervisor, user_tgl_create, user_tgl_update, user_tgl_delete, user_id_create, user_id_update, user_id_delete FROM mstr_user WHERE user_status='aktif' " . $search_query . " order by " . $kolom_pengurutan . " " . $arah_kolom_pengurutan . " limit 20 offset " . (20 * ($current_page - 1));
    return executeQuery($sql);
  }
  public function check_duplicate_insert($email)
  {
    $sql = "SELECT * FROM mstr_user WHERE user_email = ? and user_status = 'aktif'";
    $args = array(
      $email
    );
    return executeQuery($sql, $args);
  }
  public function check_duplicate_update($id_user, $email)
  {
    $sql = "SELECT * FROM mstr_user WHERE id_pk_user != ? and user_email = ? and user_status = 'aktif'";
    $args = array(
      $id_user, $email
    );
    return executeQuery($sql, $args);
  }
  public function user_profile($id_user)
  {
    $sql = "select user_username,user_email,user_telepon from mstr_user where id_pk_user = ?";
    $args = array(
      $id_user
    );
    return executeQuery($sql, $args);
  }
  public function update_profile($id, $username, $email, $telepon)
  {
    $where = array(
      "id_pk_user" => $id
    );
    $data = array(
      "user_username" => $username,
      "user_email" => $email,
      "user_telepon" => $telepon
    );
    updateRow("mstr_user", $data, $where);
    return true;
  }
  public function update_password($id, $pass_now, $new_pass, $conf_pass)
  {
    if ($new_pass == $conf_pass) {
      $where = array(
        "id_pk_user" => $id,
        "user_password" => md5($pass_now)
      );
      if (isExistsInTable("mstr_user", $where)) {
        $data = array(
          "user_password" => md5($new_pass)
        );
        updateRow("mstr_user", $data, $where);
        return true;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }
  public function list_supervisor()
  {
    $sql = "select id_pk_user, user_username, user_role from mstr_user where user_role = 'Supervisor' and user_status = 'aktif'";
    return executeQuery($sql);
  }
  public function list_asm()
  {
    $sql = "select id_pk_user, user_username, user_role from mstr_user where user_role = 'Area Sales Manager' and user_status = 'aktif'";
    return executeQuery($sql);
  }
  public function list_sm()
  {
    $sql = "select id_pk_user, user_username, user_role from mstr_user where user_role = 'Sales Manager' and user_status = 'aktif'";
    return executeQuery($sql);
  }
  public function get_supervisee($user_supervisor){
    $sql = "select id_pk_user, user_username from mstr_user where user_supervisor = ? and user_status = 'aktif'";
    $args = array(
      $user_supervisor
    );
    return executeQuery($sql,$args);
  }
  public function reset_supervisor($id_pk_user){
    $where = array(
      "id_pk_user" => $id_pk_user
    );
    $data = array(
      "user_supervisor" => 0
    );
    updateRow("mstr_user",$data,$where);
  }
}
