<?php
date_default_timezone_set("Asia/Jakarta");
class M_ekatalog_produk extends CI_Model
{
  /*
    create table tbl_ekatalog_produk(
      id_pk_ekatalog_produk int primary key auto_increment,
      ekatalog_produk_nama_produk varchar(400),
      ekatalog_produk_kuantitas_online varchar(20),
      ekatalog_produk_mata_uang_online varchar(20),
      ekatalog_produk_harga_satuan_online varchar(20),
      ekatalog_produk_perkiraan_ongkos_kirim_online varchar(20),
      ekatalog_produk_total_harga_online varchar(20),
      ekatalog_produk_kuantitas double,
      ekatalog_produk_mata_uang double,
      ekatalog_produk_harga_satuan int,
      ekatalog_produk_perkiraan_ongkos_kirim int,
      ekatalog_produk_total_harga int,
      ekatalog_produk_catatan varchar(400),
      ekatalog_produk_status varchar(20),
      ekatalog_produk_tgl_create datetime,
      ekatalog_produk_tgl_update datetime,
      ekatalog_produk_tgl_delete datetime,
      ekatalog_produk_id_create int,
      ekatalog_produk_id_update int,
      ekatalog_produk_id_delete int,
      id_fk_ekatalog int
    )
  */
  public function insert($id_fk_ekatalog, $ekatalog_produk_nama_produk, $ekatalog_produk_kuantitas, $ekatalog_produk_mata_uang, $ekatalog_produk_harga_satuan, $ekatalog_produk_perkiraan_ongkos_kirim, $ekatalog_produk_total_harga, $ekatalog_produk_catatan)
  {
    $data = array(
      "ekatalog_produk_nama_produk" => $ekatalog_produk_nama_produk,
      "ekatalog_produk_kuantitas_online" => $ekatalog_produk_kuantitas,
      "ekatalog_produk_mata_uang_online" => $ekatalog_produk_mata_uang,
      "ekatalog_produk_harga_satuan_online" => $ekatalog_produk_harga_satuan,
      "ekatalog_produk_perkiraan_ongkos_kirim_online" => $ekatalog_produk_perkiraan_ongkos_kirim,
      "ekatalog_produk_total_harga_online" => $ekatalog_produk_total_harga,
      "ekatalog_produk_kuantitas" => $ekatalog_produk_kuantitas,
      "ekatalog_produk_mata_uang" => $ekatalog_produk_mata_uang,
      "ekatalog_produk_harga_satuan" => $ekatalog_produk_harga_satuan,
      "ekatalog_produk_perkiraan_ongkos_kirim" => $ekatalog_produk_perkiraan_ongkos_kirim,
      "ekatalog_produk_total_harga" => $ekatalog_produk_total_harga,
      "ekatalog_produk_catatan" => $ekatalog_produk_catatan,
      "ekatalog_produk_status" => "aktif",
      "ekatalog_produk_tgl_create" => date("Y-m-d H:i:s"),
      "ekatalog_produk_id_create" => $this->session->id_user,
      "id_fk_ekatalog" => $id_fk_ekatalog
    );
    return insertRow("tbl_ekatalog_produk", $data);
  }
  public function update($id_pk_ekatalog_produk, $ekatalog_produk_nama_produk, $ekatalog_produk_kuantitas, $ekatalog_produk_mata_uang, $ekatalog_produk_harga_satuan, $ekatalog_produk_perkiraan_ongkos_kirim, $ekatalog_produk_total_harga, $ekatalog_produk_catatan)
  {
    #yang online jangan diupdate sebagai acuan
    $where = array(
      "id_pk_ekatalog_produk" => $id_pk_ekatalog_produk,
    );
    $data = array(
      "ekatalog_produk_nama_produk" => $ekatalog_produk_nama_produk,
      "ekatalog_produk_kuantitas" => $ekatalog_produk_kuantitas,
      "ekatalog_produk_mata_uang" => $ekatalog_produk_mata_uang,
      "ekatalog_produk_harga_satuan" => $ekatalog_produk_harga_satuan,
      "ekatalog_produk_perkiraan_ongkos_kirim" => $ekatalog_produk_perkiraan_ongkos_kirim,
      "ekatalog_produk_total_harga" => $ekatalog_produk_total_harga,
      "ekatalog_produk_catatan" => $ekatalog_produk_catatan,
      "ekatalog_produk_tgl_update" => date("Y-m-d H:i:s"),
      "ekatalog_produk_id_update" => $this->session->id_user
    );
    updateRow("tbl_ekatalog_produk", $data, $where);
  }
  public function delete($id_pk_ekatalog_produk)
  {
    $where = array(
      "id_pk_ekatalog_produk" => $id_pk_ekatalog_produk,
    );
    $data = array(
      "ekatalog_produk_status" => "nonaktif",
      "ekatalog_produk_tgl_delete" => date("Y-m-d H:i:s"),
      "ekatalog_produk_id_delete" => $this->session->id_user
    );
    updateRow("tbl_ekatalog_produk", $data, $where);
  }
  public function get_ekatalog_produk($id_pk_ekatalog)
  {
    $sql = "select id_pk_ekatalog_produk, ekatalog_produk_nama_produk, ekatalog_produk_kuantitas_online, ekatalog_produk_mata_uang_online, ekatalog_produk_harga_satuan_online, ekatalog_produk_perkiraan_ongkos_kirim_online, ekatalog_produk_total_harga_online, ekatalog_produk_kuantitas, ekatalog_produk_mata_uang, ekatalog_produk_harga_satuan, ekatalog_produk_perkiraan_ongkos_kirim, ekatalog_produk_total_harga, ekatalog_produk_catatan, ekatalog_produk_status from tbl_ekatalog_produk where ekatalog_produk_status = 'aktif' and id_fk_ekatalog = ?";
    $args = array(
      $id_pk_ekatalog
    );
    return executeQuery($sql, $args);
  }
}
