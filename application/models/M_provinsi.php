<?php
date_default_timezone_set("Asia/Jakarta");
class M_provinsi extends CI_Model
{
  public function get_active_data()
  {
    #gafilter di status gara2 ini bisa untuk menghilangkan provinsi yang gakepake aja tapi bisa diaktifin lagi kalau mau
    $sql = "select id_pk_provinsi, provinsi_nama, provinsi_status, provinsi_id_create, provinsi_id_update, provinsi_id_delete, provinsi_tgl_create, provinsi_tgl_update, provinsi_tgl_delete from mstr_provinsi where provinsi_status = 'aktif' order by provinsi_nama";
    return executeQuery($sql);
  }
  public function insert($provinsi_nama, $provinsi_status)
  {
    $data = array(
      "id_pk_provinsi" => $this->get_latest_id(),
      "provinsi_nama" => $provinsi_nama,
      "provinsi_status" => $provinsi_status,
      "provinsi_id_create" => $this->session->id_user,
      "provinsi_tgl_create" => date("Y-m-d H:i:s")
    );
    return insertRow("mstr_provinsi", $data);
  }
  public function update($id_pk_provinsi, $provinsi_nama, $provinsi_status)
  {
    $where = array(
      "id_pk_provinsi" => $id_pk_provinsi
    );
    $data = array(
      "provinsi_nama" => $provinsi_nama,
      "provinsi_status" => $provinsi_status,
      "provinsi_id_update" => $this->session->id_user,
      "provinsi_tgl_update" => date("Y-m-d H:i:s")
    );
    updateRow("mstr_provinsi", $data, $where);
  }
  public function delete($id_pk_provinsi)
  {
    $where = array(
      "id_pk_provinsi" => $id_pk_provinsi
    );
    $data = array(
      "provinsi_status" => "deleted",
      "provinsi_id_delete" => $this->session->id_user,
      "provinsi_tgl_delete" => date("Y-m-d H:i:s")
    );
    updateRow("mstr_provinsi", $data, $where);
  }
  private function get_latest_id()
  {
    $sql = "select max(id_pk_provinsi) as last_id from mstr_provinsi";
    $result = executeQuery($sql)->result_array();
    return $result[0]["last_id"] + 1;
  }
  public function search($kolom_pengurutan, $arah_kolom_pengurutan, $pencarian_phrase, $kolom_pencarian, $current_page)
  {
    $search_query = "";
    if ($pencarian_phrase != "") {
      if ($kolom_pencarian == "all") {
        $search_query = "and (provinsi_nama like '%" . $pencarian_phrase . "%')";
      } else {
        $search_query = "and (" . $kolom_pencarian . " like '%" . $pencarian_phrase . "%')";
      }
    }
    $sql = "select id_pk_provinsi, provinsi_nama, provinsi_status, provinsi_id_create, provinsi_id_update, provinsi_id_delete, provinsi_tgl_create, provinsi_tgl_update, provinsi_tgl_delete from mstr_provinsi where provinsi_status != 'deleted' " . $search_query . " order by " . $kolom_pengurutan . " " . $arah_kolom_pengurutan . " limit 20 offset " . (20 * ($current_page - 1));
    return executeQuery($sql);
  }
  public function get_data($kolom_pengurutan, $arah_kolom_pengurutan, $pencarian_phrase, $kolom_pencarian, $current_page)
  {
    $search_query = "";
    if ($pencarian_phrase != "") {
      if ($kolom_pencarian == "all") {
        $search_query = "and (provinsi_nama like '%" . $pencarian_phrase . "%')";
      } else {
        $search_query = "and (" . $kolom_pencarian . " like '%" . $pencarian_phrase . "%')";
      }
    }
    $sql = "select id_pk_provinsi from mstr_provinsi where provinsi_status != 'deleted' " . $search_query;
    return executeQuery($sql);
  }
  public function check_duplicate_insert($nama_provinsi){
    $where = array(
      "provinsi_nama" => $nama_provinsi,
      "provinsi_status !=" => "deleted"
    );
    return selectRow("mstr_provinsi",$where);
  }
  public function check_duplicate_update($id_pk_provinsi, $nama_provinsi){
    $where = array(
      "id_pk_provinsi !=" => $id_pk_provinsi,
      "provinsi_nama" => $nama_provinsi,
      "provinsi_status !=" => "deleted"
    );
    return selectRow("mstr_provinsi",$where);
  }
}
