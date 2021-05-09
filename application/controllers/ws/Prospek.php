<?php
class Prospek extends CI_Controller{

  public function get_data(){
    $this->load->model("m_prospek");
    $response["data"] = $this->m_prospek->get_prospek()->result_array();

    echo json_encode($response);
  }

  public function delete($id){
    if($id != ""){
      $this->load->model("m_prospek");
      $this->m_prospek->delete($id);
      $response["status"] = true;
    }
    else{
      $response["status"] = false;
      $response["msg"] = "The ID Prospek field is required";
    }
    echo json_encode($response);
  }

  public function get_detail($id){
    $this->load->model("m_prospek");
    $response["data_prospek_produk"] = $this->m_prospek->get_prospek_produk($id)->result_array();

    echo json_encode($response);
  }

  public function get_rs($id_kabupaten){
    $this->load->model("m_prospek");
    $response["data_rs"] = $this->m_prospek->get_rs($id_kabupaten)->result_array();

    echo json_encode($response);
  }

  public function get_kabupaten($id_pk_provinsi){
    $this->load->model("m_prospek");
    $response["data_kabupaten"] = $this->m_prospek->get_kabupaten_adv($id_pk_provinsi)->result_array();

    echo json_encode($response);
  }

  public function get_rs_kategori($id_pk_rs){
    $this->load->model("m_prospek");
    $response["data_rs_kategori"] = $this->m_prospek->get_data_rs_kategori($id_pk_rs)->result_array();

    echo json_encode($response);
  }

}
