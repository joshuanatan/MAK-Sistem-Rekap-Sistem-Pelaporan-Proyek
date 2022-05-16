<?php
date_default_timezone_set("Asia/Jakarta");
class M_produk extends CI_Model
{

  public function insert($produk_no_katalog, $produk_principal, $produk_no_sap, $produk_nama, $produk_kategori, $produk_price_list, $produk_deskripsi, $produk_foto, $produk_status)
  {
    $data = array(
      "produk_no_katalog" => $produk_no_katalog,
      "produk_principal" => $produk_principal,
      "produk_no_sap" => $produk_no_sap,
      "produk_nama" => $produk_nama,
      "produk_kategori" => $produk_kategori,
      "produk_price_list" => $produk_price_list,
      // "produk_harga_ekat" => $produk_harga_ekat,
      "produk_deskripsi" => $produk_deskripsi,
      "produk_foto" => $produk_foto,
      "produk_status" => "aktif"
    );
    $this->db->insert("mstr_produk", $data);
  }
  public function delete_produk($id_pk_produk)
  {
    $sql = "UPDATE mstr_produk SET produk_status = 'nonaktif' WHERE id_pk_produk = $id_pk_produk";
    $result = $this->db->query($sql);
  }
  public function edit_produk($id_pk_produk, $produk_no_katalog, $produk_principal, $produk_no_sap, $produk_nama, $produk_kategori, $produk_price_list, $produk_deskripsi, $produk_foto)
  {
    $where = array(
      "id_pk_produk" => $id_pk_produk
    );
    $data = array(
      "produk_no_katalog" => $produk_no_katalog,
      "produk_principal" => $produk_principal,
      "produk_no_sap" => $produk_no_sap,
      "produk_nama" => $produk_nama,
      "produk_kategori" => $produk_kategori,
      "produk_price_list" => $produk_price_list,
      // "produk_harga_ekat" => $produk_harga_ekat,
      "produk_deskripsi" => $produk_deskripsi,
      "produk_foto" => $produk_foto
    );
    $this->db->update("mstr_produk", $data, $where);
  }
  public function get_produk($kolom_pengurutan, $arah_kolom_pengurutan, $pencarian_phrase, $kolom_pencarian, $current_page)
  {
    $search_query = "";
    if ($pencarian_phrase != "") {
      if ($kolom_pencarian == "all") {
        $search_query = "and (produk_no_katalog like '%" . $pencarian_phrase . "%' or produk_principal like '%" . $pencarian_phrase . "%' or produk_no_sap like '%" . $pencarian_phrase . "%' or produk_nama like '%" . $pencarian_phrase . "%' or produk_kategori like '%" . $pencarian_phrase . "%' or produk_price_list like '%" . $pencarian_phrase . "%' or produk_deskripsi like '%" . $pencarian_phrase . "%')";
      } else {
        $search_query = "and (" . $kolom_pencarian . " like '%" . $pencarian_phrase . "%')";
      }
    }
    $sql = "SELECT id_pk_produk FROM mstr_produk WHERE produk_status = 'aktif' " . $search_query;
    return executeQuery($sql);
  }
  public function search($kolom_pengurutan, $arah_kolom_pengurutan, $pencarian_phrase, $kolom_pencarian, $current_page)
  {
    $search_query = "";
    if ($pencarian_phrase != "") {
      if ($kolom_pencarian == "all") {
        $search_query = "and (produk_no_katalog like '%" . $pencarian_phrase . "%' or produk_principal like '%" . $pencarian_phrase . "%' or produk_no_sap like '%" . $pencarian_phrase . "%' or produk_nama like '%" . $pencarian_phrase . "%' or produk_kategori like '%" . $pencarian_phrase . "%' or produk_price_list like '%" . $pencarian_phrase . "%' or produk_deskripsi like '%" . $pencarian_phrase . "%')";
      } else {
        $search_query = "and (" . $kolom_pencarian . " like '%" . $pencarian_phrase . "%')";
      }
    }
    $sql = "SELECT id_pk_produk, produk_no_katalog, produk_principal, produk_no_sap, produk_nama, produk_kategori, produk_price_list, produk_deskripsi,produk_foto  FROM mstr_produk WHERE produk_status = 'aktif' " . $search_query . " order by " . $kolom_pengurutan . " " . $arah_kolom_pengurutan . " limit 20 offset " . (20 * ($current_page - 1));
    return executeQuery($sql);
  }
  
  public function check_duplicate_insert($produk_no_katalog){
    $where = array(
      "produk_no_katalog" => $produk_no_katalog,
      "produk_status !=" => "nonaktif"
    );
    return selectRow("mstr_produk",$where);
  }
  public function check_duplicate_update($id_pk_produk, $produk_no_katalog){
    $where = array(
      "id_pk_produk !=" => $id_pk_produk,
      "produk_no_katalog" => $produk_no_katalog,
      "produk_status !=" => "nonaktif"
    );
    return selectRow("mstr_produk",$where);
  }
}
