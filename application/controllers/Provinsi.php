<?php
class Provinsi extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
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
