<?php
class Provinsi extends CI_Controller{
  public function create(){
    $nama_provinsi = $this->input->post("nama_provinsi");
    $status_provinsi = $this->input->post("status_provinsi");
    $id_create = $this->input->post("id_create");
    $this->load->model("m_provinsi");
    $last_id = $this->m_provinsi->insert($nama_provinsi,$status_provinsi,$id_create);
    $response["status"] = "success";
    $response["last_id"] = $last_id;
    echo json_encode($response);
  }
  public function update(){
    $id_provinsi = $this->input->post("id");
    $nama_provinsi = $this->input->post("nama");
    $status_provinsi = $this->input->post("status");
    $id_edit = $this->input->post("id_edit");
    
    $this->load->model("m_provinsi");
    $last_id = $this->m_provinsi->update($id_provinsi,$nama_provinsi,$status_provinsi,$id_edit);
    $response["status"] = "success";
    echo json_encode($response);
  }
  public function delete(){
    $id = $this->input->get("id");
    $id_delete = $this->input->get("id_delete");
    $this->load->model("m_provinsi");
    $this->m_provinsi->delete($id,$id_delete);
    $response["status"] = "success";
    echo json_encode($response);
  }
}