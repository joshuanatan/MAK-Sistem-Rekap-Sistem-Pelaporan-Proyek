<?php
class Produk extends CI_Controller
{
  public function get_data()
  {
    $kolom_pengurutan = $this->input->get("kolom_pengurutan");
    $arah_kolom_pengurutan = $this->input->get("arah_kolom_pengurutan");
    $pencarian_phrase = $this->input->get("pencarian_phrase");
    $kolom_pencarian = $this->input->get("kolom_pencarian");
    $current_page = $this->input->get("current_page");
    $this->load->model("m_produk");
    $response["data"] = $this->m_produk->search($kolom_pengurutan, $arah_kolom_pengurutan, $pencarian_phrase, $kolom_pencarian, $current_page)->result_array();
    $total_data = $this->m_produk->get_produk($kolom_pengurutan, $arah_kolom_pengurutan, $pencarian_phrase, $kolom_pencarian, $current_page)->num_rows();

    $this->load->library("pagination");
    $response["page"] = $this->pagination->generate_pagination_rules($current_page, $total_data, 20);

    echo json_encode($response);
  }
  public function insert()
  {
    $this->form_validation->set_rules('nokatalogproduk', 'No Katalog Produk', 'required');
    $this->form_validation->set_rules('principalproduk', 'Princple', 'required');
    $this->form_validation->set_rules('nosapproduk', 'Nomor Produk SAP', 'required');
    $this->form_validation->set_rules('namaproduk', 'Nama Produk', 'required');
    $this->form_validation->set_rules('kategoriproduk', 'Kategori Produk', 'required');
    $this->form_validation->set_rules('pricelistproduk', 'Price List Produk', 'required|integer');
    $this->form_validation->set_rules('hargaekatproduk', 'Harga E-katalog', 'required|integer');
    $this->form_validation->set_rules('deskripsiproduk', 'Deskripsi Produk', 'required');
    if (!$this->form_validation->run()) {
      $response["status"] = false;
      $response["msg"] = str_replace("</p>", "", str_replace("<p>", "", validation_errors()));
    } else {
      $config['upload_path'] = './docs/upload/image/produk/';
      $config['allowed_types'] = 'gif|jpg|png';

      $this->load->library('upload', $config);

      $temp_produk_file = "default.png";
      if ($this->upload->do_upload('foto_produk')) {
        $data = $this->upload->data();
        $temp_produk_file = $data["file_name"];
      }

      $temp_produk_no_katalog = $this->input->post('nokatalogproduk');
      $temp_produk_principal = $this->input->post('principalproduk');
      $temp_produk_no_sap = $this->input->post('nosapproduk');
      $temp_produk_nama = $this->input->post('namaproduk');
      $temp_produk_kategori = $this->input->post('kategoriproduk');
      $temp_produk_price_list = $this->input->post('pricelistproduk');
      $temp_produk_harga_ekat = $this->input->post('hargaekatproduk');
      $temp_produk_deskripsi = $this->input->post('deskripsiproduk');
      $temp_produk_status = "aktif";
      $this->load->model("m_produk");
      $this->m_produk->insert($temp_produk_no_katalog, $temp_produk_principal, $temp_produk_no_sap, $temp_produk_nama, $temp_produk_kategori, $temp_produk_price_list, $temp_produk_harga_ekat, $temp_produk_deskripsi, $temp_produk_file, $temp_produk_status);
      $response["status"] = true;
    }
    echo json_encode($response);
  }
  public function delete($id_pk_produk)
  {
    if ($id_pk_produk == "") {
      $response["status"] = false;
      $response["msg"] = "The ID Produk field is required";
    } else {
      $this->load->model("m_produk");
      $this->m_produk->delete_produk($id_pk_produk);
      $response["status"] = true;
    }
    echo json_encode($response);
  }
  public function update()
  {
    $this->form_validation->set_rules('idproduk', 'ID Produk', 'required');
    $this->form_validation->set_rules('nokatalogproduk', 'No Katalog Produk', 'required');
    $this->form_validation->set_rules('principalproduk', 'Princple', 'required');
    $this->form_validation->set_rules('nosapproduk', 'Nomor Produk SAP', 'required');
    $this->form_validation->set_rules('namaproduk', 'Nama Produk', 'required');
    $this->form_validation->set_rules('kategoriproduk', 'Kategori Produk', 'required');
    $this->form_validation->set_rules('pricelistproduk', 'Price List Produk', 'required|integer');
    $this->form_validation->set_rules('hargaekatproduk', 'Harga E-katalog', 'required|integer');
    $this->form_validation->set_rules('deskripsiproduk', 'Deskripsi Produk', 'required');
    if (!$this->form_validation->run()) {
      $response["status"] = false;
      $response["msg"] = str_replace("</p>", "", str_replace("<p>", "", validation_errors()));
    } else {
      $config['upload_path'] = './docs/upload/image/produk/';
      $config['allowed_types'] = 'gif|jpg|png';

      $this->load->library('upload', $config);

      $temp_produk_file = $this->input->post("foto_produk_current");
      if ($this->upload->do_upload('foto_produk')) {
        $data = $this->upload->data();
        $temp_produk_file = $data["file_name"];
      }

      $temp_id_pk_produk = $this->input->post('idproduk');
      $temp_produk_no_katalog = $this->input->post('nokatalogproduk');
      $temp_produk_principal = $this->input->post('principalproduk');
      $temp_produk_no_sap = $this->input->post('nosapproduk');
      $temp_produk_nama = $this->input->post('namaproduk');
      $temp_produk_kategori = $this->input->post('kategoriproduk');
      $temp_produk_price_list = $this->input->post('pricelistproduk');
      $temp_produk_harga_ekat = $this->input->post('hargaekatproduk');
      $temp_produk_deskripsi = $this->input->post('deskripsiproduk');
      $this->load->model("m_produk");
      $this->m_produk->edit_produk($temp_id_pk_produk, $temp_produk_no_katalog, $temp_produk_principal, $temp_produk_no_sap, $temp_produk_nama, $temp_produk_kategori, $temp_produk_price_list, $temp_produk_harga_ekat, $temp_produk_deskripsi, $temp_produk_file);
      $response["status"] = true;
    }
    echo json_encode($response);
  }
}
