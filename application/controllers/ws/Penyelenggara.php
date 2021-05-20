<?php
class Penyelenggara extends CI_Controller
{
  public function get_data()
  {
    $kolom_pengurutan = $this->input->get("kolom_pengurutan");
    $arah_kolom_pengurutan = $this->input->get("arah_kolom_pengurutan");
    $pencarian_phrase = $this->input->get("pencarian_phrase");
    $kolom_pencarian = $this->input->get("kolom_pencarian");
    $current_page = $this->input->get("current_page");
    $this->load->model("m_penyelenggara");
    $response["data"] = $this->m_penyelenggara->search($kolom_pengurutan, $arah_kolom_pengurutan, $pencarian_phrase, $kolom_pencarian, $current_page)->result_array();
    #echo $this->db->last_query();
    $total_data = $this->m_penyelenggara->get_penyelenggara()->num_rows();

    $this->load->library("pagination");
    $response["page"] = $this->pagination->generate_pagination_rules($current_page, $total_data, 20);

    echo json_encode($response);
  }

  public function insert()
  {
    $this->form_validation->set_rules("namapenyelenggara", "Nama Penyelenggara", "required");
    if ($this->form_validation->run()) {
      $temp_penyelenggara_nama = ucwords($this->input->post('namapenyelenggara'));
      $temp_penyelenggara_status = "aktif";
      $this->load->model("m_penyelenggara");
      if($this->m_penyelenggara->check_duplicate_insert($temp_penyelenggara_nama)->num_rows() == 0){

        $this->m_penyelenggara->insert($temp_penyelenggara_nama, $temp_penyelenggara_status);
        $response["status"] = true;
        $response["msg"] = "Data {$temp_penyelenggara_nama} berhasil ditambahkan";
      }
      else{
        $response["status"] = false;
        $response["msg"] = "Penyelenggara telah terdaftar";
      }
    } else {
      $response["status"] = false;
      $response["msg"] = str_replace("</p>", "", str_replace("<p>", "", validation_errors()));
    }
    echo json_encode($response);
  }

  public function delete($id_pk_penyelenggara)
  {
    if (is_numeric($id_pk_penyelenggara)) {
      $this->load->model("m_penyelenggara");
      $this->m_penyelenggara->delete_penyelenggara($id_pk_penyelenggara);
      $response["status"] = true;
      $response["msg"] = "Data berhasil dihapus";
    } else {
      $response["status"] = false;
      $response["msg"] = "ID Penyelenggara tidak valid";
    }
    echo json_encode($response);
  }

  public function update()
  {
    $this->form_validation->set_rules("idpenyelenggara", "ID Penyelenggara", "required");
    $this->form_validation->set_rules("namapenyelenggara", "Nama Penyelenggara", "required");
    if ($this->form_validation->run()) {
      $temp_id_pk_penyelenggara = $this->input->post('idpenyelenggara');
      $temp_penyelenggara_nama = ucwords($this->input->post('namapenyelenggara'));
      $this->load->model("m_penyelenggara");
      if($this->m_penyelenggara->check_duplicate_update($temp_id_pk_penyelenggara,$temp_penyelenggara_nama)->num_rows() == 0){

        $this->m_penyelenggara->edit_penyelenggara($temp_id_pk_penyelenggara, $temp_penyelenggara_nama);
        $response["status"] = true;
        $response["msg"] = "Data {$temp_penyelenggara_nama} berhasil diubah";
      }
      else{
        $response["status"] = false;
        $response["msg"] = "Penyelenggara telah terdaftar";
      }
    } else {
      $response["status"] = false;
      $response["msg"] = str_replace("</p>", "", str_replace("<p>", "", validation_errors()));
    }
    echo json_encode($response);
  }
}
