<?php
class User extends CI_Controller{
    public function get_data_sales_engineer(){
      $this->load->model("m_kabupaten");
      $result_kabupaten = $this->m_kabupaten->get_kabupaten();

      $options = array (
        "data_kabupaten" => $result_kabupaten->result_array()
      );
      echo json_encode($options);
    }

    public function data_kabupaten($id_pk_provinsi){
      $this->load->model("m_user");
      $result = $this->m_user->get_kabupaten($id_pk_provinsi)->result_array();
      echo json_encode($result);
    }

    public function data_rs($id_pk_kabupaten){
      $this->load->model("m_user");
      $result = $this->m_user->get_rs($id_pk_kabupaten)->result_array();
      echo json_encode($result);
    }
}
?>
