<?php

class User extends CI_Controller{
    #list all user, baik developer, admin, dan client representatives.
  public function __construct(){
    parent::__construct();
  }
  public function index(){
    $this->load->model("m_provinsi");
    $result_provinsi = $this->m_provinsi->get_active_data();

    $data = array (
      "data_provinsi" => $result_provinsi->result_array(),
    );
    $data["field"] = array(
      array(
        "field_value" => "user_role",
        "field_text" => "User Role"
      ),
      array(
        "field_value" => "user_username",
        "field_text" => "Username"
      ),
      array(
        "field_value" => "user_email",
        "field_text" => "Email"
      ),
      array(
        "field_value" => "user_telpon",
        "field_text" => "Telpon"
      ),
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
    $id_user = $this->m_user->insert($temp_user_username, $temp_user_password, $temp_user_email, $temp_user_telepon, $temp_user_role);

    if($temp_user_role == "Sales Engineer"){

    }
    else if($temp_user_role == "Supervisor" || $temp_user_role == "Area Sales Manager"){

    }
    else{
      
    }
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
