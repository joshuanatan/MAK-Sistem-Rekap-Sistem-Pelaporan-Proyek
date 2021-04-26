<?php

class Penyelenggara extends CI_Controller{

    public function index(){
      $this->load->model("m_penyelenggara");
      $result = $this->m_penyelenggara->get_penyelenggara();

      $data = array (
        "datadb" => $result->result_array()
      );
      $data = array (
        "datadb" => $result->result_array()
      );
      
      $data["field"] = array(
        array(
          "field_value" => "penyelenggara_nama",
          "field_text" => "Nama Penyelenggara"
        )
      );
      $this->load->view("penyelenggara/index",$data);
    }


    public function insert() {
      $temp_penyelenggara_nama = $this->input->post('namapenyelenggara');
      $temp_penyelenggara_status = "aktif";
  		$this->load->model("m_penyelenggara");
  		$this->m_penyelenggara->insert($temp_penyelenggara_nama, $temp_penyelenggara_status);
      redirect("penyelenggara/index");
  	}

    public function delete($id_pk_penyelenggara) {
      $this->load->model("m_penyelenggara");
      $this->m_penyelenggara->delete_penyelenggara($id_pk_penyelenggara);
      redirect("penyelenggara/index");
    }

    public function edit() {
      $temp_id_pk_penyelenggara = $this->input->post('idpenyelenggara');
      $temp_penyelenggara_nama = $this->input->post('namapenyelenggara');
      $this->load->model("m_penyelenggara");
      $this->m_penyelenggara->edit_penyelenggara($temp_id_pk_penyelenggara, $temp_penyelenggara_nama);
      redirect("penyelenggara/index");
    }

}
?>
