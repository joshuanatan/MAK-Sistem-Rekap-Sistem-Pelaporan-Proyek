<?php
date_default_timezone_set("Asia/Jakarta");
class M_jenis_rs extends CI_Model
{

  public function get_jenis_rs()
  {
    $sql = "SELECT id_pk_jenis_rs, jenis_rs_nama, jenis_rs_kode, jenis_rs_status FROM mstr_jenis_rs where jenis_rs_status = 'aktif'";
    $result = $this->db->query($sql);
    return $result;
  }

  public function insert($jenis_rs_nama, $jenis_rs_kode, $jenis_rs_status)
  {
    $data = array(
      "jenis_rs_nama" => $jenis_rs_nama,
      "jenis_rs_kode" => $jenis_rs_kode,
      "jenis_rs_status" => "aktif"
    );
    $this->db->insert("mstr_jenis_rs", $data);
  }

  public function delete_jenis_rs($id_pk_jenis_rs)
  {
    $sql = "UPDATE mstr_jenis_rs SET jenis_rs_status = 'nonaktif' WHERE id_pk_jenis_rs = $id_pk_jenis_rs";
    $result = $this->db->query($sql);
  }

  public function edit_jenis_rs($id_pk_jenis_rs, $jenis_rs_nama, $jenis_rs_kode)
  {
    $where = array(
      "id_pk_jenis_rs" => $id_pk_jenis_rs
    );
    $data = array(
      "jenis_rs_nama" => $jenis_rs_nama,
      "jenis_rs_kode" => $jenis_rs_kode
    );
    $this->db->update("mstr_jenis_rs", $data, $where);
  }
  public function search($kolom_pengurutan, $arah_kolom_pengurutan, $pencarian_phrase, $kolom_pencarian, $current_page)
  {
    $search_query = "";
    if ($pencarian_phrase != "") {
      if ($kolom_pencarian == "all") {
        $search_query = "and (jenis_rs_nama like '%" . $pencarian_phrase . "%' or jenis_rs_kode like '%" . $pencarian_phrase . "%')";
      } else {
        $search_query = "and (" . $kolom_pencarian . " like '%" . $pencarian_phrase . "%')";
      }
    }
    $sql = "SELECT id_pk_jenis_rs, jenis_rs_nama, jenis_rs_kode, jenis_rs_status FROM mstr_jenis_rs where jenis_rs_status = 'aktif' " . $search_query . " order by " . $kolom_pengurutan . " " . $arah_kolom_pengurutan . " limit 20 offset " . (20 * ($current_page - 1));
    return executeQuery($sql);
  }
  public function check_duplicate_insert($jenis_rs_kode){
    $where = array(
      "jenis_rs_kode" => $jenis_rs_kode,
      "jenis_rs_status !=" => "nonaktif"
    );
    return selectRow("mstr_jenis_rs",$where);
  }
  public function check_duplicate_update($id_pk_jenis_rs, $jenis_rs_kode){
    $where = array(
      "id_pk_jenis_rs !=" => $id_pk_jenis_rs,
      "jenis_rs_kode" => $jenis_rs_kode,
      "jenis_rs_status !=" => "nonaktif"
    );
    return selectRow("mstr_jenis_rs",$where);
  }
}
