<?php
class Jenis_rs extends CI_Controller
{
  public function get_data()
  {
    $kolom_pengurutan = $this->input->get("kolom_pengurutan");
    $arah_kolom_pengurutan = $this->input->get("arah_kolom_pengurutan");
    $pencarian_phrase = $this->input->get("pencarian_phrase");
    $kolom_pencarian = $this->input->get("kolom_pencarian");
    $current_page = $this->input->get("current_page");
    $this->load->model("m_jenis_rs");
    $response["data"] = $this->m_jenis_rs->search($kolom_pengurutan, $arah_kolom_pengurutan, $pencarian_phrase, $kolom_pencarian, $current_page)->result_array();
    $total_data = $this->m_jenis_rs->get_jenis_rs()->num_rows();

    $this->load->library("pagination");
    $response["page"] = $this->pagination->generate_pagination_rules($current_page, $total_data, 20);

    echo json_encode($response);
  }
  public function insert()
  {
    $this->form_validation->set_rules("namajenisrs", "Jenis Rumah Sakit", "required");
    $this->form_validation->set_rules("kodejenisrs", "Kode Jenis Rumah Sakit", "required");
    if ($this->form_validation->run()) {
      $temp_jenis_rs_nama = ucwords($this->input->post('namajenisrs'));
      $temp_jenis_rs_kode = strtoupper($this->input->post('kodejenisrs'));
      $temp_jenis_rs_status = "aktif";
      $this->load->model("m_jenis_rs");
      if($this->m_jenis_rs->check_duplicate_insert($temp_jenis_rs_kode)->num_rows() == 0){

        $this->m_jenis_rs->insert($temp_jenis_rs_nama, $temp_jenis_rs_kode, $temp_jenis_rs_status);
        $response["status"] = true;
        $response["msg"] = "Data {$temp_jenis_rs_kode} - {$temp_jenis_rs_nama} berhasil ditambah";
      }
      else{
        $response["status"] = false;
        $response["msg"] = "Kode jenis rumah sakit sudah terdaftar";
      }
    } else {
      $response["status"] = false;
      $response["msg"] = str_replace("</p>", "", str_replace("<p>", "", validation_errors()));
    }
    echo json_encode($response);
  }
  public function delete($id_pk_jenis_rs)
  {
    if (is_numeric($id_pk_jenis_rs)) {
      $this->load->model("m_jenis_rs");
      $this->m_jenis_rs->delete_jenis_rs($id_pk_jenis_rs);
      $response["status"] = true;
      $response["msg"] = "Data berhasil dihapus";
    } else {
      $response["status"] = false;
      $response["msg"] = "ID jenis rumah sakit tidak valid";
    }
    echo json_encode($response);
  }
  public function update()
  {
    $this->form_validation->set_rules("idjenisrs", "ID Jenis Rumah Sakit", "required");
    $this->form_validation->set_rules("namajenisrs", "Jenis Rumah Sakit", "required");
    $this->form_validation->set_rules("kodejenisrs", "Kode Jenis Rumah Sakit", "required");
    if ($this->form_validation->run()) {
      $temp_id_pk_jenis_rs = $this->input->post('idjenisrs');
      $temp_jenis_rs_nama = ucwords($this->input->post('namajenisrs'));
      $temp_jenis_rs_kode = strtoupper($this->input->post('kodejenisrs'));
      $this->load->model("m_jenis_rs");
      if($this->m_jenis_rs->check_duplicate_update($temp_id_pk_jenis_rs,$temp_jenis_rs_kode)->num_rows() == 0){

        $this->m_jenis_rs->edit_jenis_rs($temp_id_pk_jenis_rs, $temp_jenis_rs_nama, $temp_jenis_rs_kode);
        $response["status"] = true;
        $response["msg"] = "Data {$temp_jenis_rs_kode} - {$temp_jenis_rs_nama} berhasil diubah";
      }
      else{
        $response["status"] = false;
        $response["msg"] = "Kode jenis rumah sakit sudah terdaftar";
      }
    } else {
      $response["status"] = false;
      $response["msg"] = str_replace("</p>", "", str_replace("<p>", "", validation_errors()));
    }
    echo json_encode($response);
  }
}
