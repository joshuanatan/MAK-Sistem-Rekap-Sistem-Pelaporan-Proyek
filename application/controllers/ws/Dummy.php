<?php
class Dummy extends CI_Controller{
    public function get_data_select(){
        $options = array(
            "opsi1","opsi2","opsi3"
        );
        echo json_encode($options);
    }
    public function get_data_select2(){
        $options = array();
        for($a = 0; $a<10; $a++){
            $options[$a] = "Opsi".$a;
        }
        echo json_encode($options);
    }
}