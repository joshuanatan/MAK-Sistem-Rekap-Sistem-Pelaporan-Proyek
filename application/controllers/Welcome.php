<?php
class Welcome extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }
  public function index()
  {
    $this->load->view("welcome/login-page");
  }
  public function process()
  {
    $this->load->model("m_user", "user");
    $email = $this->input->post("email");
    $password = $this->input->post("password");
    $result = $this->user->authentication($email, $password);
    if ($result["status"]) {
      $this->session->id_user = $result["msg"][0]["id_pk_user"];
      $this->session->nama_user = $result["msg"][0]["user_username"];
      $this->session->user_role = $result["msg"][0]["user_role"];
      redirect("welcome/home");
    } else {
      $this->session->set_flashdata("msg", "Kombinasi tidak ditemukan, silahkan coba lagi");
      $this->session->set_flashdata("status", "danger");
      redirect("welcome");
    }
  }
  public function home()
  {
    if(!$this->session->id_user){
      $this->session->set_flashdata("status","danger");
      $this->session->set_flashdata("msg","Session expired, silahkan login");
      redirect("welcome/logout");
      exit();
    }
    $this->load->view("welcome/home");
  }
  public function logout()
  {
    $this->session->sess_destroy();
    redirect("welcome");
  }
}
