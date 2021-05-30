<?php
class Provinsi extends CI_Controller
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
        "field_value" => "provinsi_nama",
        "field_text" => "Nama Provinsi"
      )
    );
    $data["field1"] = array(
      array(
        "field_value" => "kabupaten_nama",
        "field_text" => "Nama Kabupaten"
      )
    );
    $this->load->view("provinsi/index", $data);
  }
}
