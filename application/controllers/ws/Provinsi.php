<?php
class Provinsi extends CI_Controller
{
  public function create()
  {
    $this->form_validation->set_rules("nama_provinsi", "Nama Provinsi", "required");
    $this->form_validation->set_rules("status_provinsi", "Status Provinsi", "required");
    if ($this->form_validation->run()) {
      $nama_provinsi = strtoupper($this->input->post("nama_provinsi"));
      $status_provinsi = $this->input->post("status_provinsi");
      $this->load->model("m_provinsi");
      $result = $this->m_provinsi->check_duplicate_insert($nama_provinsi);
      if($result->num_rows() == 0){

        $this->m_provinsi->insert($nama_provinsi, $status_provinsi);
        $response["status"] = true;
        $response["msg"] = "Data {$nama_provinsi} berhasil ditambahkan";
      }
      else{
        $response["status"] = false;
        $response["msg"] = "Nama provinsi sudah terdaftar";
      }
    } else {
      $response["status"] = false;
      $response["msg"] = str_replace("</p>", "", str_replace("<p>", "", validation_errors()));
    }
    echo json_encode($response);
  }
  public function update()
  {
    $this->form_validation->set_rules("id", "ID Provinsi", "required");
    $this->form_validation->set_rules("nama", "Nama Provinsi", "required");
    $this->form_validation->set_rules("status", "Status Provinsi", "required");
    if ($this->form_validation->run()) {
      $id_provinsi = $this->input->post("id");
      $nama_provinsi = strtoupper($this->input->post("nama"));
      $status_provinsi = $this->input->post("status");

      $this->load->model("m_provinsi");
      $result = $this->m_provinsi->check_duplicate_update($id_provinsi,$nama_provinsi);
      if($result->num_rows() == 0){

        $this->m_provinsi->update($id_provinsi, $nama_provinsi, $status_provinsi);
        $response["status"] = true;
        $response["msg"] = "Data {$nama_provinsi} berhasil diubah";
      }
      else{
        $response["status"] = false;
        $response["msg"] = "Nama provinsi sudah terdaftar";
      }
    } else {
      $response["status"] = false;
      $response["msg"] = str_replace("</p>", "", str_replace("<p>", "", validation_errors()));
    }
    echo json_encode($response);
  }
  public function delete($id)
  {
    if (is_numeric($id)) {
      $this->load->model("m_provinsi");
      $this->m_provinsi->delete($id);
      $response["status"] = true;
      $response["msg"] = "Data berhasil dihapus";
    } else {
      $response["status"] = false;
      $response["msg"] = "ID tidak valid";
    }
    echo json_encode($response);
  }
  public function get_active_data()
  {
    $this->load->model("m_provinsi");
    $result = $this->m_provinsi->get_active_data();
    $response["data"] = $result->result_array();
    echo json_encode($response);
  }
  public function get_data()
  {
    $kolom_pengurutan = $this->input->get("kolom_pengurutan");
    $arah_kolom_pengurutan = $this->input->get("arah_kolom_pengurutan");
    $pencarian_phrase = $this->input->get("pencarian_phrase");
    $kolom_pencarian = $this->input->get("kolom_pencarian");
    $current_page = $this->input->get("current_page");
    $this->load->model("m_provinsi");
    $response["data"] = $this->m_provinsi->search($kolom_pengurutan, $arah_kolom_pengurutan, $pencarian_phrase, $kolom_pencarian, $current_page)->result_array();
    $total_data = $this->m_provinsi->get_data($kolom_pengurutan, $arah_kolom_pengurutan, $pencarian_phrase, $kolom_pencarian, $current_page)->num_rows();

    $this->load->library("pagination");
    $response["page"] = $this->pagination->generate_pagination_rules($current_page, $total_data, 20);

    echo json_encode($response);
  }
}
