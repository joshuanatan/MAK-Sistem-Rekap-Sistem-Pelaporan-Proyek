<?php

class User extends CI_Controller
{
  #list all user, baik developer, admin, dan client representatives.
  public function __construct()
  {
    parent::__construct();
  }
  public function index()
  {
    $this->load->model("m_provinsi");
    $result_provinsi = $this->m_provinsi->get_active_data();

    $data = array(
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
}
