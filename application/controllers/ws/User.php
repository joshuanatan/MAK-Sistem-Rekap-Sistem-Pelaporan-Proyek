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
  public function insert() {
    $temp_user_username = $this->input->post('username');
    $temp_user_password = $this->input->post('password');
    $temp_user_email = $this->input->post('email');
    $temp_user_telepon = $this->input->post('telepon');
    $temp_user_role = $this->input->post('role');
    $this->load->model("m_user");
    $id_user = $this->m_user->insert($temp_user_username, $temp_user_password, $temp_user_email, $temp_user_telepon, $temp_user_role);
    if($temp_user_role == "Sales Engineer"){
      $id_kabupaten = $this->input->post("kabupaten");
      
      $this->load->model("m_user_kabupaten");
      $this->m_user_kabupaten->insert($id_user,$id_kabupaten);

      $this->load->model("m_user_rs");
      $rumah_sakit = $this->input->post("se_rs");
      foreach($rumah_sakit as $rs){
        $this->m_user_rs->insert($id_user,$rs);
      }
    }
    else if($temp_user_role == "Supervisor" || $temp_user_role == "Area Sales Manager"){

    }
    else{
      
    }
  }
}
?>
