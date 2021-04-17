<?php

class Produk extends CI_Controller{

    public function index(){
      $this->load->model("m_produk");
      $result = $this->m_produk->get_produk();

      $data = array (
        "datadb" => $result->result_array()
      );
      $this->load->view("produk/new_index",$data);
    }


    public function insert() {
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
  		$this->m_produk->insert_produk($temp_produk_no_katalog,$temp_produk_principal,$temp_produk_no_sap,$temp_produk_nama,$temp_produk_kategori,$temp_produk_price_list,$temp_produk_harga_ekat,$temp_produk_deskripsi, $temp_produk_status);
      Redirect("produk/index");
  	}

    public function delete($id_pk_produk) {
      $this->load->model("m_produk");
      $this->m_produk->delete_produk($id_pk_produk);
      Redirect("produk/index");
    }

    public function edit() {
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
      $this->m_produk->edit_produk($temp_id_pk_produk, $temp_produk_no_katalog, $temp_produk_principal, $temp_produk_no_sap, $temp_produk_nama, $temp_produk_kategori, $temp_produk_price_list, $temp_produk_harga_ekat, $temp_produk_deskripsi);
      Redirect("produk/index");
    }

}
?>
