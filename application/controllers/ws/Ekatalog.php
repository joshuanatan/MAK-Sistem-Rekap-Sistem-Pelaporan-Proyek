<?php
class Ekatalog extends CI_Controller{
  public function insert(){
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
    $this->m_ekatalog->insert($ekatalog_komoditas,$ekatalog_id_paket,$ekatalog_nama_paket,$ekatalog_instansi,$ekatalog_satuan_kerja,$ekatalog_npwp_satuan_kerja,$ekatalog_alamat_satuan_kerja,$ekatalog_alamat_pengiriman,$ekatalog_tgl_buat_online,$ekatalog_tgl_ubah_online,$ekatalog_tahun_anggaran,$ekatalog_total_produk,$ekatalog_total_harga,$ekatalog_status_paket,$ekatalog_posisi_paket);
    $response["status"] = true;
    echo json_encode($response);
  }
  public function update(){
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
    $this->m_ekatalog->update($id_pk_ekatalog,$ekatalog_komoditas,$ekatalog_id_paket,$ekatalog_nama_paket,$ekatalog_instansi,$ekatalog_satuan_kerja,$ekatalog_npwp_satuan_kerja,$ekatalog_alamat_satuan_kerja,$ekatalog_alamat_pengiriman,$ekatalog_tgl_buat_online,$ekatalog_tgl_ubah_online,$ekatalog_tahun_anggaran,$ekatalog_total_produk,$ekatalog_total_harga,$ekatalog_status_paket,$ekatalog_posisi_paket);
    $response["status"] = true;
    echo json_encode($response);
  }
  public function delete($id_pk_ekatalog){
    $this->load->model("m_ekatalog");
    $this->m_ekatalog->delete($id_pk_ekatalog);
    $response["status"] = true;
    echo json_encode($response);
  }
  public function get_data(){
    $kolom_pengurutan = $this->input->get("kolom_pengurutan");
    $arah_kolom_pengurutan = $this->input->get("arah_kolom_pengurutan");
    $pencarian_phrase = $this->input->get("pencarian_phrase");
    $kolom_pencarian = $this->input->get("kolom_pencarian");
    $current_page = $this->input->get("current_page");
    $this->load->model("m_ekatalog");
    $response["data"] = $this->m_ekatalog->search($kolom_pengurutan,$arah_kolom_pengurutan,$pencarian_phrase,$kolom_pencarian,$current_page)->result_array();
    #echo $this->db->last_query();
    $total_data = $this->m_ekatalog->get($kolom_pengurutan,$arah_kolom_pengurutan,$pencarian_phrase,$kolom_pencarian,$current_page)->num_rows();

    $this->load->library("pagination");
    $response["page"] = $this->pagination->generate_pagination_rules($current_page,$total_data,20);
    
    echo json_encode($response);
  }
}