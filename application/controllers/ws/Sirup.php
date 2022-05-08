<?php
class Sirup extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }
  public function delete_pencarian($id_pk_pencarian_sirup, $keyword)
  {
    $this->load->model("m_pencarian_sirup");
    $result = $this->m_pencarian_sirup->set_delete($id_pk_pencarian_sirup);
    if ($result) {
      $result = $this->m_pencarian_sirup->delete();
      $this->load->model("m_sirup");
      $delete = $this->m_sirup->delete_sirup($id_pk_pencarian_sirup);
      if ($result && $delete) {
        $respond["status"] = "success";
        $respond["msg"] = "data berhasil di hapus";
      } else {
        $respond["status"] = "error";
        $respond["msg"] = "data gagal di hapus";
      }
    } else {
      $respond["status"] = "error";
      $respond["msg"] = "id invalid";
    }
    echo json_encode($respond);
  }
  public function get_detail_lokasi_pekerjaan($id_pk_sirup)
  {
    $this->load->model("m_sirup");
    $result = $this->m_sirup->get_detail_lokasi_pekerjaan($id_pk_sirup);
    $result = $result->result_array();
    echo json_encode($result);
  }
  public function get_detail_sumber_dana($id_pk_sirup)
  {
    $this->load->model("m_sirup");
    $result = $this->m_sirup->get_detail_sumber_dana($id_pk_sirup);
    $result = $result->result_array();
    echo json_encode($result);
  }
  public function get_detail_pemanfaatan_barang($id_pk_sirup)
  {
    $this->load->model("m_sirup");
    $result = $this->m_sirup->get_detail_pemanfaatan_barang($id_pk_sirup);
    $result = $result->result_array();
    echo json_encode($result);
  }
  public function get_detail_pelaksanaan_kontrak($id_pk_sirup)
  {
    $this->load->model("m_sirup");
    $result = $this->m_sirup->get_detail_pelaksanaan_kontrak($id_pk_sirup);
    $result = $result->result_array();
    echo json_encode($result);
  }
  public function get_detail_jadwal_pemilihan($id_pk_sirup)
  {
    $this->load->model("m_sirup");
    $result = $this->m_sirup->get_detail_jadwal_pemilihan($id_pk_sirup);
    $result = $result->result_array();
    echo json_encode($result);
  }
  public function get_data()
  {
    $kolom_pengurutan = $this->input->get("kolom_pengurutan");
    $arah_kolom_pengurutan = $this->input->get("arah_kolom_pengurutan");
    $pencarian_phrase = $this->input->get("pencarian_phrase");
    $kolom_pencarian = $this->input->get("kolom_pencarian");
    $current_page = $this->input->get("current_page");
    $this->load->model("m_sirup");
    $response["data"] = $this->m_sirup->search($kolom_pengurutan, $arah_kolom_pengurutan, $pencarian_phrase, $kolom_pencarian, $current_page)->result_array();
    #echo $this->db->last_query();
    $total_data = $this->m_sirup->get_data($kolom_pengurutan, $arah_kolom_pengurutan, $pencarian_phrase, $kolom_pencarian, $current_page)->num_rows();

    $this->load->library("pagination");
    $response["page"] = $this->pagination->generate_pagination_rules($current_page, $total_data, 20);

    echo json_encode($response);
  }
  public function get_data_system()
  {
    $kolom_pengurutan = $this->input->get("kolom_pengurutan");
    $arah_kolom_pengurutan = $this->input->get("arah_kolom_pengurutan");
    $pencarian_phrase = $this->input->get("pencarian_phrase");
    $kolom_pencarian = $this->input->get("kolom_pencarian");
    $current_page = $this->input->get("current_page");
    $funnel = $this->input->get("funnel");
    $this->load->model("m_sirup");
    $response["data"] = $this->m_sirup->search_system($kolom_pengurutan, $arah_kolom_pengurutan, $pencarian_phrase, $kolom_pencarian, $current_page, $funnel)->result_array();
    #echo $this->db->last_query();

    $total_data = $this->m_sirup->get_data_system($kolom_pengurutan, $arah_kolom_pengurutan, $pencarian_phrase, $kolom_pencarian, $current_page);

    if (!isset($total_data)) {
      $total_data = 0;
    } else {
      $total_data->num_rows();
    }

    $this->load->library("pagination");
    $response["page"] = $this->pagination->generate_pagination_rules($current_page, $total_data, 20);

    echo json_encode($response);
  }
  public function get_data_creator()
  {
    $kolom_pengurutan = $this->input->get("kolom_pengurutan");
    $arah_kolom_pengurutan = $this->input->get("arah_kolom_pengurutan");
    $pencarian_phrase = $this->input->get("pencarian_phrase");
    $kolom_pencarian = $this->input->get("kolom_pencarian");
    $current_page = $this->input->get("current_page");
    $this->load->model("m_sirup");
    $response["data"] = $this->m_sirup->search_with_creator($kolom_pengurutan, $arah_kolom_pengurutan, $pencarian_phrase, $kolom_pencarian, $current_page)->result_array();
    #echo $this->db->last_query();
    $total_data = $this->m_sirup->get_data_with_creator($kolom_pengurutan, $arah_kolom_pengurutan, $pencarian_phrase, $kolom_pencarian, $current_page)->num_rows();

    $this->load->library("pagination");
    $response["page"] = $this->pagination->generate_pagination_rules($current_page, $total_data, 20);

    echo json_encode($response);
  }

  public function delete($id_pk_sirup)
  {
    if (is_numeric($id_pk_sirup)) {
      $this->load->model("m_sirup");
      $this->m_sirup->delete($id_pk_sirup);
      $result["msg"] = "Data SiRUP berhasil dihapus";
      $result["status"] = true;
    } else {
      $result["msg"] = "ID tidak valid";
      $result["status"] = false;
    }
    echo json_encode($result);
  }
  public function insert()
  {
    $this->form_validation->set_rules("kode_rup", "kode_rup", "required|is_unique[mstr_sirup.sirup_rup]'", array(
      "is_unique" => "Sirup RUP telah terdaftar, tolong masukkan RUP yang berbeda."
    ));
    $this->form_validation->set_rules("nama_paket", "nama_paket", "required");
    $this->form_validation->set_rules("nama_klpd", "nama_klpd", "required");
    $this->form_validation->set_rules("satuan_kerja", "satuan_kerja", "required");
    $this->form_validation->set_rules("tahun_anggaran", "tahun_anggaran", "required");
    $this->form_validation->set_rules("volume_pekerjaan", "volume_pekerjaan", "required");
    $this->form_validation->set_rules("uraian_pekerjaan", "uraian_pekerjaan", "required");
    $this->form_validation->set_rules("spesifikasi_pekerjaan", "spesifikasi_pekerjaan", "required");
    $this->form_validation->set_rules("produk_dalam_negeri", "produk_dalam_negeri", "required");
    $this->form_validation->set_rules("usaha_kecil", "usaha_kecil", "required");
    $this->form_validation->set_rules("pra_dipa_dpa", "pra_dipa_dpa", "required");
    $this->form_validation->set_rules("jenis_pengadaan", "jenis_pengadaan", "required");
    $this->form_validation->set_rules("total_pagu", "total_pagu", "required");
    $this->form_validation->set_rules("metode_pemilihan", "metode_pemilihan", "required");
    $this->form_validation->set_rules("histori_paket", "histori_paket", "required");
    $this->form_validation->set_rules("tgl_perbarui_paket", "tgl_perbarui_paket", "required");
    if ($this->form_validation->run()) {
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
      if ($this->m_sirup->check_duplicate_insert($kode_rup)->num_rows() == 0) {
        $id_sirup = $this->m_sirup->insert($kode_rup, $nama_paket, $nama_klpd, $satuan_kerja, $tahun_anggaran, $volume_pekerjaan, $uraian_pekerjaan, $spesifikasi_pekerjaan, $produk_dalam_negeri, $usaha_kecil, $pra_dipa_dpa, $jenis_pengadaan, $total_pagu, $metode_pemilihan, $histori_paket, $tgl_perbarui_paket, $this->session->id_user, 0, "aktif");

        $lokasi_pekerjaan_check = $this->input->post("lokasi_pekerjaan_check");
        if ($lokasi_pekerjaan_check != "") {
          foreach ($lokasi_pekerjaan_check as $a) {
            $provinsi = $this->input->post("provinsi" . $a);
            $kabupaten = $this->input->post("kabupaten" . $a);
            $detail_lokasi = $this->input->post("detail_lokasi" . $a);
            $this->m_sirup->insert_lokasi_pekerjaan($provinsi . "|" . $kabupaten . "|" . $detail_lokasi, $id_sirup);
          }
        }
        $sumber_dana_check = $this->input->post("sumber_dana_check");
        if ($sumber_dana_check != "") {
          foreach ($sumber_dana_check as $a) {
            $sumber_dana = $this->input->post("sumber_dana" . $a);
            $ta = $this->input->post("ta" . $a);
            $klpd = $this->input->post("klpd" . $a);
            $mak = $this->input->post("mak" . $a);
            $pagu = $this->input->post("pagu" . $a);
            $this->m_sirup->insert_sumber_dana($sumber_dana . "|" . $ta . "|" . $klpd . "|" . $mak . "|" . $pagu, $id_sirup);
          }
        }
        $pemanfaatan_barang_check = $this->input->post("pemanfaatan_barang_check");
        if ($pemanfaatan_barang_check != "") {
          foreach ($pemanfaatan_barang_check as $a) {
            $mulai_pemanfaatan_barang = $this->input->post("mulai_pemanfaatan_barang" . $a);
            $akhir_pemanfaatan_barang = $this->input->post("akhir_pemanfaatan_barang" . $a);
            $this->m_sirup->insert_pemanfaatan_barang($mulai_pemanfaatan_barang . "|" . $akhir_pemanfaatan_barang, $id_sirup);
          }
        }
        $pelaksanaan_kontrak_check = $this->input->post("pelaksanaan_kontrak_check");
        if ($pelaksanaan_kontrak_check != "") {
          foreach ($pelaksanaan_kontrak_check as $a) {
            $mulai_pelaksanaan_kontrak = $this->input->post("mulai_pelaksanaan_kontrak" . $a);
            $akhir_pelaksanaan_kontrak = $this->input->post("akhir_pelaksanaan_kontrak" . $a);
            $this->m_sirup->insert_jadwal_pelaksanaan($mulai_pelaksanaan_kontrak . "|" . $akhir_pelaksanaan_kontrak, $id_sirup);
          }
        }
        $pemilihan_penyedia_check = $this->input->post("pemilihan_penyedia_check");
        if ($pemilihan_penyedia_check != "") {
          foreach ($pemilihan_penyedia_check as $a) {
            $mulai_pemilihan_penyedia = $this->input->post("mulai_pemilihan_penyedia" . $a);
            $akhir_pemilihan_penyedia = $this->input->post("akhir_pemilihan_penyedia" . $a);
            $this->m_sirup->insert_pemilihan_penyedia($mulai_pemilihan_penyedia . "|" . $akhir_pemilihan_penyedia, $id_sirup);
          }
        }
        $response["msg"] = "Data SiRUP {$kode_rup} berhasil ditambahkan";
        $response["status"] = true;
      } else {
        $response["status"] = false;
        $response["msg"] = "Kode RUP sudah terdaftar";
      }
    } else {
      $response["status"] = false;
      $response["msg"] = str_replace("</p>", "", str_replace("<p>", "", validation_errors()));
    }
    echo json_encode($response);
  }
  public function update()
  {
    $this->form_validation->set_rules("id_sirup", "ID Sirup", "required");
    $this->form_validation->set_rules("kode_rup", "kode_rup", "required", array(
      "is_unique" => "Sirup RUP telah terdaftar, tolong masukkan RUP yang berbeda."
    ));
    $this->form_validation->set_rules("nama_paket", "nama_paket", "required");
    $this->form_validation->set_rules("nama_klpd", "nama_klpd", "required");
    $this->form_validation->set_rules("satuan_kerja", "satuan_kerja", "required");
    $this->form_validation->set_rules("tahun_anggaran", "tahun_anggaran", "required");
    $this->form_validation->set_rules("volume_pekerjaan", "volume_pekerjaan", "required");
    $this->form_validation->set_rules("uraian_pekerjaan", "uraian_pekerjaan", "required");
    $this->form_validation->set_rules("spesifikasi_pekerjaan", "spesifikasi_pekerjaan", "required");
    $this->form_validation->set_rules("produk_dalam_negeri", "produk_dalam_negeri", "required");
    $this->form_validation->set_rules("usaha_kecil", "usaha_kecil", "required");
    $this->form_validation->set_rules("pra_dipa_dpa", "pra_dipa_dpa", "required");
    $this->form_validation->set_rules("jenis_pengadaan", "jenis_pengadaan", "required");
    $this->form_validation->set_rules("total_pagu", "total_pagu", "required");
    $this->form_validation->set_rules("metode_pemilihan", "metode_pemilihan", "required");
    $this->form_validation->set_rules("histori_paket", "histori_paket", "required");
    $this->form_validation->set_rules("tgl_perbarui_paket", "tgl_perbarui_paket", "required");
    if ($this->form_validation->run()) {

      $id_pk_sirup = $this->input->post("id_sirup");
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
      $tgl_perbaharui_paket = $this->input->post("tgl_perbarui_paket");

      $this->load->model("m_sirup");
      if ($this->m_sirup->check_duplicate_update($id_pk_sirup, $kode_rup)->num_rows() == 0) {
        $this->m_sirup->update($id_pk_sirup, $kode_rup, $nama_paket, $nama_klpd, $satuan_kerja, $tahun_anggaran, $volume_pekerjaan, $uraian_pekerjaan, $spesifikasi_pekerjaan, $produk_dalam_negeri, $usaha_kecil, $pra_dipa_dpa, $jenis_pengadaan, $total_pagu, $metode_pemilihan, $histori_paket, $tgl_perbaharui_paket);


        $lokasi_pekerjaan_check = $this->input->post("lokasi_pekerjaan_check");
        if ($lokasi_pekerjaan_check != "") {
          foreach ($lokasi_pekerjaan_check as $a) {
            $provinsi = $this->input->post("provinsi" . $a);
            $kabupaten = $this->input->post("kabupaten" . $a);
            $detail_lokasi = $this->input->post("detail_lokasi" . $a);
            $this->m_sirup->insert_lokasi_pekerjaan($provinsi . "|" . $kabupaten . "|" . $detail_lokasi, $id_pk_sirup);
          }
        }

        $sumber_dana_check = $this->input->post("sumber_dana_check");
        if ($sumber_dana_check != "") {
          foreach ($sumber_dana_check as $a) {
            $sumber_dana = $this->input->post("sumber_dana" . $a);
            $ta = $this->input->post("ta" . $a);
            $klpd = $this->input->post("klpd" . $a);
            $mak = $this->input->post("mak" . $a);
            $pagu = $this->input->post("pagu" . $a);
            $this->m_sirup->insert_sumber_dana($sumber_dana . "|" . $ta . "|" . $klpd . "|" . $mak . "|" . $pagu, $id_pk_sirup);
          }
        }

        $pemanfaatan_barang_check = $this->input->post("pemanfaatan_barang_check");
        if ($pemanfaatan_barang_check != "") {
          foreach ($pemanfaatan_barang_check as $a) {
            $mulai_pemanfaatan_barang = $this->input->post("mulai_pemanfaatan_barang" . $a);
            $akhir_pemanfaatan_barang = $this->input->post("akhir_pemanfaatan_barang" . $a);
            $this->m_sirup->insert_pemanfaatan_barang($mulai_pemanfaatan_barang . "|" . $akhir_pemanfaatan_barang, $id_pk_sirup);
          }
        }

        $pelaksanaan_kontrak_check = $this->input->post("pelaksanaan_kontrak_check");
        if ($pelaksanaan_kontrak_check != "") {
          foreach ($pelaksanaan_kontrak_check as $a) {
            $mulai_pelaksanaan_kontrak = $this->input->post("mulai_pelaksanaan_kontrak" . $a);
            $akhir_pelaksanaan_kontrak = $this->input->post("akhir_pelaksanaan_kontrak" . $a);
            $this->m_sirup->insert_jadwal_pelaksanaan($mulai_pelaksanaan_kontrak . "|" . $akhir_pelaksanaan_kontrak, $id_pk_sirup);
          }
        }

        $pemilihan_penyedia_check = $this->input->post("pemilihan_penyedia_check");
        if ($pemilihan_penyedia_check != "") {
          foreach ($pemilihan_penyedia_check as $a) {
            $mulai_pemilihan_penyedia = $this->input->post("mulai_pemilihan_penyedia" . $a);
            $akhir_pemilihan_penyedia = $this->input->post("akhir_pemilihan_penyedia" . $a);
            $this->m_sirup->insert_pemilihan_penyedia($mulai_pemilihan_penyedia . "|" . $akhir_pemilihan_penyedia, $id_pk_sirup);
          }
        }

        $edit_lokasi_pekerjaan = $this->input->post("edit_lokasi_pekerjaan");
        if ($edit_lokasi_pekerjaan != "") {
          foreach ($edit_lokasi_pekerjaan as $a) {
            $edit_id_pk_lokasi_pekerjaan = $this->input->post("edit_id_pk_lokasi_pekerjaan" . $a);
            $edit_provinsi = $this->input->post("edit_provinsi" . $a);
            $edit_kabupaten = $this->input->post("edit_kabupaten" . $a);
            $edit_detail_lokasi = $this->input->post("edit_detail_lokasi" . $a);
            $this->m_sirup->update_lokasi_pekerjaan($edit_id_pk_lokasi_pekerjaan, trim($edit_provinsi) . "|" . trim($edit_kabupaten) . "|" . trim($edit_detail_lokasi));
          }
        }

        $edit_sumber_dana = $this->input->post("edit_sumber_dana");
        if ($edit_sumber_dana != "") {
          foreach ($edit_sumber_dana as $a) {
            $edit_id_pk_sumber_dana = $this->input->post("edit_id_pk_sumber_dana" . $a);
            $edit_sumber_dana = $this->input->post("edit_sumber_dana" . $a);
            $edit_ta = $this->input->post("edit_ta" . $a);
            $edit_klpd = $this->input->post("edit_klpd" . $a);
            $edit_mak = $this->input->post("edit_mak" . $a);
            $edit_pagu = $this->input->post("edit_pagu" . $a);
            $this->m_sirup->update_sumber_dana($edit_id_pk_sumber_dana, trim($edit_sumber_dana) . "|" . trim($edit_ta) . "|" . trim($edit_klpd) . "|" . trim($edit_mak) . "|" . trim($edit_pagu));
          }
        }

        $edit_pemanfaatan_barang = $this->input->post("edit_pemanfaatan_barang");
        if ($edit_pemanfaatan_barang != "") {
          foreach ($edit_pemanfaatan_barang as $a) {
            $edit_id_pk_pemanfaatan_barang = $this->input->post("edit_id_pk_pemanfaatan_barang" . $a);
            $edit_mulai_pemanfaatan_barang = $this->input->post("edit_mulai_pemanfaatan_barang" . $a);
            $edit_akhir_pemanfaatan_barang = $this->input->post("edit_akhir_pemanfaatan_barang" . $a);
            $this->m_sirup->update_pemanfaatan_barang($edit_id_pk_pemanfaatan_barang, trim($edit_mulai_pemanfaatan_barang) . "|" . trim($edit_akhir_pemanfaatan_barang));
          }
        }

        $edit_jadwal_pelaksanaan = $this->input->post("edit_jadwal_pelaksanaan");
        if ($edit_jadwal_pelaksanaan != "") {
          foreach ($edit_jadwal_pelaksanaan as $a) {
            $edit_id_pk_jadwal_pelaksanaan = $this->input->post("edit_id_pk_jadwal_pelaksanaan" . $a);
            $edit_mulai_jadwal_pelaksanaan = $this->input->post("edit_mulai_jadwal_pelaksanaan" . $a);
            $edit_akhir_jadwal_pelaksanaan = $this->input->post("edit_akhir_jadwal_pelaksanaan" . $a);
            $this->m_sirup->update_jadwal_pelaksanaan($edit_id_pk_jadwal_pelaksanaan, trim($edit_mulai_jadwal_pelaksanaan) . "|" . trim($edit_akhir_jadwal_pelaksanaan));
          }
        }

        $edit_pemilihan_penyedia = $this->input->post("edit_pemilihan_penyedia");
        if ($edit_pemilihan_penyedia != "") {
          foreach ($edit_pemilihan_penyedia as $a) {
            $edit_id_pk_pemilihan_penyedia = $this->input->post("edit_id_pk_pemilihan_penyedia" . $a);
            $edit_mulai_pemilihan_penyedia = $this->input->post("edit_mulai_pemilihan_penyedia" . $a);
            $edit_akhir_pemilihan_penyedia = $this->input->post("edit_akhir_pemilihan_penyedia" . $a);
            $this->m_sirup->update_pemilihan_penyedia($edit_id_pk_pemilihan_penyedia, trim($edit_mulai_pemilihan_penyedia) . "|" . trim($edit_akhir_pemilihan_penyedia));
          }
        }
        $response["status"] = true;
        $response["msg"] = "Data SiRUP {$kode_rup} berhasil diubah";
      } else {
        $response["status"] = false;
        $response["msg"] = "Kode RUP sudah terdaftar";
      }
    } else {
      $response["status"] = false;
      $response["msg"] = str_replace("</p>", "", str_replace("<p>", "", validation_errors()));
    }
    echo json_encode($response);
  }
  public function delete_lokasi_pekerjaan($id)
  {
    if (is_numeric($id)) {
      $this->load->model("m_sirup");
      $this->m_sirup->delete_lokasi_pekerjaan($id);
      $response["status"] = true;
      $response["msg"] = "Data lokasi pekerjaan berhasil dihapus";
    } else {
      $response["status"] = false;
      $response["msg"] = "ID tidak valid";
    }
    echo json_encode($response);
  }
  public function delete_sumber_dana($id)
  {
    if (is_numeric($id)) {
      $this->load->model("m_sirup");
      $this->m_sirup->delete_sumber_dana($id);
      $response["status"] = true;
      $response["msg"] = "Data sumber dana berhasil dihapus";
    } else {
      $response["status"] = false;
      $response["msg"] = "ID tidak valid";
    }
    echo json_encode($response);
  }
  public function delete_pemanfaatan_barang($id)
  {
    if (is_numeric($id)) {
      $this->load->model("m_sirup");
      $this->m_sirup->delete_pemanfaatan_barang($id);
      $response["status"] = true;
      $response["msg"] = "Data pemanfaatan barang berhasil dihapus";
    } else {
      $response["status"] = false;
      $response["msg"] = "ID tidak valid";
    }
    echo json_encode($response);
  }
  public function delete_pelaksanaan_kontrak($id)
  {
    if (is_numeric($id)) {
      $this->load->model("m_sirup");
      $this->m_sirup->delete_pelaksanaan_kontrak($id);
      $response["status"] = true;
      $response["msg"] = "Data pelaksanaan kontrak berhasil dihapus";
    } else {
      $response["status"] = false;
      $response["msg"] = "ID tidak valid";
    }
    echo json_encode($response);
  }
  public function delete_pemilihan_penyedia($id)
  {
    if (is_numeric($id)) {
      $this->load->model("m_sirup");
      $this->m_sirup->delete_pemilihan_penyedia($id);
      $response["status"] = true;
      $response["msg"] = "Data pemilihan penyedia berhasil dihapus";
    } else {
      $response["status"] = false;
      $response["msg"] = "ID tidak valid";
    }
    echo json_encode($response);
  }
}
