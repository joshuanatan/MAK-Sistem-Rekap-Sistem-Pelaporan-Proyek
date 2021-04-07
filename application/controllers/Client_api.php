<?php
class Client_api extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }
    public function input_client(){
        $this->load->model("m_client","client");
        $nama = $this->input->post("nama");
        $industri = $this->input->post("industri");
        $cp = $this->input->post("cp");
        $cp_no = $this->input->post("cp_no");
        $cp_email = $this->input->post("cp_email");
        $notes = $this->input->post("notes");
        
        $result = $this->client->insert($nama,$industri,$cp,$cp_no,$cp_email,$notes);
        if($result["status"]){
            $result = array(
                "status" => true,
                "msg" => "Client is created",
                "data" => array(
                    "nama" => $nama, 
                    "industri" => $industri, 
                    "cp" => $cp, 
                    "cp_no" => $cp_no, 
                    "cp_email" => $cp_email, 
                    "notes" => $notes 
                )
            );
        }
        else{
            $result = array(
                "status" => false,
                "msg" => $result
            );
        }
        echo json_encode($result);
    }
}