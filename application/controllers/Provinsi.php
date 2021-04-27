<?php
class Provinsi extends CI_Controller{
  public function __construct(){
      parent::__construct();
  }
  public function index(){
    $this->load->model("m_provinsi");
    $result = $this->m_provinsi->get_data();
    $data = array(
        "provinsi" => $result->result_array()
    );
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