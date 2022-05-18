<?php
date_default_timezone_set("Asia/Jakarta");
class M_ekatalog extends CI_Model
{
  /*
    create table mstr_ekatalog(
    id_pk_ekatalog int primary key auto_increment,
    ekatalog_komoditas varchar(400),
    ekatalog_id_paket varchar(50),
    ekatalog_nama_paket varchar(400),
    ekatalog_instansi varchar(200),
    ekatalog_satuan_kerja varchar(200),
    ekatalog_npwp_satuan_kerja varchar(200),
    ekatalog_alamat_satuan_kerja varchar(200),
    ekatalog_alamat_pengiriman varchar(400),
    ekatalog_tgl_buat_online varchar(30),
    ekatalog_tgl_ubah_online varchar(30),
    ekatalog_tahun_anggaran varchar(4),
    ekatalog_total_produk int,
    ekatalog_total_harga int,
    ekatalog_status_paket varchar(30),
    ekatalog_posisi_paket varchar(30),
    ekatalog_status varchar(30),
    ekatalog_tgl_create datetime,
    ekatalog_tgl_update datetime,
    ekatalog_tgl_delete datetime,
    ekatalog_id_create int,
    ekatalog_id_update int,
    ekatalog_id_delete int
    )
  */
  public function insert($ekatalog_komoditas, $ekatalog_id_paket, $ekatalog_nama_paket, $ekatalog_instansi, $ekatalog_satuan_kerja, $ekatalog_npwp_satuan_kerja, $ekatalog_alamat_satuan_kerja, $ekatalog_alamat_pengiriman, $ekatalog_tgl_buat_online, $ekatalog_tgl_ubah_online, $ekatalog_tahun_anggaran, $ekatalog_total_produk, $ekatalog_total_harga, $ekatalog_status_paket, $ekatalog_posisi_paket, $ekatalog_id, $ekatalog_nama_pp, $ekatalog_position_pp, $ekatalog_nip_pp, $ekatalog_email_pp, $ekatalog_phone_number_pp, $ekatalog_nama_buyer, $ekatalog_position_buyer, $ekatalog_nip_buyer, $ekatalog_email_buyer, $ekatalog_phone_number_buyer)
  {
    $data = array(
      "ekatalog_komoditas" => $ekatalog_komoditas,
      "ekatalog_id_paket" => $ekatalog_id_paket,
      "ekatalog_nama_paket" => $ekatalog_nama_paket,
      "ekatalog_instansi" => $ekatalog_instansi,
      "ekatalog_satuan_kerja" => $ekatalog_satuan_kerja,
      "ekatalog_npwp_satuan_kerja" => $ekatalog_npwp_satuan_kerja,
      "ekatalog_alamat_satuan_kerja" => $ekatalog_alamat_satuan_kerja,
      "ekatalog_alamat_pengiriman" => $ekatalog_alamat_pengiriman,
      "ekatalog_tgl_buat_online" => $ekatalog_tgl_buat_online,
      "ekatalog_tgl_ubah_online" => $ekatalog_tgl_ubah_online,
      "ekatalog_tahun_anggaran" => $ekatalog_tahun_anggaran,
      "ekatalog_total_produk" => $ekatalog_total_produk,
      "ekatalog_total_harga" => $ekatalog_total_harga,
      "ekatalog_status_paket" => $ekatalog_status_paket,
      "ekatalog_posisi_paket" => $ekatalog_posisi_paket,
      "ekatalog_status" => "aktif",
      "ekatalog_tgl_create" => date("Y-m-d H:i:s"),
      "ekatalog_id_create" => $this->session->id_user,
      "ekatalog_id" => $ekatalog_id,
      "ekatalog_nama_pp" => $ekatalog_nama_pp,
      "ekatalog_position_pp" => $ekatalog_position_pp,
      "ekatalog_nip_pp" => $ekatalog_nip_pp,
      "ekatalog_email_pp" => $ekatalog_email_pp,
      "ekatalog_phone_number_pp" => $ekatalog_phone_number_pp,
      "ekatalog_nama_buyer" => $ekatalog_nama_buyer,
      "ekatalog_position_buyer" => $ekatalog_position_buyer,
      "ekatalog_nip_buyer" => $ekatalog_nip_buyer,
      "ekatalog_email_buyer" => $ekatalog_email_buyer,
      "ekatalog_phone_number_buyer" => $ekatalog_phone_number_buyer,
    );
    return insertRow("mstr_ekatalog", $data);
  }
  public function update($id_pk_ekatalog, $ekatalog_komoditas, $ekatalog_id_paket, $ekatalog_nama_paket, $ekatalog_instansi, $ekatalog_satuan_kerja, $ekatalog_npwp_satuan_kerja, $ekatalog_alamat_satuan_kerja, $ekatalog_alamat_pengiriman, $ekatalog_tgl_buat_online, $ekatalog_tgl_ubah_online, $ekatalog_tahun_anggaran, $ekatalog_total_produk, $ekatalog_total_harga, $ekatalog_status_paket, $ekatalog_posisi_paket, $ekatalog_id, $ekatalog_nama_pp, $ekatalog_position_pp, $ekatalog_nip_pp, $ekatalog_email_pp, $ekatalog_phone_number_pp, $ekatalog_nama_buyer, $ekatalog_position_buyer, $ekatalog_nip_buyer, $ekatalog_email_buyer, $ekatalog_phone_number_buyer)
  {
    $where = array(
      "id_pk_ekatalog" => $id_pk_ekatalog
    );
    $data = array(
      "ekatalog_komoditas" => $ekatalog_komoditas,
      "ekatalog_id_paket" => $ekatalog_id_paket,
      "ekatalog_nama_paket" => $ekatalog_nama_paket,
      "ekatalog_instansi" => $ekatalog_instansi,
      "ekatalog_satuan_kerja" => $ekatalog_satuan_kerja,
      "ekatalog_npwp_satuan_kerja" => $ekatalog_npwp_satuan_kerja,
      "ekatalog_alamat_satuan_kerja" => $ekatalog_alamat_satuan_kerja,
      "ekatalog_alamat_pengiriman" => $ekatalog_alamat_pengiriman,
      "ekatalog_tgl_buat_online" => $ekatalog_tgl_buat_online,
      "ekatalog_tgl_ubah_online" => $ekatalog_tgl_ubah_online,
      "ekatalog_tahun_anggaran" => $ekatalog_tahun_anggaran,
      "ekatalog_total_produk" => $ekatalog_total_produk,
      "ekatalog_total_harga" => $ekatalog_total_harga,
      "ekatalog_status_paket" => $ekatalog_status_paket,
      "ekatalog_posisi_paket" => $ekatalog_posisi_paket,
      "ekatalog_tgl_update" => date("Y-m-d H:i:s"),
      "ekatalog_id_update" => $this->session->id_user, 
      "ekatalog_id_create" => $this->session->id_user,
      "ekatalog_id" => $ekatalog_id,
      "ekatalog_nama_pp" => $ekatalog_nama_pp,
      "ekatalog_position_pp" => $ekatalog_position_pp,
      "ekatalog_nip_pp" => $ekatalog_nip_pp,
      "ekatalog_email_pp" => $ekatalog_email_pp,
      "ekatalog_phone_number_pp" => $ekatalog_phone_number_pp,
      "ekatalog_nama_buyer" => $ekatalog_nama_buyer,
      "ekatalog_position_buyer" => $ekatalog_position_buyer,
      "ekatalog_nip_buyer" => $ekatalog_nip_buyer,
      "ekatalog_email_buyer" => $ekatalog_email_buyer,
      "ekatalog_phone_number_buyer" => $ekatalog_phone_number_buyer,
    );
    updateRow("mstr_ekatalog", $data, $where);
  }
  public function delete($id_pk_ekatalog)
  {
    $where = array(
      "id_pk_ekatalog" => $id_pk_ekatalog
    );
    $data = array(
      "ekatalog_status" => "nonaktif"
    );
    updateRow("mstr_ekatalog", $data, $where);
  }
  public function search($kolom_pengurutan, $arah_kolom_pengurutan, $pencarian_phrase, $kolom_pencarian, $current_page)
  {
    $search_query = "";
    if ($pencarian_phrase != "") {
      if ($kolom_pencarian == "all") {
        $search_query = "and (ekatalog_komoditas like '%" . $pencarian_phrase . "%' or ekatalog_id_paket like '%" . $pencarian_phrase . "%' or ekatalog_nama_paket like '%" . $pencarian_phrase . "%' or ekatalog_instansi like '%" . $pencarian_phrase . "%' or ekatalog_satuan_kerja like '%" . $pencarian_phrase . "%' or ekatalog_npwp_satuan_kerja like '%" . $pencarian_phrase . "%' or ekatalog_alamat_satuan_kerja like '%" . $pencarian_phrase . "%' or ekatalog_alamat_pengiriman like '%" . $pencarian_phrase . "%' or ekatalog_tgl_buat_online like '%" . $pencarian_phrase . "%' or ekatalog_tgl_ubah_online like '%" . $pencarian_phrase . "%' or ekatalog_tahun_anggaran like '%" . $pencarian_phrase . "%' or ekatalog_total_produk like '%" . $pencarian_phrase . "%' or ekatalog_total_harga like '%" . $pencarian_phrase . "%' or ekatalog_status_paket like '%" . $pencarian_phrase . "%' or ekatalog_posisi_paket like '%" . $pencarian_phrase . "%')";
      } else {
        $search_query = "and (" . $kolom_pencarian . " like '%" . $pencarian_phrase . "%')";
      }
    }
    $sql = "SELECT id_pk_ekatalog, ekatalog_komoditas, ekatalog_id_paket, ekatalog_nama_paket, ekatalog_instansi, ekatalog_satuan_kerja, ekatalog_npwp_satuan_kerja, ekatalog_alamat_satuan_kerja, ekatalog_alamat_pengiriman, ekatalog_tgl_buat_online, ekatalog_tgl_ubah_online, ekatalog_tahun_anggaran, ekatalog_total_produk, ekatalog_total_harga, ekatalog_total_harga_online, ekatalog_status_paket, ekatalog_posisi_paket, ekatalog_status, DATE_FORMAT(ekatalog_tgl_buat_online, '%d %M %Y') as format_tgl_buat_online, DATE_FORMAT(ekatalog_tgl_ubah_online, '%d %M %Y') as format_tgl_ubah_online, ifnull(ekatalog_tgl_update, ekatalog_tgl_create) as ekatalog_tgl_update, ifnull(user_username, 'SYSTEM') as user_username, ekatalog_nama_pp, ekatalog_position_pp, ekatalog_nip_pp, ekatalog_email_pp, ekatalog_phone_number_pp, ekatalog_nama_buyer, ekatalog_position_buyer, ekatalog_nip_buyer, ekatalog_email_buyer, ekatalog_phone_number_buyer, ekatalog_id 
    FROM mstr_ekatalog
    left join mstr_user on mstr_user.id_pk_user = mstr_ekatalog.ekatalog_id_create 
    WHERE ekatalog_status != 'nonaktif' " . $search_query . " order by " . $kolom_pengurutan . " " . $arah_kolom_pengurutan . " limit 20 offset " . (20 * ($current_page - 1));
    return executeQuery($sql);
  }
  public function get($kolom_pengurutan, $arah_kolom_pengurutan, $pencarian_phrase, $kolom_pencarian, $current_page)
  {
    $search_query = "";
    if ($pencarian_phrase != "") {
      if ($kolom_pencarian == "all") {
        $search_query = "and (ekatalog_komoditas like '%" . $pencarian_phrase . "%' or ekatalog_id_paket like '%" . $pencarian_phrase . "%' or ekatalog_nama_paket like '%" . $pencarian_phrase . "%' or ekatalog_instansi like '%" . $pencarian_phrase . "%' or ekatalog_satuan_kerja like '%" . $pencarian_phrase . "%' or ekatalog_npwp_satuan_kerja like '%" . $pencarian_phrase . "%' or ekatalog_alamat_satuan_kerja like '%" . $pencarian_phrase . "%' or ekatalog_alamat_pengiriman like '%" . $pencarian_phrase . "%' or ekatalog_tgl_buat_online like '%" . $pencarian_phrase . "%' or ekatalog_tgl_ubah_online like '%" . $pencarian_phrase . "%' or ekatalog_tahun_anggaran like '%" . $pencarian_phrase . "%' or ekatalog_total_produk like '%" . $pencarian_phrase . "%' or ekatalog_total_harga like '%" . $pencarian_phrase . "%' or ekatalog_status_paket like '%" . $pencarian_phrase . "%' or ekatalog_posisi_paket like '%" . $pencarian_phrase . "%')";
      } else {
        $search_query = "and (" . $kolom_pencarian . " like '%" . $pencarian_phrase . "%')";
      }
    }
    $sql = "SELECT id_pk_ekatalog FROM mstr_ekatalog WHERE ekatalog_status != 'nonaktif' " . $search_query . " order by " . $kolom_pengurutan . " " . $arah_kolom_pengurutan;
    return executeQuery($sql);
  }
  public function search_system($kolom_pengurutan, $arah_kolom_pengurutan, $pencarian_phrase, $kolom_pencarian, $current_page)
  {
    $search_query = "";
    if ($pencarian_phrase != "") {
      if ($kolom_pencarian == "all") {
        $search_query = "and (ekatalog_komoditas like '%" . $pencarian_phrase . "%' or ekatalog_id_paket like '%" . $pencarian_phrase . "%' or ekatalog_nama_paket like '%" . $pencarian_phrase . "%' or ekatalog_instansi like '%" . $pencarian_phrase . "%' or ekatalog_satuan_kerja like '%" . $pencarian_phrase . "%' or ekatalog_npwp_satuan_kerja like '%" . $pencarian_phrase . "%' or ekatalog_alamat_satuan_kerja like '%" . $pencarian_phrase . "%' or ekatalog_alamat_pengiriman like '%" . $pencarian_phrase . "%' or ekatalog_tgl_buat_online like '%" . $pencarian_phrase . "%' or ekatalog_tgl_ubah_online like '%" . $pencarian_phrase . "%' or ekatalog_tahun_anggaran like '%" . $pencarian_phrase . "%' or ekatalog_total_produk like '%" . $pencarian_phrase . "%' or ekatalog_total_harga like '%" . $pencarian_phrase . "%' or ekatalog_status_paket like '%" . $pencarian_phrase . "%' or ekatalog_posisi_paket like '%" . $pencarian_phrase . "%')";
      } else {
        $search_query = "and (" . $kolom_pencarian . " like '%" . $pencarian_phrase . "%')";
      }
    }
    $sql = "SELECT id_pk_ekatalog, ekatalog_komoditas, ekatalog_id_paket, ekatalog_nama_paket, ekatalog_instansi, ekatalog_satuan_kerja, ekatalog_npwp_satuan_kerja, ekatalog_alamat_satuan_kerja, ekatalog_alamat_pengiriman, ekatalog_tgl_buat_online, ekatalog_tgl_ubah_online, ekatalog_tahun_anggaran, ekatalog_total_produk, ekatalog_total_harga, ekatalog_total_harga_online, ekatalog_tgl_create, ekatalog_status_paket, ekatalog_posisi_paket, ekatalog_status, DATE_FORMAT(ekatalog_tgl_buat_online, '%d %M %Y') as format_tgl_buat_online, DATE_FORMAT(ekatalog_tgl_ubah_online, '%d %M %Y') as format_tgl_ubah_online, ekatalog_nama_pp, ekatalog_position_pp, ekatalog_nip_pp, ekatalog_email_pp, ekatalog_phone_number_pp, ekatalog_nama_buyer, ekatalog_position_buyer, ekatalog_nip_buyer, ekatalog_email_buyer, ekatalog_phone_number_buyer, ekatalog_id FROM mstr_ekatalog WHERE ekatalog_status != 'nonaktif' and ekatalog_id_create = 0 " . $search_query . " order by " . $kolom_pengurutan . " " . $arah_kolom_pengurutan . " limit 20 offset " . (20 * ($current_page - 1));
    return executeQuery($sql);
  }
  public function get_system($kolom_pengurutan, $arah_kolom_pengurutan, $pencarian_phrase, $kolom_pencarian, $current_page)
  {
    $search_query = "";
    if ($pencarian_phrase != "") {
      if ($kolom_pencarian == "all") {
        $search_query = "and (ekatalog_komoditas like '%" . $pencarian_phrase . "%' or ekatalog_id_paket like '%" . $pencarian_phrase . "%' or ekatalog_nama_paket like '%" . $pencarian_phrase . "%' or ekatalog_instansi like '%" . $pencarian_phrase . "%' or ekatalog_satuan_kerja like '%" . $pencarian_phrase . "%' or ekatalog_npwp_satuan_kerja like '%" . $pencarian_phrase . "%' or ekatalog_alamat_satuan_kerja like '%" . $pencarian_phrase . "%' or ekatalog_alamat_pengiriman like '%" . $pencarian_phrase . "%' or ekatalog_tgl_buat_online like '%" . $pencarian_phrase . "%' or ekatalog_tgl_ubah_online like '%" . $pencarian_phrase . "%' or ekatalog_tahun_anggaran like '%" . $pencarian_phrase . "%' or ekatalog_total_produk like '%" . $pencarian_phrase . "%' or ekatalog_total_harga like '%" . $pencarian_phrase . "%' or ekatalog_status_paket like '%" . $pencarian_phrase . "%' or ekatalog_posisi_paket like '%" . $pencarian_phrase . "%')";
      } else {
        $search_query = "and (" . $kolom_pencarian . " like '%" . $pencarian_phrase . "%')";
      }
    }
    $sql = "SELECT id_pk_ekatalog FROM mstr_ekatalog WHERE ekatalog_status != 'nonaktif' and ekatalog_id_create = 0 " . $search_query . " order by " . $kolom_pengurutan . " " . $arah_kolom_pengurutan;
    return executeQuery($sql);
  }
  public function search_with_creator($kolom_pengurutan, $arah_kolom_pengurutan, $pencarian_phrase, $kolom_pencarian, $current_page)
  {
    $search_query = "";
    if ($pencarian_phrase != "") {
      if ($kolom_pencarian == "all") {
        $search_query = "and (ekatalog_komoditas like '%" . $pencarian_phrase . "%' or ekatalog_id_paket like '%" . $pencarian_phrase . "%' or ekatalog_nama_paket like '%" . $pencarian_phrase . "%' or ekatalog_instansi like '%" . $pencarian_phrase . "%' or ekatalog_satuan_kerja like '%" . $pencarian_phrase . "%' or ekatalog_npwp_satuan_kerja like '%" . $pencarian_phrase . "%' or ekatalog_alamat_satuan_kerja like '%" . $pencarian_phrase . "%' or ekatalog_alamat_pengiriman like '%" . $pencarian_phrase . "%' or ekatalog_tgl_buat_online like '%" . $pencarian_phrase . "%' or ekatalog_tgl_ubah_online like '%" . $pencarian_phrase . "%' or ekatalog_tahun_anggaran like '%" . $pencarian_phrase . "%' or ekatalog_total_produk like '%" . $pencarian_phrase . "%' or ekatalog_total_harga like '%" . $pencarian_phrase . "%' or ekatalog_status_paket like '%" . $pencarian_phrase . "%' or ekatalog_posisi_paket like '%" . $pencarian_phrase . "%')";
      } else {
        $search_query = "and (" . $kolom_pencarian . " like '%" . $pencarian_phrase . "%')";
      }
    }
    $sql = "SELECT id_pk_ekatalog, ekatalog_komoditas, ekatalog_id_paket, ekatalog_nama_paket, ekatalog_instansi, ekatalog_satuan_kerja, ekatalog_npwp_satuan_kerja, ekatalog_alamat_satuan_kerja, ekatalog_alamat_pengiriman, ekatalog_tgl_buat_online, ekatalog_tgl_ubah_online, ekatalog_tahun_anggaran, ekatalog_total_produk, ekatalog_total_harga, ekatalog_total_harga_online, ekatalog_status_paket, ekatalog_posisi_paket, ekatalog_status, DATE_FORMAT(ekatalog_tgl_buat_online, '%d %M %Y') as format_tgl_buat_online, DATE_FORMAT(ekatalog_tgl_ubah_online, '%d %M %Y') as format_tgl_ubah_online, ekatalog_nama_pp, ekatalog_position_pp, ekatalog_nip_pp, ekatalog_email_pp, ekatalog_phone_number_pp, ekatalog_nama_buyer, ekatalog_position_buyer, ekatalog_nip_buyer, ekatalog_email_buyer, ekatalog_phone_number_buyer, ekatalog_id FROM mstr_ekatalog WHERE ekatalog_status != 'nonaktif' and ekatalog_id_create = ? " . $search_query . " order by " . $kolom_pengurutan . " " . $arah_kolom_pengurutan . " limit 20 offset " . (20 * ($current_page - 1));
    $args = array(
      $this->session->id_user
    );
    return executeQuery($sql,$args);
  }
  public function get_with_creator($kolom_pengurutan, $arah_kolom_pengurutan, $pencarian_phrase, $kolom_pencarian, $current_page)
  {
    $search_query = "";
    if ($pencarian_phrase != "") {
      if ($kolom_pencarian == "all") {
        $search_query = "and (ekatalog_komoditas like '%" . $pencarian_phrase . "%' or ekatalog_id_paket like '%" . $pencarian_phrase . "%' or ekatalog_nama_paket like '%" . $pencarian_phrase . "%' or ekatalog_instansi like '%" . $pencarian_phrase . "%' or ekatalog_satuan_kerja like '%" . $pencarian_phrase . "%' or ekatalog_npwp_satuan_kerja like '%" . $pencarian_phrase . "%' or ekatalog_alamat_satuan_kerja like '%" . $pencarian_phrase . "%' or ekatalog_alamat_pengiriman like '%" . $pencarian_phrase . "%' or ekatalog_tgl_buat_online like '%" . $pencarian_phrase . "%' or ekatalog_tgl_ubah_online like '%" . $pencarian_phrase . "%' or ekatalog_tahun_anggaran like '%" . $pencarian_phrase . "%' or ekatalog_total_produk like '%" . $pencarian_phrase . "%' or ekatalog_total_harga like '%" . $pencarian_phrase . "%' or ekatalog_status_paket like '%" . $pencarian_phrase . "%' or ekatalog_posisi_paket like '%" . $pencarian_phrase . "%')";
      } else {
        $search_query = "and (" . $kolom_pencarian . " like '%" . $pencarian_phrase . "%')";
      }
    }
    $sql = "SELECT id_pk_ekatalog FROM mstr_ekatalog WHERE ekatalog_status != 'nonaktif' and ekatalog_id_create = ? " . $search_query . " order by " . $kolom_pengurutan . " " . $arah_kolom_pengurutan;
    $args = array(
      $this->session->id_user
    );
    return executeQuery($sql,$args);
  }
}
