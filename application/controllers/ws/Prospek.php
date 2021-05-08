<?php
class Prospek extends CI_Controller{

  public function get_data(){
    $this->load->model("m_prospek");
    $response["data"] = $this->m_prospek->get_prospek()->result_array();

    echo json_encode($response);
  }

  public function delete($id){
    if($id != ""){
      $this->load->model("m_prospek");
      $this->m_prospek->delete($id);
      $response["status"] = true;
    }
    else{
      $response["status"] = false;
      $response["msg"] = "The ID Prospek field is required";
    }
    echo json_encode($response);
  }
}
