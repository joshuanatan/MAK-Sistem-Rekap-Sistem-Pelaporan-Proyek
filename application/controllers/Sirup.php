<?php
class Sirup extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }
  public function index()
  {
    $this->load->model("m_pencarian_sirup");
    $result = $this->m_pencarian_sirup->get_data();
    $data["pencarian_sirup"] = $result->result_array();

    $data["field"] = array(
      array(
        "field_value" => "sirup_rup",
        "field_text" => "Nomor SiRUP"
      ),
      array(
        "field_value" => "sirup_paket",
        "field_text" => "Nama Paket"
      ),
      array(
        "field_value" => "sirup_klpd",
        "field_text" => "KLPD"
      ),
      array(
        "field_value" => "sirup_satuan_kerja",
        "field_text" => "Satuan Kerja"
      ),
      array(
        "field_value" => "sirup_tahun_anggaran",
        "field_text" => "Tahun Anggaran"
      ),
      array(
        "field_value" => "sirup_jenis_pengadaan",
        "field_text" => "Jenis Pengadaan"
      ),
      array(
        "field_value" => "sirup_total",
        "field_text" => "Total SiRUP"
      ),
      array(
        "field_value" => "sirup_metode_pemilihan",
        "field_text" => "Metode Pemilihan"
      ),
      array(
        "field_value" => "sirup_histori_paket",
        "field_text" => "Histori Paket"
      ),
      array(
        "field_value" => "sirup_tgl_perbarui_paket",
        "field_text" => "Tanggal Perbarui Paket"
      ),
      array(
        "field_value" => "pencarian_sirup_frase",
        "field_text" => "Kata Kunci Pencarian"
      )
    );

    $this->load->view("sirup/index", $data);
  }
  public function insert_pencarian()
  {
    $checks = $this->input->post("check");
    if ($checks != "") {
      $this->load->model("m_pencarian_sirup");
      foreach ($checks as $a) {
        $flag = false;
        $tahun_pencarian = $this->input->post("tahun_pencarian" . $a);
        $frase_pencarian = $this->input->post("frase_pencarian" . $a);
        $jenis_pencarian = $this->input->post("jenis_pencarian" . $a);
        $result = $this->m_pencarian_sirup->set_insert($tahun_pencarian, $frase_pencarian, $jenis_pencarian, "aktif");
        if ($result) {
          $result = $this->m_pencarian_sirup->insert();
          if ($result) {
            $flag = true;
          }
        }
      }
      if ($flag) {
        $this->session->set_flashdata("status", "success");
        $this->session->set_flashdata("msg", "Frase pencarian sirup telah tersimpan");
      } else {
        $this->session->set_flashdata("status", "danger");
        $this->session->set_flashdata("msg", "Input bermasalah");
      }
    } else {
      $this->session->set_flashdata("status", "danger");
      $this->session->set_flashdata("msg", "Tidak ada data yang diberikan / tidak dicentang");
    }

    $checks = $this->input->post("edit");
    if ($checks != "") {
      $this->load->model("m_pencarian_sirup");
      foreach ($checks as $a) {
        $flag = false;
        $id_pk_pencarian_sirup = $this->input->post("id_pencarian" . $a);
        $tahun_pencarian = $this->input->post("tahun_pencarian" . $a);
        $frase_pencarian = $this->input->post("frase_pencarian" . $a);
        $jenis_pencarian = $this->input->post("jenis_pencarian" . $a);
        $result = $this->m_pencarian_sirup->set_update($id_pk_pencarian_sirup, $tahun_pencarian, $frase_pencarian, $jenis_pencarian);
        if ($result) {
          $result = $this->m_pencarian_sirup->update();
          if ($result) {
            $flag = true;
          }
        }
      }
    }
    redirect("sirup");
  }
}
