<?php
class Kabupaten extends CI_Controller{
  function kabupaten_provinsi($provinsi){
    $this->load->model("m_kabupaten");
    $result = $this->m_kabupaten->get_kabupaten_per_provinsi($provinsi)->result_array();
    echo json_encode($result);
  }
  public function create(){
    $nama_kabupaten = $this->input->post("nama_kabupaten");
    $status_kabupaten = $this->input->post("status_kabupaten");
    $id_provinsi = $this->input->post("id_provinsi");
    $id_create = $this->input->post("id_create");

    $this->load->model("m_kabupaten");
    $result = $this->m_kabupaten->insert($nama_kabupaten,$status_kabupaten,$id_provinsi,$id_create);
    $response["status"] = "success";
    $response["insert_id"] = $result;
    echo json_encode($response);
  }
  public function update(){
    $id = $this->input->post("id");
    $nama = $this->input->post("nama");
    $status = $this->input->post("status");
    $id_edit = $this->input->post("id_edit");

    $this->load->model("m_kabupaten");
    $this->m_kabupaten->update($id,$nama,$status,$id_edit);
    $response["status"] = "success";
    echo json_encode($response);
  }
  public function delete(){
    $id = $this->input->get("id");
    $id_delete = $this->input->get("id_delete");
    $this->load->model("m_kabupaten");
    $this->m_kabupaten->delete($id,$id_delete);
    $response["status"] = "success";
    echo json_encode($response);
  }
}