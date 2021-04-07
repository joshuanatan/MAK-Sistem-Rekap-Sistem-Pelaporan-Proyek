<?php
#DO NOT COMMIT TO GIT
class Sensitive extends CI_Controller{
    
    public function insert_initial_user(){
        #careful
        $this->load->model("m_user","user");
        if(!$this->user->is_user_exists()){
            $result = $this->user->insert("admin","admin@email.com","j13n3w98","admin");
            echo json_encode($result);
        }
    }
}