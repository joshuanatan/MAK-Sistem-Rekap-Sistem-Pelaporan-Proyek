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
        $this->load->view("provinsi/index", $data);
    }
}