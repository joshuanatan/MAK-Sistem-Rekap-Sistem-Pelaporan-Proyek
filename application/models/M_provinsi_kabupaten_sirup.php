<?php
class M_provinsi_kabupaten_sirup extends CI_model
{

  public function get_kabupaten()
  {
    $sql = "select kabupaten from tbl_provinsi_kabupaten_sirup";

    return executeQuery($sql);
  }
}
