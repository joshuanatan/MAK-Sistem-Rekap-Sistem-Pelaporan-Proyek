<?php
class Dummy extends CI_Controller
{
  public function set_session()
  {
    echo "berhasil id terbuat";
    $this->session->id_user = 1;
  }
  public function set_dummy(){
    $data = array(
      "user_username" => "Admin",
      "user_password" => md5("12345678"),
      "user_email" => "admin@email.com",
      "user_telepon" => "-",
      "user_role" => "Administrator",
      "user_status" => "aktif",
      "user_tgl_create" => date("Y-m-d H:i:s"),
      "user_id_create" => 0
    );
    insertRow("mstr_user", $data);
    $data = array(
      "user_username" => "Sales Engineer",
      "user_password" => md5("12345678"),
      "user_email" => "se@email.com",
      "user_telepon" => "-",
      "user_role" => "Sales Engineer",
      "user_status" => "aktif",
      "user_tgl_create" => date("Y-m-d H:i:s"),
      "user_id_create" => 0
    );
    insertRow("mstr_user", $data);
    $data = array(
      "user_username" => "Supervisor",
      "user_password" => md5("12345678"),
      "user_email" => "supervisor@email.com",
      "user_telepon" => "-",
      "user_role" => "Supervisor",
      "user_status" => "aktif",
      "user_tgl_create" => date("Y-m-d H:i:s"),
      "user_id_create" => 0
    );
    insertRow("mstr_user", $data);
    $data = array(
      "user_username" => "Area Sales Manager",
      "user_password" => md5("12345678"),
      "user_email" => "asm@email.com",
      "user_telepon" => "-",
      "user_role" => "Area Sales Manager",
      "user_status" => "aktif",
      "user_tgl_create" => date("Y-m-d H:i:s"),
      "user_id_create" => 0
    );
    insertRow("mstr_user", $data);
    $data = array(
      "user_username" => "Sales Manager",
      "user_password" => md5("12345678"),
      "user_email" => "sm@email.com",
      "user_telepon" => "-",
      "user_role" => "Sales Manager",
      "user_status" => "aktif",
      "user_tgl_create" => date("Y-m-d H:i:s"),
      "user_id_create" => 0
    );
    insertRow("mstr_user", $data);
  }
}
