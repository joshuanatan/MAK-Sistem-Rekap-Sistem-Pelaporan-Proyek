<?php
date_default_timezone_set("Asia/Jakarta");
class M_produk extends CI_Model{
     private $id_pk_produk;
     private $produk_no_katalog;
     private $produk_principal;
     private $produk_no_sap;
     private $produk_nama;
     private $produk_kategori;
     private $produk_price_list;
     private $produk_harga_ekat;
     private $produk_deskripsi;
     private $produk_foto;
     private $produk_status;
     private $tgl_create_produk;
     private $tgl_edit_produk;
     private $tgl_delete_produk;
     private $id_create_produk;
     private $id_edit_produk;
     private $id_delete_produk;

     public function get_produk(){
         $sql = "select produk_no_katalog, produk_principal, produk_no_sap, produk_nama, produk_kategori, produk_price_list, produk_harga_ekat, produk_deskripsi from test_produk_MAK";
         $result = $this->db->query($sql);
         return $result;
     }
     public function tes_insert($produk_no_katalog, $produk_principal, $produk_no_sap, $produk_nama, $produk_kategori, $produk_price_list, $produk_harga_ekat, $produk_deskripsi) {
 			$data = array(
        "produk_no_katalog"=>$produk_no_katalog,
        "produk_principal"=>$produk_principal,
        "produk_no_sap"=>$produk_no_sap,
        "produk_nama"=>$produk_nama,
        "produk_kategori"=>$produk_kategori,
        "produk_price_list"=>$produk_price_list,
        "produk_harga_ekat"=>$produk_harga_ekat,
        "produk_deskripsi"=>$produk_deskripsi
 			);
 			$this->db->insert("test_produk_MAK",$data);
 		}
}
