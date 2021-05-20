<?php

class Profile extends CI_Controller
{
  public function index()
  {
    $this->load->model("m_profile");
    $id = $this->session->id_user;
    $result1 = $this->m_profile->get_user($id);

    $data = array(
      "datauser" => $result1->result_array(),
    );
    $this->load->view("profile/index", $data);
  }
  public function change_pass()
  {
    $this->load->model("m_profile");
    $temp_id_user = $this->input->post('iduser');
    $temp_db_pass = $this->input->post('dbpass');
    $temp_old_password = $this->input->post('oldpass');
    $temp_new_password = $this->input->post('newpass');
    $temp_confirm_new_pass = $this->input->post('confirmnewpass');
    $checker = $this->m_profile->authentication($temp_old_password)->result_array();
    if ($temp_new_password == $temp_confirm_new_pass) {
      if ($checker[0]["user_password"] == md5($temp_old_password)) {
        $result = $this->m_profile->updatePass($temp_id_user, $temp_confirm_new_pass);
        echo "<script type = 'text/javascript'>alert('Password Changed');window.location.href='" . base_url() . "profile';</script>";
      } else {
        echo "<script type = 'text/javascript'>alert('Wrong Password Entered');window.location.href='" . base_url() . "profile';</script>";
      }
    } else {
      echo "<script type = 'text/javascript'>alert('Password Not Match');window.location.href='" . base_url() . "profile';</script>";
    }
  }
}
