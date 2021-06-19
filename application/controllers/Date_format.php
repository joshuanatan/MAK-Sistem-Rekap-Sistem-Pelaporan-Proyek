<?php

class Date_format extends CI_Controller {

  public function index() {
    $this->load->view("date_format/index");
  }
  public function change_date() {
    $tanggal = $this->input->post("tanggal");
    $tanggal = explode(" ",$tanggal);
    $tgl = $tanggal[0];    
    $bln = strtolower(substr($tanggal[1],0,3));    
    $thn = $tanggal[2];    

    if(strtolower($bln) == "mei"){
      $bln = "may";
    }
    else if(strtolower($bln) == "agu"){
      $bln = "aug";
    }
    else if(strtolower($bln) == "okt"){
      $bln = "oct";
    }
    else if(strtolower($bln) == "des"){
      $bln = "dec";
    }
    $formatteddate = date("Y-m-d", strtotime($tgl." ".$bln." ".$thn));
    echo $formatteddate;
  }
}
