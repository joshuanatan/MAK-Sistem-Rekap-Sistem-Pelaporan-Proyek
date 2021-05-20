<?php
class Penyelenggara extends CI_Controller
{
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
