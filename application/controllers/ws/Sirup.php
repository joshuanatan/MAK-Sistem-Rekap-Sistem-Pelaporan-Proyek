<?php
class Sirup extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }
    public function delete_pencarian($id_pk_pencarian_sirup){
        $this->load->model("m_pencarian_sirup");
        $result = $this->m_pencarian_sirup->set_delete($id_pk_pencarian_sirup);
        if($result){
            $result = $this->m_pencarian_sirup->delete();
            if($result){
                $respond["status"] = "success";
                $respond["msg"] = "data berhasil di hapus";
            }
            else{
                $respond["status"] = "error";
                $respond["msg"] = "data gagal di hapus";
            }
        }
        else{
            $respond["status"] = "error";
            $respond["msg"] = "id invalid";
        }
        echo json_encode($respond);
    }   
}