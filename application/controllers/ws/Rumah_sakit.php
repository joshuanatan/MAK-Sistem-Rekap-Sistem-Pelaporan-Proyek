<?php
class Rumah_sakit extends CI_Controller{
  public function data_kabupaten($id_pk_provinsi){
    $this->load->model("m_rumah_sakit");
    $result = $this->m_rumah_sakit->get_kabupaten($id_pk_provinsi)->result_array();
    echo json_encode($result);
  }
}
?>
