<?php
class Dummy extends CI_Controller{
    public function set_session(){
        echo "berhasil id terbuat";
        $this->session->id_user = 1;
    }
}