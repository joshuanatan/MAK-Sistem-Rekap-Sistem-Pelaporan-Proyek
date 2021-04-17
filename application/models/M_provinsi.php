<?php
date_default_timezone_set("Asia/Jakarta");
class M_provinsi extends CI_Model{
  public function get_data(){
    #gafilter di status gara2 ini bisa untuk menghilangkan provinsi yang gakepake aja tapi bisa diaktifin lagi kalau mau
    $sql = "select id_pk_provinsi, provinsi_nama, provinsi_status, provinsi_id_create, provinsi_id_update, provinsi_id_delete, provinsi_tgl_create, provinsi_tgl_update, provinsi_tgl_delete from mstr_provinsi where provinsi_status != 'deleted' order by provinsi_nama";
    return executeQuery($sql);
  }
  public function insert($provinsi_nama, $provinsi_status, $provinsi_id_create){
    $data = array(
      "id_pk_provinsi" => $this->get_latest_id(),
      "provinsi_nama" => $provinsi_nama,
      "provinsi_status" => $provinsi_status,
      "provinsi_id_create" => $provinsi_id_create,
      "provinsi_tgl_create" => date("Y-m-d H:i:s")
    );
    return insertRow("mstr_provinsi",$data);
  }
  public function update($id_pk_provinsi,$provinsi_nama, $provinsi_status, $provinsi_id_update){
    $where = array(
      "id_pk_provinsi" => $id_pk_provinsi
    );
    $data = array(
      "provinsi_nama" => $provinsi_nama,
      "provinsi_status" => $provinsi_status,
      "provinsi_id_update" => $provinsi_id_update,
      "provinsi_tgl_update" => date("Y-m-d H:i:s")
    );
    updateRow("mstr_provinsi",$data,$where);
  }
  public function delete($id_pk_provinsi,$provinsi_id_delete){
    $where = array(
      "id_pk_provinsi" => $id_pk_provinsi
    );
    $data = array(
      "provinsi_status" => "deleted",
      "provinsi_id_delete" => $provinsi_id_delete,
      "provinsi_tgl_delete" => date("Y-m-d H:i:s")
    );
    updateRow("mstr_provinsi",$data,$where);
  }
  private function get_latest_id(){
    $sql = "select max(id_pk_provinsi) as last_id from mstr_provinsi";
    $result = executeQuery($sql)->result_array();
    return $result[0]["last_id"]+1;
  }
}