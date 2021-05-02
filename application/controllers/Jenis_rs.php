<?php

class Jenis_rs extends CI_Controller{

    public function index(){
      $data["field"] = array(
        array(
          "field_value" => "jenis_rs_nama",
          "field_text" => "Nama Jenis RS"
        ),
        array(
          "field_value" => "jenis_rs_kode",
          "field_text" => "Kode Jenis RS"
        )
      );
      $this->load->view("jenis_rs/index",$data);
    }
    public function insert() {
      $temp_jenis_rs_nama = $this->input->post('namajenisrs');
      $temp_jenis_rs_kode = $this->input->post('kodejenisrs');
      $temp_jenis_rs_status = "aktif";
  		$this->load->model("m_jenis_rs");
  		$this->m_jenis_rs->insert($temp_jenis_rs_nama, $temp_jenis_rs_kode, $temp_jenis_rs_status);
      redirect("jenis_rs/index");
  	}
    public function delete($id_pk_jenis_rs) {
      $this->load->model("m_jenis_rs");
      $this->m_jenis_rs->delete_jenis_rs($id_pk_jenis_rs);
      redirect("jenis_rs/index");
    }
    public function edit() {
      $temp_id_pk_jenis_rs = $this->input->post('idjenisrs');
      $temp_jenis_rs_nama = $this->input->post('namajenisrs');
      $temp_jenis_rs_kode = $this->input->post('kodejenisrs');
      $this->load->model("m_jenis_rs");
      $this->m_jenis_rs->edit_jenis_rs($temp_id_pk_jenis_rs, $temp_jenis_rs_nama, $temp_jenis_rs_kode);
      redirect("jenis_rs/index");
    }

}
?>
