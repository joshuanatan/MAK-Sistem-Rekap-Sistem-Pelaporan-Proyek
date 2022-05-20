<?php
class M_user_kabupaten extends CI_model
{
  public function insert($id_fk_user, $id_fk_kabupaten)
  {
    $data = array(
      "id_fk_user" => $id_fk_user,
      "id_fk_kabupaten" => $id_fk_kabupaten,
      "user_kabupaten_status" => "aktif",
    );
    insertRow("tbl_user_kabupaten", $data);
  }
  public function get_selected_kabupaten($id_fk_user)
  {
    $sql = "select id_pk_user_kabupaten, id_pk_kabupaten, kabupaten_nama, id_fk_provinsi from tbl_user_kabupaten inner join mstr_kabupaten on mstr_kabupaten.id_pk_kabupaten = tbl_user_kabupaten.id_fk_kabupaten where user_kabupaten_status = 'aktif' and id_fk_user = ?";
    $args = array(
      $id_fk_user
    );
    return executeQuery($sql, $args);
  }

  public function get_selected_kabupaten_asm($id_fk_user)
  {
    $sql = "select id_pk_user FROM mstr_user where user_supervisor =" . $id_fk_user . " AND user_status = 'aktif'";
    $result = executeQuery($sql);
    $id_user_arr = $result->result_array();
    $id_user = "";
    for ($i = 0; $i < count($id_user_arr); $i++) {
      if ($id_user != "") {
        $id_user = $id_user . "," . $id_user_arr[$i]['id_pk_user'];
      } else {
        $id_user = $id_user_arr[$i]['id_pk_user'];
      }
    }

    $sql = "select id_pk_user_kabupaten, id_pk_kabupaten, kabupaten_nama, id_fk_provinsi from tbl_user_kabupaten inner join mstr_kabupaten on mstr_kabupaten.id_pk_kabupaten = tbl_user_kabupaten.id_fk_kabupaten where user_kabupaten_status = 'aktif' and id_fk_user IN ($id_user)";

    return executeQuery($sql);
  }

  public function get_unselected_kabupaten($id_fk_user, $id_provinsi)
  {
    $sql = "
    select id_pk_kabupaten, kabupaten_nama from mstr_kabupaten where kabupaten_status = 'aktif' and id_fk_provinsi = ? and id_pk_kabupaten not in (
      select id_fk_kabupaten from tbl_user_kabupaten where id_fk_user = ? and user_kabupaten_status = 'aktif'
    ) ";
    $args = array(
      $id_provinsi, $id_fk_user
    );
    return executeQuery($sql, $args);
  }

  public function get_unselected_kabupaten_asm($id_fk_user, $id_provinsi)
  {

    $sql = "select id_pk_user FROM mstr_user where user_supervisor =" . $id_fk_user . " AND user_status = 'aktif'";
    $result = executeQuery($sql);
    $id_user_arr = $result->result_array();
    $id_user = "";

    for ($i = 0; $i < count($id_user_arr); $i++) {
      if ($id_user != "") {
        $id_user = $id_user . "," . $id_user_arr[$i]['id_pk_user'];
      } else {
        $id_user = $id_user_arr[$i]['id_pk_user'];
      }
    }

    $sql = "
    select id_pk_kabupaten, kabupaten_nama from mstr_kabupaten where kabupaten_status = 'aktif' and id_fk_provinsi = '$id_provinsi' and id_pk_kabupaten not in (
      select id_fk_kabupaten from tbl_user_kabupaten where id_fk_user IN ($id_user) and user_kabupaten_status = 'aktif'
    ) ";

    return executeQuery($sql);
  }
  public function deactive_data($id_user)
  {
    $where = array(
      "id_fk_user" => $id_user
    );
    $data = array(
      "user_kabupaten_status" => "nonaktif"
    );
    updateRow("tbl_user_kabupaten", $data, $where);
  }
}
