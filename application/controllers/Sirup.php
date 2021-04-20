<?php
class Sirup Extends CI_Controller{
  public function __construct(){
      parent::__construct();
  }
  public function index(){
      $this->load->model("m_pencarian_sirup");
      $result = $this->m_pencarian_sirup->get_data();
      $data["pencarian_sirup"] = $result->result_array();
      
      $this->load->model("m_sirup");
      $result = $this->m_sirup->get_data();
      $data["sirup"] = $result->result_array();
      $this->load->view("sirup/index",$data);
  }
  public function insert_pencarian(){
      $checks = $this->input->post("check");
      if($checks != ""){
          $this->load->model("m_pencarian_sirup");
          foreach($checks as $a){
              $flag = false;
              $tahun_pencarian = $this->input->post("tahun_pencarian".$a);
              $frase_pencarian = $this->input->post("frase_pencarian".$a);
              $jenis_pencarian = $this->input->post("jenis_pencarian".$a);
              $result = $this->m_pencarian_sirup->set_insert($tahun_pencarian,$frase_pencarian,$jenis_pencarian,"aktif");
              if($result){
                  $result = $this->m_pencarian_sirup->insert();
                  if($result){
                      $flag = true;
                  }
              }
          }
          if($flag){
              $this->session->set_flashdata("status","success");
              $this->session->set_flashdata("msg","Frase pencarian sirup telah tersimpan");
          }
          else{
              $this->session->set_flashdata("status","danger");
              $this->session->set_flashdata("msg","Input bermasalah");
          }
      }
      else{
          $this->session->set_flashdata("status","danger");
          $this->session->set_flashdata("msg","Tidak ada data yang diberikan / tidak dicentang");
      }

      $checks = $this->input->post("edit");
      if($checks != ""){
          $this->load->model("m_pencarian_sirup");
          foreach($checks as $a){
              $flag = false;
              $id_pk_pencarian_sirup = $this->input->post("id_pencarian".$a);
              $tahun_pencarian = $this->input->post("tahun_pencarian".$a);
              $frase_pencarian = $this->input->post("frase_pencarian".$a);
              $jenis_pencarian = $this->input->post("jenis_pencarian".$a);
              $result = $this->m_pencarian_sirup->set_update($id_pk_pencarian_sirup,$tahun_pencarian,$frase_pencarian,$jenis_pencarian);
              if($result){
                  $result = $this->m_pencarian_sirup->update();
                  if($result){
                      $flag = true;
                  }
              }
          }
      }
      redirect("sirup");
  }
  public function insert(){
    $kode_rup = $this->input->post("kode_rup");
    $nama_paket = $this->input->post("nama_paket");
    $nama_klpd = $this->input->post("nama_klpd");
    $satuan_kerja = $this->input->post("satuan_kerja");
    $tahun_anggaran = $this->input->post("tahun_anggaran");
    $volume_pekerjaan = $this->input->post("volume_pekerjaan");
    $uraian_pekerjaan = $this->input->post("uraian_pekerjaan");
    $spesifikasi_pekerjaan = $this->input->post("spesifikasi_pekerjaan");
    $produk_dalam_negeri = $this->input->post("produk_dalam_negeri");
    $usaha_kecil = $this->input->post("usaha_kecil");
    $pra_dipa_dpa = $this->input->post("pra_dipa_dpa");
    $jenis_pengadaan = $this->input->post("jenis_pengadaan");
    $total_pagu = $this->input->post("total_pagu");
    $metode_pemilihan = $this->input->post("metode_pemilihan");
    $histori_paket = $this->input->post("histori_paket");
    $tgl_perbarui_paket = $this->input->post("tgl_perbarui_paket");

    $this->load->model("m_sirup");
    $id_sirup = $this->m_sirup->insert($kode_rup,$nama_paket,$nama_klpd,$satuan_kerja,$tahun_anggaran,$volume_pekerjaan,$uraian_pekerjaan,$spesifikasi_pekerjaan,$produk_dalam_negeri,$usaha_kecil,$pra_dipa_dpa,$jenis_pengadaan,$total_pagu,$metode_pemilihan,$histori_paket,$tgl_perbarui_paket,$this->session->id_user,0, "aktif");

    $lokasi_pekerjaan_check = $this->input->post("lokasi_pekerjaan_check");
    if($lokasi_pekerjaan_check != ""){
      foreach($lokasi_pekerjaan_check as $a){
        $provinsi = $this->input->post("provinsi".$a);
        $kabupaten = $this->input->post("kabupaten".$a);
        $detail_lokasi = $this->input->post("detail_lokasi".$a);
        $this->m_sirup->insert_lokasi_pekerjaan($provinsi." | ".$kabupaten." | ".$detail_lokasi,$id_sirup);
      }
    }
    $sumber_dana_check = $this->input->post("sumber_dana_check");
    if($sumber_dana_check != ""){
      foreach($sumber_dana_check as $a){
        $sumber_dana = $this->input->post("sumber_dana".$a);
        $ta = $this->input->post("ta".$a);
        $klpd = $this->input->post("klpd".$a);
        $mak = $this->input->post("mak".$a);
        $pagu = $this->input->post("pagu".$a);
        $this->m_sirup->insert_sumber_dana($sumber_dana." | ".$ta." | ".$klpd." | ".$mak." | ".$pagu,$id_sirup);
      }
    }
    $pemanfaatan_barang_check = $this->input->post("pemanfaatan_barang_check");
    if($pemanfaatan_barang_check != ""){
      foreach($pemanfaatan_barang_check as $a){
        $mulai_pemanfaatan_barang = $this->input->post("mulai_pemanfaatan_barang".$a);
        $akhir_pemanfaatan_barang = $this->input->post("akhir_pemanfaatan_barang".$a);
        $this->m_sirup->insert_pemanfaatan_barang($mulai_pemanfaatan_barang." | ".$akhir_pemanfaatan_barang,$id_sirup);
      }
    }
    $pelaksanaan_kontrak_check = $this->input->post("pelaksanaan_kontrak_check");
    if($pelaksanaan_kontrak_check != ""){
      foreach($pelaksanaan_kontrak_check as $a){
        $mulai_pelaksanaan_kontrak = $this->input->post("mulai_pelaksanaan_kontrak".$a);
        $akhir_pelaksanaan_kontrak = $this->input->post("akhir_pelaksanaan_kontrak".$a);
        $this->m_sirup->insert_jadwal_pelaksanaan($mulai_pelaksanaan_kontrak." | ".$akhir_pelaksanaan_kontrak,$id_sirup);
      }
    }
    $pemilihan_penyedia_check = $this->input->post("pemilihan_penyedia_check");
    if($pemilihan_penyedia_check != ""){
      foreach($pemilihan_penyedia_check as $a){
        $mulai_pemilihan_penyedia = $this->input->post("mulai_pemilihan_penyedia".$a);
        $akhir_pemilihan_penyedia = $this->input->post("akhir_pemilihan_penyedia".$a);
        $this->m_sirup->insert_pemilihan_penyedia($mulai_pemilihan_penyedia." | ".$akhir_pemilihan_penyedia,$id_sirup);
      }
    }
  }
}