<?php

class Date_format extends CI_Controller {

  public function index() {
    $this->load->view("date_format/index");
  }
  public function change_date() {
    $tanggal = $this->input->post("tanggal");
    $formatteddate = date("Y-m-d", strtotime($tanggal));
    $data = array(
      'changeddate' => $formatteddate
    );
    echo $formatteddate;
  }
}
