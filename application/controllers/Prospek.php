<?php
class Prospek extends CI_Controller{
    public function index(){
        $this->load->view("prospek/index");
    }
    public function tambah_prospek(){
        $this->load->view("prospek/tambah_prospek");
    }
}
?>
