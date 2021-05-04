<?php
class Prospek extends CI_Controller{
    public function index(){


        $this->load->view("prospek/index");
    }
    public function tambah_prospek(){
        $this->load->model("m_prospek");

        $result1 = $this->m_prospek->get_rs();
        $result2 = $this->m_prospek->get_produk();
        $data = array(
          'datars' => $result1->result_array(),
          'dataproduk' => $result2->result_array(),
        );
        $this->load->view("prospek/tambah_prospek", $data);
    }
}
?>
