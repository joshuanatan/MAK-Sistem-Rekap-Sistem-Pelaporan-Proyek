<?php

class User extends CI_Controller{
    #list all user, baik developer, admin, dan client representatives.
  public function __construct(){
    parent::__construct();
  }
  public function index(){
    $this->load->model("m_user");
    $this->load->model("m_kabupaten");
    $result_user = $this->m_user->get_user();
    $result_kabupaten = $this->m_kabupaten->get_kabupaten();

    $data = array (
      "data_user" => $result_user->result_array(),
      "data_kabupaten" => $result_kabupaten->result_array(),
    );

    $this->load->view("user/index", $data);
  }

  public function insert() {
    //$temp_id_fk_user_level = $this->input->post('');
    $temp_user_username = $this->input->post('username');
    $temp_user_password = $this->input->post('password');
    $temp_user_email = $this->input->post('email');
    $temp_user_telepon = $this->input->post('telepon');
    $temp_user_role = $this->input->post('role');
    $this->load->model("m_user");
    $this->m_user->insert($temp_user_username, $temp_user_password, $temp_user_email, $temp_user_telepon, $temp_user_role);
    redirect("user/index");
  }

  public function delete($id_pk_user) {
    $this->load->model("m_user");
    $this->m_user->delete($id_pk_user);
    Redirect("user/index");
  }

  public function edit() {
    $temp_id_user = $this->input->post('id_user');
    $temp_user_username = $this->input->post('username');
    $temp_user_email = $this->input->post('email');
    $temp_user_telepon = $this->input->post('telepon');
    $temp_user_role = $this->input->post('role');
    $this->load->model("m_user");
    $this->m_user->update($temp_id_user, $temp_user_username, $temp_user_email, $temp_user_telepon, $temp_user_role);
    Redirect("user/index");
  }
}
