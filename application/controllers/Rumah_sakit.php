<?php

class Rumah_sakit extends CI_Controller
{
  public function __construct(){
    parent::__construct();
    if(!$this->session->id_user){
      $this->session->set_flashdata("status","danger");
      $this->session->set_flashdata("msg","Session expired, silahkan login");
      redirect("welcome");
      exit();
    }
  }

  public function index()
  {
    $this->load->model("m_rumah_sakit");
    $this->load->model("m_jenis_rs");
    $this->load->model("m_penyelenggara");

    $result2 = $this->m_rumah_sakit->get_provinsi();
    $jenis_rs = $this->m_jenis_rs->get_jenis_rs();
    $penyelenggara = $this->m_penyelenggara->get_penyelenggara();
    $data = array(
      "dataprovinsi" => $result2->result_array(),
      "jenis_rs" => $jenis_rs->result_array(),
      "penyelenggara" => $penyelenggara->result_array(),
    );
    $data["field"] = array(
      array(
        "field_value" => "rs_kode",
        "field_text" => "Kode Rumah Sakit"
      ),
      array(
        "field_value" => "rs_nama",
        "field_text" => "Nama Rumah Sakit"
      ),
      array(
        "field_value" => "rs_kelas",
        "field_text" => "Kelas Rumah Sakit"
      ),
      array(
        "field_value" => "rs_direktur",
        "field_text" => "DIrektur Rumah Sakit"
      ),
      array(
        "field_value" => "rs_alamat",
        "field_text" => "Alamat Rumah Sakit"
      ),
      array(
        "field_value" => "rs_kategori",
        "field_text" => "Kategori Rumah Sakit"
      ),
      array(
        "field_value" => "rs_kode_pos",
        "field_text" => "Kode Pos Rumah Sakit"
      ),
      array(
        "field_value" => "rs_telepon",
        "field_text" => "Telpon Rumah Sakit"
      ),
      array(
        "field_value" => "rs_fax",
        "field_text" => "Fax Rumah Sakit"
      ),
      array(
        "field_value" => "nama_kabupaten",
        "field_text" => "Kabupaten"
      ),
      array(
        "field_value" => "provinsi_nama",
        "field_text" => "Provinsi"
      ),
      array(
        "field_value" => "id_pk_jenis_rs",
        "field_text" => "Jenis Rumah Sakit"
      ),
      array(
        "field_value" => "penyelenggara",
        "field_text" => "Penyelenggara"
      ),
    );
    $this->load->view("rumah_sakit/index", $data);
  }

  public function insert()
  {
    $temp_rs_kode = $this->input->post('koderumahsakit');
    $temp_rs_nama = $this->input->post('namarumahsakit');
    $temp_rs_kelas = $this->input->post('kelasrumahsakit');
    $temp_rs_direktur = $this->input->post('direktur');
    $temp_rs_alamat = $this->input->post('alamat');
    $temp_rs_kategori = $this->input->post('kategori');
    $temp_id_fk_kabupaten = $this->input->post('kabupaten');
    $temp_rs_kode_pos = $this->input->post('kodepos');
    $temp_rs_telepon = $this->input->post('telepon');
    $temp_rs_fax = $this->input->post('fax');
    $temp_id_fk_jenis_rs = $this->input->post('jenisrumahsakit');
    $temp_id_fk_penyelenggara = $this->input->post('penyelenggara');
    $temp_rs_status = "aktif";
    $this->load->model("m_rumah_sakit");
    $this->m_rumah_sakit->insert_rs($temp_rs_kode, $temp_rs_nama, $temp_rs_kelas, $temp_rs_direktur, $temp_rs_alamat, $temp_rs_kategori, $temp_id_fk_kabupaten, $temp_rs_kode_pos, $temp_rs_telepon, $temp_rs_fax, $temp_id_fk_jenis_rs, $temp_id_fk_penyelenggara, $temp_rs_status);
    redirect("rumah_sakit/index");
  }

  public function delete($id_pk_rs)
  {
    $this->load->model("m_rumah_sakit");
    $this->m_rumah_sakit->delete_rs($id_pk_rs);
    Redirect("rumah_sakit/index");
  }

  public function edit()
  {
    $temp_rs_kode = $this->input->post('koderumahsakit');
    $temp_rs_nama = $this->input->post('namarumahsakit');
    $temp_rs_kelas = $this->input->post('kelasrumahsakit');
    $temp_rs_direktur = $this->input->post('direktur');
    $temp_rs_alamat = $this->input->post('alamat');
    $temp_rs_kategori = $this->input->post('kategori');
    $temp_id_fk_kabupaten = $this->input->post('kabupaten');
    $temp_rs_kode_pos = $this->input->post('kodepos');
    $temp_rs_telepon = $this->input->post('telepon');
    $temp_rs_fax = $this->input->post('fax');
    $temp_id_fk_jenis_rs = $this->input->post('jenisrumahsakit');
    $temp_id_fk_penyelenggara = $this->input->post('penyelenggara');
    $this->load->model("m_rumah_sakit");
    $this->m_rumah_sakit->edit_rs($temp_rs_kode, $temp_rs_nama, $temp_rs_kelas, $temp_rs_direktur, $temp_rs_alamat, $temp_rs_kategori, $temp_id_fk_kabupaten, $temp_rs_kode_pos, $temp_rs_telepon, $temp_rs_fax, $temp_id_fk_jenis_rs, $temp_id_fk_penyelenggara);
    Redirect("rumah_sakit/index");
  }
}
