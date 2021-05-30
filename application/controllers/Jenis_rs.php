<?php
class Jenis_rs extends CI_Controller
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
    $data["field"] = array(
      array(
        "field_value" => "jenis_rs_nama",
        "field_text" => "Nama Jenis RS"
      ),
      array(
        "field_value" => "jenis_rs_kode",
        "field_text" => "Kode Jenis RS"
      )
    );
    $this->load->view("jenis_rs/index", $data);
  }
}
