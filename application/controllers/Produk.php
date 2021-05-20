<?php

class Produk extends CI_Controller
{
  public function index()
  {
    $this->load->model("m_produk");

    $data["field"] = array(
      array(
        "field_value" => "produk_no_katalog",
        "field_text" => "No Katalog Produk"
      ),
      array(
        "field_value" => "produk_principal",
        "field_text" => "Principle"
      ),
      array(
        "field_value" => "produk_no_sap",
        "field_text" => "No SAP"
      ),
      array(
        "field_value" => "produk_nama",
        "field_text" => "Nama Produk"
      ),
      array(
        "field_value" => "produk_kategori",
        "field_text" => "Kategori"
      ),
      array(
        "field_value" => "produk_price_list",
        "field_text" => "Price List"
      ),
      array(
        "field_value" => "produk_harga_ekat",
        "field_text" => "Harga Ekatalog"
      )
    );
    $this->load->view("produk/index", $data);
  }
  public function insert()
  {
    $config['upload_path'] = './docs/upload/image/produk/';
    $config['allowed_types'] = 'gif|jpg|png';

    $this->load->library('upload', $config);

    $temp_produk_file = "";
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
    redirect("produk/index");
  }
  public function delete($id_pk_produk)
  {
    $this->load->model("m_produk");
    $this->m_produk->delete_produk($id_pk_produk);
    redirect("produk/index");
  }
  public function edit()
  {
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
    redirect("produk/index");
  }
}
