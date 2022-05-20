<?php
class M_user_provinsi extends CI_model
{
  public function insert($id_fk_user, $id_fk_provinsi)
  {
    $data = array(
      "id_fk_user" => $id_fk_user,
      "id_fk_provinsi" => $id_fk_provinsi,
      "user_provinsi_status" => "aktif",
    );
    insertRow("tbl_user_provinsi", $data);
  }
  public function get_selected_provinsi($id_fk_user)
  {
    $sql = "select id_pk_user_provinsi, id_pk_provinsi, provinsi_nama, id_fk_provinsi from tbl_user_provinsi inner join mstr_provinsi on mstr_provinsi.id_pk_provinsi = tbl_user_provinsi.id_fk_provinsi where user_provinsi_status = 'aktif' and id_fk_user = ?";
    $args = array(
      $id_fk_user
    );
    return executeQuery($sql, $args);
  }

  public function get_selected_provinsi_asm($id_fk_user)
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

    $sql = "select id_pk_user_provinsi, id_pk_provinsi, provinsi_nama, id_fk_provinsi from tbl_user_provinsi inner join mstr_provinsi on mstr_provinsi.id_pk_provinsi = tbl_user_provinsi.id_fk_provinsi where user_provinsi_status = 'aktif' and id_fk_user IN ($id_user)";

    return executeQuery($sql);
  }

  public function get_unselected_provinsi($id_fk_user)
  {
    $sql = "
    select id_pk_provinsi, provinsi_nama from mstr_provinsi where provinsi_status = 'aktif' and id_pk_provinsi not in (
      select id_fk_provinsi from tbl_user_provinsi where id_fk_user = ? and user_provinsi_status = 'aktif'
    ) ";
    $args = array(
      $id_fk_user
    );
    return executeQuery($sql, $args);
  }

  public function get_unselected_provinsi_asm($id_fk_user)
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
    select id_pk_provinsi, provinsi_nama from mstr_provinsi where provinsi_status = 'aktif' and id_pk_provinsi not in (
      select id_fk_provinsi from tbl_user_provinsi where id_fk_user in ($id_user) and user_provinsi_status = 'aktif'
    ) ";
    return executeQuery($sql);
  }

  public function deactive_data($id_user)
  {
    $where = array(
      "id_fk_user" => $id_user
    );
    $data = array(
      "user_provinsi_status" => "nonaktif"
    );
    updateRow("tbl_user_provinsi", $data, $where);
  }
}
