<?php
class Rumah_sakit extends CI_Controller{
  public function data_kabupaten($id_pk_provinsi){
    $this->load->model("m_rumah_sakit");
    $result = $this->m_rumah_sakit->get_kabupaten($id_pk_provinsi)->result_array();
    echo json_encode($result);
  }
  public function get_data(){
    $kolom_pengurutan = $this->input->get("kolom_pengurutan");
    $arah_kolom_pengurutan = $this->input->get("arah_kolom_pengurutan");
    $pencarian_phrase = $this->input->get("pencarian_phrase");
    $kolom_pencarian = $this->input->get("kolom_pencarian");
    $current_page = $this->input->get("current_page");
    $this->load->model("m_rumah_sakit");
    $response["data"] = $this->m_rumah_sakit->search($kolom_pengurutan,$arah_kolom_pengurutan,$pencarian_phrase,$kolom_pencarian,$current_page)->result_array();
    $total_data = $this->m_rumah_sakit->get_rs()->num_rows();

    $this->load->library("pagination");
    $response["page"] = $this->pagination->generate_pagination_rules($current_page,$total_data,20);
    #echo $this->db->last_query();
    echo json_encode($response);
  }
  public function insert(){
    $this->form_validation->set_rules("koderumahsakit","Kode Rumah Sakit","required");
    $this->form_validation->set_rules("namarumahsakit","Nama Rumah Sakit","required");
    $this->form_validation->set_rules("kelasrumahsakit","Kelas Rumah Sakit","required");
    $this->form_validation->set_rules("direktur","Nama Direktur","required");
    $this->form_validation->set_rules("alamat","Alamat Rumah Sakit","required");
    $this->form_validation->set_rules("kategori","Kategori Rumah Sakit","required");
    $this->form_validation->set_rules("kabupaten","Kabupaten","required");
    $this->form_validation->set_rules("kodepos","Kodepos","required");
    $this->form_validation->set_rules("telepon","Telepon","required");
    $this->form_validation->set_rules("fax","Fax","required");
    $this->form_validation->set_rules("jenisrumahsakit","Jenis Rumah Sakit","required");
    $this->form_validation->set_rules("penyelenggara","Penyelenggara Rumah Sakit","required");
    if($this->form_validation->run()){
      $temp_rs_kode= $this->input->post('koderumahsakit');
      $temp_rs_nama= $this->input->post('namarumahsakit');
      $temp_rs_kelas= $this->input->post('kelasrumahsakit');
      $temp_rs_direktur= $this->input->post('direktur');
      $temp_rs_alamat= $this->input->post('alamat');
      $temp_rs_kategori= $this->input->post('kategori');
      $temp_id_fk_kabupaten= $this->input->post('kabupaten');
      $temp_rs_kode_pos= $this->input->post('kodepos');
      $temp_rs_telepon= $this->input->post('telepon');
      $temp_rs_fax= $this->input->post('fax');
      $temp_id_fk_jenis_rs= $this->input->post('jenisrumahsakit');
      $temp_id_fk_penyelenggara= $this->input->post('penyelenggara');
      $temp_rs_status= "aktif";
      $this->load->model("m_rumah_sakit");
      $this->m_rumah_sakit->insert_rs($temp_rs_kode, $temp_rs_nama, $temp_rs_kelas, $temp_rs_direktur, $temp_rs_alamat, $temp_rs_kategori, $temp_id_fk_kabupaten, $temp_rs_kode_pos, $temp_rs_telepon, $temp_rs_fax, $temp_id_fk_jenis_rs, $temp_id_fk_penyelenggara, $temp_rs_status);
      $response["status"] = true;
    }
    else{
      $response["status"] = false;
      $response["msg"] = str_replace("</p>","",str_replace("<p>","",validation_errors()));
    }
    echo json_encode($response);
  }
  public function delete($id_pk_rs){
    if($id_pk_rs != ""){
      $this->load->model("m_rumah_sakit");
      $this->m_rumah_sakit->delete_rs($id_pk_rs);
      $response["status"] = true;
    }
    else{
      $response["status"] = false;
      $response["msg"] = "The ID Rumah Sakit field is required";
    }
    echo json_encode($response);
  }
  public function update(){
    $this->form_validation->set_rules("id_pk_rs","ID Rumah Sakit","required");
    $this->form_validation->set_rules("koderumahsakit","Kode Rumah Sakit","required");
    $this->form_validation->set_rules("namarumahsakit","Nama Rumah Sakit","required");
    $this->form_validation->set_rules("kelasrumahsakit","Kelas Rumah Sakit","required");
    $this->form_validation->set_rules("direktur","Nama Direktur","required");
    $this->form_validation->set_rules("alamat","Alamat Rumah Sakit","required");
    $this->form_validation->set_rules("kategori","Kategori Rumah Sakit","required");
    $this->form_validation->set_rules("kabupaten","Kabupaten","required");
    $this->form_validation->set_rules("kodepos","Kodepos","required");
    $this->form_validation->set_rules("telepon","Telepon","required");
    $this->form_validation->set_rules("fax","Fax","required");
    $this->form_validation->set_rules("jenisrumahsakit","Jenis Rumah Sakit","required");
    $this->form_validation->set_rules("penyelenggara","Penyelenggara Rumah Sakit","required");
    if($this->form_validation->run()){
      $id_pk_rs= $this->input->post('id_pk_rs');
      $temp_rs_kode= $this->input->post('koderumahsakit');
      $temp_rs_nama= $this->input->post('namarumahsakit');
      $temp_rs_kelas= $this->input->post('kelasrumahsakit');
      $temp_rs_direktur= $this->input->post('direktur');
      $temp_rs_alamat= $this->input->post('alamat');
      $temp_rs_kategori= $this->input->post('kategori');
      $temp_id_fk_kabupaten= $this->input->post('kabupaten');
      $temp_rs_kode_pos= $this->input->post('kodepos');
      $temp_rs_telepon= $this->input->post('telepon');
      $temp_rs_fax= $this->input->post('fax');
      $temp_id_fk_jenis_rs= $this->input->post('jenisrumahsakit');
      $temp_id_fk_penyelenggara= $this->input->post('penyelenggara');
      $this->load->model("m_rumah_sakit");
      $this->m_rumah_sakit->edit_rs($id_pk_rs,$temp_rs_kode, $temp_rs_nama, $temp_rs_kelas, $temp_rs_direktur, $temp_rs_alamat, $temp_rs_kategori, $temp_id_fk_kabupaten, $temp_rs_kode_pos, $temp_rs_telepon, $temp_rs_fax, $temp_id_fk_jenis_rs, $temp_id_fk_penyelenggara);
      $response["status"] = true;
    }
    else{
      $response["status"] = false;
      $response["msg"] = str_replace("</p>","",str_replace("<p>","",validation_errors()));
    }
    echo json_encode($response);
  }
  public function get_jenis_rumah_sakit(){
    $this->load->model("m_jenis_rs");
    $jenis_rs = $this->m_jenis_rs->get_jenis_rs();
    $response["data"] = $jenis_rs->result_array();
    echo json_encode($response);
  }
  public function get_penyelenggara(){
    $this->load->model("m_penyelenggara");
    $penyelenggara = $this->m_penyelenggara->get_penyelenggara();
    $response["data"] = $penyelenggara->result_array();
    echo json_encode($response);
  }
}
?>
