<?php
/*

create view v_detail_kabupaten as
select * from mstr_kabupaten inner join mstr_provinsi on mstr_provinsi.id_pk_provinsi = mstr_kabupaten.id_fk_provinsi
*/
date_default_timezone_set("Asia/Jakarta");
class M_kabupaten extends CI_Model
{

  public function get_kabupaten_per_provinsi($provinsi)
  {
    $sql = "select id_pk_kabupaten,id_fk_provinsi,kabupaten_nama,kabupaten_status,kabupaten_id_create,kabupaten_id_update,kabupaten_id_delete,kabupaten_tgl_create,kabupaten_tgl_update,kabupaten_tgl_delete from v_detail_kabupaten where id_fk_provinsi = ? and kabupaten_status != 'deleted'";
    $args = array(
      $provinsi
    );
    $result = executeQuery($sql, $args);
    return $result;
  }
  public function insert($kabupaten_nama, $kabupaten_status, $id_fk_provinsi)
  {
    $data = array(
      "id_pk_kabupaten" => $this->get_latest_id(),
      "kabupaten_nama" => $kabupaten_nama,
      "kabupaten_status" => $kabupaten_status,
      "id_fk_provinsi" => $id_fk_provinsi,
      "kabupaten_id_create" => $this->session->id_user,
      "kabupaten_tgl_create" => date("Y-m-d H:i:s")
    );
    return insertRow("mstr_kabupaten", $data);
  }
  public function update($id_pk_kabupaten, $kabupaten_nama, $kabupaten_status)
  {
    $where = array(
      "id_pk_kabupaten" => $id_pk_kabupaten
    );
    $data = array(
      "kabupaten_nama" => $kabupaten_nama,
      "kabupaten_status" => $kabupaten_status,
      "kabupaten_id_update" => $this->session->id_user,
      "kabupaten_tgl_update" => date("Y-m-d H:i:s")
    );
    updateRow("mstr_kabupaten", $data, $where);
  }
  public function delete($id_pk_kabupaten)
  {
    $where = array(
      "id_pk_kabupaten" => $id_pk_kabupaten
    );
    $data = array(
      "kabupaten_status" => "deleted",
      "kabupaten_id_delete" => $this->session->id_user,
      "kabupaten_tgl_delete" => date("Y-m-d H:i:s")
    );
    updateRow("mstr_kabupaten", $data, $where);
  }
  private function get_latest_id()
  {
    $sql = "select max(id_pk_kabupaten) as last_id from mstr_kabupaten";
    $result = executeQuery($sql)->result_array();
    return $result[0]["last_id"] + 1;
  }
  public function search($kolom_pengurutan, $arah_kolom_pengurutan, $pencarian_phrase, $kolom_pencarian, $current_page, $provinsi)
  {
    $search_query = "";
    if ($pencarian_phrase != "") {
      if ($kolom_pencarian == "all") {
        $search_query = "and (kabupaten_nama like '%" . $pencarian_phrase . "%')";
      } else {
        $search_query = "and (" . $kolom_pencarian . " like '%" . $pencarian_phrase . "%')";
      }
    }
    $sql = "select id_pk_kabupaten,id_fk_provinsi,kabupaten_nama,kabupaten_status,kabupaten_id_create,kabupaten_id_update,kabupaten_id_delete,kabupaten_tgl_create,kabupaten_tgl_update,kabupaten_tgl_delete from v_detail_kabupaten where id_fk_provinsi = ? and kabupaten_status != 'deleted' " . $search_query . " order by " . $kolom_pengurutan . " " . $arah_kolom_pengurutan . " limit 20 offset " . (20 * ($current_page - 1));
    $args = array(
      $provinsi
    );
    return executeQuery($sql, $provinsi);
  }
  public function get_kabupaten($kolom_pengurutan, $arah_kolom_pengurutan, $pencarian_phrase, $kolom_pencarian, $current_page, $provinsi)
  {
    $search_query = "";
    if ($pencarian_phrase != "") {
      if ($kolom_pencarian == "all") {
        $search_query = "and (kabupaten_nama like '%" . $pencarian_phrase . "%')";
      } else {
        $search_query = "and (" . $kolom_pencarian . " like '%" . $pencarian_phrase . "%')";
      }
    }
    $sql = "select id_pk_kabupaten from v_detail_kabupaten where id_fk_provinsi = ? and kabupaten_status != 'deleted' " . $search_query;
    $args = array(
      $provinsi
    );
    return executeQuery($sql, $args);
  }
}
