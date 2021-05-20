<?php
class Client extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }
  public function index()
  {
    $this->load->model("m_user", "user");
    $result = $this->user->get_role_user($this->session->no_user);
    if ($result["status"]) {
      $data = array(
        "role" => $result["data"]["role"]
      );
      $result = $this->user->get_user();
      $this->load->view("client/index", $data);
    } else {
      redirect("welcome");
    }
  }
}
