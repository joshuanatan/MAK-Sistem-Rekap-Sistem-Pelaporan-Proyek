<?php
class Penyelenggara extends CI_Controller
{
  public function __construct(){
    parent::__construct();
    if(!$this->session->id_user){
      $this->session->set_flashdata("status","danger");
      $this->session->set_flashdata("msg","Session expired, silahkan login");
      redirect("welcome");
      exit();
    }
  }
  public function index()
  {
    $this->load->model("m_penyelenggara");
    $data["field"] = array(
      array(
        "field_value" => "penyelenggara_nama",
        "field_text" => "Nama Penyelenggara"
      )
    );
    $this->load->view("penyelenggara/index", $data);
  }
}
