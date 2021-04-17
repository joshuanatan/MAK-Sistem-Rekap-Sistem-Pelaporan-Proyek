<?php
date_default_timezone_set("Asia/Jakarta");
class M_produk extends CI_Model{
    public function get_produk(){
    $sql = "SELECT id_pk_produk, produk_no_katalog, produk_principal, produk_no_sap, produk_nama, produk_kategori, produk_price_list, produk_harga_ekat, produk_deskripsi,produk_foto  FROM mstr_produk WHERE produk_status = 'aktif'";
    $result = $this->db->query($sql);
    return $result;
    }

    public function insert($produk_no_katalog, $produk_principal, $produk_no_sap, $produk_nama, $produk_kategori, $produk_price_list, $produk_harga_ekat, $produk_deskripsi, $produk_foto, $produk_status) {
    $data = array(
      "produk_no_katalog"=>$produk_no_katalog,
      "produk_principal"=>$produk_principal,
      "produk_no_sap"=>$produk_no_sap,
      "produk_nama"=>$produk_nama,
      "produk_kategori"=>$produk_kategori,
      "produk_price_list"=>$produk_price_list,
      "produk_harga_ekat"=>$produk_harga_ekat,
      "produk_deskripsi"=>$produk_deskripsi,
      "produk_foto"=>$produk_foto,
      "produk_status"=>"aktif"
    );
    $this->db->insert("mstr_produk",$data);
  }

  public function delete_produk($id_pk_produk) {
    $sql = "UPDATE mstr_produk SET produk_status = 'nonaktif' WHERE id_pk_produk = $id_pk_produk";
    $result = $this->db->query($sql);
  }

  public function edit_produk($id_pk_produk, $produk_no_katalog, $produk_principal, $produk_no_sap, $produk_nama, $produk_kategori, $produk_price_list, $produk_harga_ekat, $produk_deskripsi, $produk_foto){
    $where = array(
      "id_pk_produk" => $id_pk_produk
    );
    $data = array(
      "produk_no_katalog"=>$produk_no_katalog,
      "produk_principal"=>$produk_principal,
      "produk_no_sap"=>$produk_no_sap,
      "produk_nama"=>$produk_nama,
      "produk_kategori"=>$produk_kategori,
      "produk_price_list"=>$produk_price_list,
      "produk_harga_ekat"=>$produk_harga_ekat,
      "produk_deskripsi"=>$produk_deskripsi,
      "produk_foto"=>$produk_foto
    );
    $this->db->update("mstr_produk",$data,$where);
  }
}
