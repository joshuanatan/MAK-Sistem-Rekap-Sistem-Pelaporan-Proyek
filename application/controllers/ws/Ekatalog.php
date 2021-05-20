<?php
class Ekatalog extends CI_Controller
{
  public function get_ekatalog_produk($id_pk_ekatalog)
  {
    $this->load->model("m_ekatalog_produk");
    $result = $this->m_ekatalog_produk->get_ekatalog_produk($id_pk_ekatalog);
    echo json_encode($result->result_array());
  }
  public function insert()
  {
    $this->form_validation->set_rules("komoditas", "Komoditas", "required");
    $this->form_validation->set_rules("id_paket", "ID Paket", "required");
    $this->form_validation->set_rules("nama_paket", "Nama Paket", "required");
    $this->form_validation->set_rules("instansi", "Instansi", "required");
    $this->form_validation->set_rules("satuan_kerja", "Satuan Kerja", "required");
    $this->form_validation->set_rules("npwp_satuan_kerja", "NPWP Satuan Kerja", "required");
    $this->form_validation->set_rules("alamat_satuan_kerja", "Alamat Satuan Kerja", "required");
    $this->form_validation->set_rules("alamat_pengiriman", "Alamat Pengiriman", "required");
    $this->form_validation->set_rules("tgl_buat_online", "Tanggal Buat", "required");
    $this->form_validation->set_rules("tgl_ubah_online", "Tanggal Ubah", "required");
    $this->form_validation->set_rules("tahun_anggaran", "Tahun Anggaran", "required");
    $this->form_validation->set_rules("total_produk", "Total Produk", "required");
    $this->form_validation->set_rules("total_harga", "Total Harga", "required");
    $this->form_validation->set_rules("status_paket", "Status Paket", "required");
    $this->form_validation->set_rules("posisi_paket", "Posisi Paket", "required");
    if ($this->form_validation->run()) {
      $ekatalog_komoditas = $this->input->post("komoditas");
      $ekatalog_id_paket = $this->input->post("id_paket");
      $ekatalog_nama_paket = $this->input->post("nama_paket");
      $ekatalog_instansi = $this->input->post("instansi");
      $ekatalog_satuan_kerja = $this->input->post("satuan_kerja");
      $ekatalog_npwp_satuan_kerja = $this->input->post("npwp_satuan_kerja");
      $ekatalog_alamat_satuan_kerja = $this->input->post("alamat_satuan_kerja");
      $ekatalog_alamat_pengiriman = $this->input->post("alamat_pengiriman");
      $ekatalog_tgl_buat_online = $this->input->post("tgl_buat_online");
      $ekatalog_tgl_ubah_online = $this->input->post("tgl_ubah_online");
      $ekatalog_tahun_anggaran = $this->input->post("tahun_anggaran");
      $ekatalog_total_produk = $this->input->post("total_produk");
      $ekatalog_total_harga = $this->input->post("total_harga");
      $ekatalog_status_paket = $this->input->post("status_paket");
      $ekatalog_posisi_paket = $this->input->post("posisi_paket");

      $this->load->model("m_ekatalog");
      $id_ekatalog = $this->m_ekatalog->insert($ekatalog_komoditas, $ekatalog_id_paket, $ekatalog_nama_paket, $ekatalog_instansi, $ekatalog_satuan_kerja, $ekatalog_npwp_satuan_kerja, $ekatalog_alamat_satuan_kerja, $ekatalog_alamat_pengiriman, $ekatalog_tgl_buat_online, $ekatalog_tgl_ubah_online, $ekatalog_tahun_anggaran, $ekatalog_total_produk, $ekatalog_total_harga, $ekatalog_status_paket, $ekatalog_posisi_paket);

      $check = $this->input->post("produk_ekatalog");
      if ($check != "") {
        $this->load->model("m_ekatalog_produk");
        foreach ($check as $a) {
          $ekatalog_produk_nama_produk = $this->input->post("ekatalog_produk_nama_produk" . $a);
          $ekatalog_produk_kuantitas = $this->input->post("ekatalog_produk_kuantitas" . $a);
          $ekatalog_produk_mata_uang = $this->input->post("ekatalog_produk_mata_uang" . $a);
          $ekatalog_produk_harga_satuan = $this->input->post("ekatalog_produk_harga_satuan" . $a);
          $ekatalog_produk_perkiraan_ongkos_kirim = $this->input->post("ekatalog_produk_perkiraan_ongkos_kirim" . $a);
          $ekatalog_produk_total_harga = $this->input->post("ekatalog_produk_total_harga" . $a);
          $ekatalog_produk_catatan = $this->input->post("ekatalog_produk_catatan" . $a);

          $this->m_ekatalog_produk->insert($id_ekatalog, $ekatalog_produk_nama_produk, $ekatalog_produk_kuantitas, $ekatalog_produk_mata_uang, $ekatalog_produk_harga_satuan, $ekatalog_produk_perkiraan_ongkos_kirim, $ekatalog_produk_total_harga, $ekatalog_produk_catatan);
        }
      }
      $response["status"] = true;
    } else {
      $response["status"] = false;
      $response["msg"] = str_replace("</p>", "", str_replace("<p>", "", validation_errors()));
    }
    echo json_encode($response);
  }
  public function update()
  {
    $this->form_validation->set_rules("id_ekatalog", "ID Ekatalog", "required");
    $this->form_validation->set_rules("komoditas", "Komoditas", "required");
    $this->form_validation->set_rules("id_paket", "ID Paket", "required");
    $this->form_validation->set_rules("nama_paket", "Nama Paket", "required");
    $this->form_validation->set_rules("instansi", "Instansi", "required");
    $this->form_validation->set_rules("satuan_kerja", "Satuan Kerja", "required");
    $this->form_validation->set_rules("npwp_satuan_kerja", "NPWP Satuan Kerja", "required");
    $this->form_validation->set_rules("alamat_satuan_kerja", "Alamat Satuan Kerja", "required");
    $this->form_validation->set_rules("alamat_pengiriman", "Alamat Pengiriman", "required");
    $this->form_validation->set_rules("tgl_buat_online", "Tanggal Buat", "required");
    $this->form_validation->set_rules("tgl_ubah_online", "Tanggal Ubah", "required");
    $this->form_validation->set_rules("tahun_anggaran", "Tahun Anggaran", "required");
    $this->form_validation->set_rules("total_produk", "Total Produk", "required");
    $this->form_validation->set_rules("total_harga", "Total Harga", "required");
    $this->form_validation->set_rules("status_paket", "Status Paket", "required");
    $this->form_validation->set_rules("posisi_paket", "Posisi Paket", "required");
    if ($this->form_validation->run()) {
      $id_pk_ekatalog = $this->input->post("id_ekatalog");
      $ekatalog_komoditas = $this->input->post("komoditas");
      $ekatalog_id_paket = $this->input->post("id_paket");
      $ekatalog_nama_paket = $this->input->post("nama_paket");
      $ekatalog_instansi = $this->input->post("instansi");
      $ekatalog_satuan_kerja = $this->input->post("satuan_kerja");
      $ekatalog_npwp_satuan_kerja = $this->input->post("npwp_satuan_kerja");
      $ekatalog_alamat_satuan_kerja = $this->input->post("alamat_satuan_kerja");
      $ekatalog_alamat_pengiriman = $this->input->post("alamat_pengiriman");
      $ekatalog_tgl_buat_online = $this->input->post("tgl_buat_online");
      $ekatalog_tgl_ubah_online = $this->input->post("tgl_ubah_online");
      $ekatalog_tahun_anggaran = $this->input->post("tahun_anggaran");
      $ekatalog_total_produk = $this->input->post("total_produk");
      $ekatalog_total_harga = $this->input->post("total_harga");
      $ekatalog_status_paket = $this->input->post("status_paket");
      $ekatalog_posisi_paket = $this->input->post("posisi_paket");

      $this->load->model("m_ekatalog");
      $this->m_ekatalog->update($id_pk_ekatalog, $ekatalog_komoditas, $ekatalog_id_paket, $ekatalog_nama_paket, $ekatalog_instansi, $ekatalog_satuan_kerja, $ekatalog_npwp_satuan_kerja, $ekatalog_alamat_satuan_kerja, $ekatalog_alamat_pengiriman, $ekatalog_tgl_buat_online, $ekatalog_tgl_ubah_online, $ekatalog_tahun_anggaran, $ekatalog_total_produk, $ekatalog_total_harga, $ekatalog_status_paket, $ekatalog_posisi_paket);

      $checks = $this->input->post("edit_produk_ekatalog");
      if ($checks != "") {
        $this->load->model("m_ekatalog_produk");
        foreach ($checks as $a) {
          $id_ekatalog_produk = $this->input->post("id_ekatalog_produk" . $a);
          $ekatalog_produk_nama_produk = $this->input->post("ekatalog_produk_nama_produk" . $a);
          $ekatalog_produk_kuantitas = $this->input->post("ekatalog_produk_kuantitas" . $a);
          $ekatalog_produk_mata_uang = $this->input->post("ekatalog_produk_mata_uang" . $a);
          $ekatalog_produk_harga_satuan = $this->input->post("ekatalog_produk_harga_satuan" . $a);
          $ekatalog_produk_perkiraan_ongkos_kirim = $this->input->post("ekatalog_produk_perkiraan_ongkos_kirim" . $a);
          $ekatalog_produk_total_harga = $this->input->post("ekatalog_produk_total_harga" . $a);
          $ekatalog_produk_catatan = $this->input->post("ekatalog_produk_catatan" . $a);

          $this->m_ekatalog_produk->update($id_ekatalog_produk, $ekatalog_produk_nama_produk, $ekatalog_produk_kuantitas, $ekatalog_produk_mata_uang, $ekatalog_produk_harga_satuan, $ekatalog_produk_perkiraan_ongkos_kirim, $ekatalog_produk_total_harga, $ekatalog_produk_catatan);
        }
      }
      $checks = $this->input->post("produk_ekatalog");
      if ($checks != "") {
        foreach ($checks as $a) {
          $ekatalog_produk_nama_produk = $this->input->post("ekatalog_produk_nama_produk" . $a);
          $ekatalog_produk_kuantitas = $this->input->post("ekatalog_produk_kuantitas" . $a);
          $ekatalog_produk_mata_uang = $this->input->post("ekatalog_produk_mata_uang" . $a);
          $ekatalog_produk_harga_satuan = $this->input->post("ekatalog_produk_harga_satuan" . $a);
          $ekatalog_produk_perkiraan_ongkos_kirim = $this->input->post("ekatalog_produk_perkiraan_ongkos_kirim" . $a);
          $ekatalog_produk_total_harga = $this->input->post("ekatalog_produk_total_harga" . $a);
          $ekatalog_produk_catatan = $this->input->post("ekatalog_produk_catatan" . $a);

          $this->m_ekatalog_produk->insert($id_pk_ekatalog, $ekatalog_produk_nama_produk, $ekatalog_produk_kuantitas, $ekatalog_produk_mata_uang, $ekatalog_produk_harga_satuan, $ekatalog_produk_perkiraan_ongkos_kirim, $ekatalog_produk_total_harga, $ekatalog_produk_catatan);
        }
      }
      $response["status"] = true;
    } else {
      $response["status"] = false;
      $response["msg"] = str_replace("</p>", "", str_replace("<p>", "", validation_errors()));
    }
    echo json_encode($response);
  }
  public function delete($id_pk_ekatalog)
  {
    if ($id_pk_ekatalog != "") {
      $this->load->model("m_ekatalog");
      $this->m_ekatalog->delete($id_pk_ekatalog);
      $response["status"] = true;
    } else {
      $response["status"] = false;
    }
    echo json_encode($response);
  }
  public function get_data()
  {
    $kolom_pengurutan = $this->input->get("kolom_pengurutan");
    $arah_kolom_pengurutan = $this->input->get("arah_kolom_pengurutan");
    $pencarian_phrase = $this->input->get("pencarian_phrase");
    $kolom_pencarian = $this->input->get("kolom_pencarian");
    $current_page = $this->input->get("current_page");
    $this->load->model("m_ekatalog");
    $response["data"] = $this->m_ekatalog->search($kolom_pengurutan, $arah_kolom_pengurutan, $pencarian_phrase, $kolom_pencarian, $current_page)->result_array();
    #echo $this->db->last_query();
    $total_data = $this->m_ekatalog->get($kolom_pengurutan, $arah_kolom_pengurutan, $pencarian_phrase, $kolom_pencarian, $current_page)->num_rows();

    $this->load->library("pagination");
    $response["page"] = $this->pagination->generate_pagination_rules($current_page, $total_data, 20);

    echo json_encode($response);
  }
  public function delete_ekatalog_produk($id_pk_ekatalog_produk)
  {
    $this->load->model("m_ekatalog_produk");
    $this->m_ekatalog_produk->delete($id_pk_ekatalog_produk);
    $response["status"] = true;
    echo json_encode($response);
  }
}
