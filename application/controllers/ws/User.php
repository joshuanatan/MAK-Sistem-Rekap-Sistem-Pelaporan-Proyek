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

}
