<?php
class Kabupaten extends CI_Controller{
  function kabupaten_provinsi($provinsi){
    $this->load->model("m_kabupaten");
    $result = $this->m_kabupaten->get_kabupaten_per_provinsi($provinsi)->result_array();
    echo json_encode($result);
  }
  public function create(){
    $this->form_validation->set_rules("nama_kabupaten","Nama Kabupaten","required");
    $this->form_validation->set_rules("status_kabupaten","Status Kabupaten","required");
    $this->form_validation->set_rules("id_provinsi","ID Provinsi","required");
    if($this->form_validation->run()){
      $nama_kabupaten = $this->input->post("nama_kabupaten");
      $status_kabupaten = $this->input->post("status_kabupaten");
      $id_provinsi = $this->input->post("id_provinsi");

      $this->load->model("m_kabupaten");
      $result = $this->m_kabupaten->insert($nama_kabupaten,$status_kabupaten,$id_provinsi);
      $response["status"] = true;
      $response["insert_id"] = $result;
    }
    else{
      $response["status"] = false;
      $response["msg"] = str_replace("</p>","",str_replace("<p>","",validation_errors()));
    }
    echo json_encode($response);
  }
  public function update(){
    $this->form_validation->set_rules("id","ID Kabupaten","required");
    $this->form_validation->set_rules("nama","Nama Kabupaten","required");
    $this->form_validation->set_rules("status","Status Kabupaten","required");
    if($this->form_validation->run()){
      $id = $this->input->post("id");
      $nama = $this->input->post("nama");
      $status = $this->input->post("status");

      $this->load->model("m_kabupaten");
      $this->m_kabupaten->update($id,$nama,$status);
      $response["status"] = true;
    }
    else{
      $response["status"] = false;
      $response["msg"] = str_replace("</p>","",str_replace("<p>","",validation_errors()));
    }
    echo json_encode($response);
  }
  public function delete(){
    $id = $this->input->get("id");
    if($id != ""){
      $this->load->model("m_kabupaten");
      $this->m_kabupaten->delete($id);
      $response["status"] = true;
    }
    else{
      $response["status"] = false;
    }
    echo json_encode($response);
  }
  public function get_data(){
    $kolom_pengurutan = $this->input->get("kolom_pengurutan");
    $arah_kolom_pengurutan = $this->input->get("arah_kolom_pengurutan");
    $pencarian_phrase = $this->input->get("pencarian_phrase");
    $kolom_pencarian = $this->input->get("kolom_pencarian");
    $current_page = $this->input->get("current_page");
    $provinsi = $this->input->get("provinsi");
    $this->load->model("m_kabupaten");
    $response["data"] = $this->m_kabupaten->search($kolom_pengurutan,$arah_kolom_pengurutan,$pencarian_phrase,$kolom_pencarian,$current_page,$provinsi)->result_array();
    #echo $this->db->last_query();
    $total_data = $this->m_kabupaten->get_kabupaten($kolom_pengurutan,$arah_kolom_pengurutan,$pencarian_phrase,$kolom_pencarian,$current_page,$provinsi)->num_rows();

    $this->load->library("pagination");
    $response["page"] = $this->pagination->generate_pagination_rules($current_page,$total_data,20);
    
    echo json_encode($response);
  }
}