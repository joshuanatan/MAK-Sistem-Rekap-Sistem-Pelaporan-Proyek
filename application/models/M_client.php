<?php
date_default_timezone_set("Asia/Jakarta");
class M_client extends CI_Model{
    private $id_submit_client;
    private $no_client;
    private $nama_client;
    private $industri_client;
    private $cp_client;
    private $cp_client_no;
    private $cp_client_email;
    private $notes_client;
    private $status_client;
    private $tgl_create_client;
    private $tgl_edit_client;
    private $tgl_delete_client;
    private $id_user_create_client;
    private $id_user_edit_client;
    private $id_user_delete_client;

    public function insert($nama_client,$industri_client,$cp_client,$cp_client_no,$cp_client_email,$notes_client){
        $nama_client_result = $this->set_nama_client($nama_client);
        $industri_client_result = $this->set_industri_client($industri_client);
        $cp_client_result = $this->set_cp_client($cp_client);
        $cp_client_no_result = $this->set_cp_client_no($cp_client_no);
        $cp_client_email_result = $this->set_cp_client_email($cp_client_email);
        $notes_client_result = $this->set_notes_client($notes_client);

        if(
            $nama_client_result["status"] &&
            $industri_client_result["status"] &&
            $cp_client_result["status"] &&
            $cp_client_no_result["status"] &&
            $cp_client_email_result["status"] &&
            $notes_client_result["status"]
        ){
            $date = date("Y-m-d H:i:S");
            $data = array(
                "nama_client" => $this->nama_client,
                "industri_client" => $this->industri_client,
                "cp_client" => $this->cp_client,
                "cp_client_no" => $this->cp_client_no,
                "cp_client_email" => $this->cp_client_email,
                "notes_client" => $this->notes_client,
                "status_client" => "aktif",
                "tgl_create_client" => $date,
                "id_user_create_client" => $this->session->id_submit_user
            );
            $id_client = insertRow("mstr_client",$data);
            $where = array(
                "id_submit_client" => $id_client
            );
            $data = array(
                "no_client" => md5("clnt-".$id_client)
            );
            updateRow("mstr_client",$data,$where);
            $result = array(
                "status" => true,
                "msg" => array(
                    "nama" => $this->nama_client,
                    "industri" => $this->industri_client,
                    "cp" => $this->cp_client,
                    "cp no" => $this->cp_client_no,
                    "cp email" => $this->cp_client_email,
                    "notes" => $this->notes_client
                )
            );
        }
        else{
            $result = array(
                "status" => false,
                "msg" => array(
                    "nama" => $nama_client_result["status"],
                    "industri" => $industri_client_result["status"],
                    "cp" => $cp_client_result["status"],
                    "cp no" => $cp_client_no_result["status"],
                    "cp email" => $cp_client_email_result["status"],
                    "notes" => $notes_client_result["status"]
                )
            );
        }
        return $result;
    }
    public function set_id_submit_client($id_submit_client){

        if($id_submit_client != ""){
            $this->id_submit_client = $id_submit_client;
            $result = array(
                "status" => true,
            );
        }
        else{
            $result = array(
                "status" => false,
                "msg" => "id_submit_client"
            );
        }
        return $result;
    }
    public function set_no_client($no_client){

        if($no_client != ""){
            $this->no_client = $no_client;
            $result = array(
                "status" => true,
            );
        }
        else{
            $result = array(
                "status" => false,
                "msg" => "no_client"
            );
        }
        return $result;
    }
    public function set_nama_client($nama_client){

        if($nama_client != ""){
            $this->nama_client = $nama_client;
            $result = array(
                "status" => true,
            );
        }
        else{
            $result = array(
                "status" => false,
                "msg" => "nama_client"
            );
        }
        return $result;
    }
    public function set_industri_client($industri_client){

        if($industri_client != ""){
            $this->industri_client = $industri_client;
            $result = array(
                "status" => true,
            );
        }
        else{
            $result = array(
                "status" => false,
                "msg" => "industri_client"
            );
        }
        return $result;
    }
    public function set_cp_client($cp_client){

        if($cp_client != ""){
            $this->cp_client = $cp_client;
            $result = array(
                "status" => true,
            );
        }
        else{
            $result = array(
                "status" => false,
                "msg" => "cp_client"
            );
        }
        return $result;
    }
    public function set_cp_client_no($cp_client_no){

        if($cp_client_no != ""){
            $this->cp_client_no = $cp_client_no;
            $result = array(
                "status" => true,
            );
        }
        else{
            $result = array(
                "status" => false,
                "msg" => "cp_client_no"
            );
        }
        return $result;
    }
    public function set_cp_client_email($cp_client_email){

        if($cp_client_email != ""){
            $this->cp_client_email = $cp_client_email;
            $result = array(
                "status" => true,
            );
        }
        else{
            $result = array(
                "status" => false,
                "msg" => "cp_client_email"
            );
        }
        return $result;
    }
    public function set_notes_client($notes_client){

        $this->notes_client = $notes_client;
        $result = array(
            "status" => true,
        );
        return $result;
    }
    public function set_status_client($status_client){

        if($status_client != ""){
            $this->status_client = $status_client;
            $result = array(
                "status" => true,
            );
        }
        else{
            $result = array(
                "status" => false,
                "msg" => "status_client"
            );
        }
        return $result;
    }
    public function set_tgl_create_client($tgl_create_client){

        if($tgl_create_client != ""){
            $this->tgl_create_client = $tgl_create_client;
            $result = array(
                "status" => true,
            );
        }
        else{
            $result = array(
                "status" => false,
                "msg" => "tgl_create_client"
            );
        }
        return $result;
    }
    public function set_tgl_edit_client($tgl_edit_client){

        if($tgl_edit_client != ""){
            $this->tgl_edit_client = $tgl_edit_client;
            $result = array(
                "status" => true,
            );
        }
        else{
            $result = array(
                "status" => false,
                "msg" => "tgl_edit_client"
            );
        }
        return $result;
    }
    public function set_tgl_delete_client($tgl_delete_client){

        if($tgl_delete_client != ""){
            $this->tgl_delete_client = $tgl_delete_client;
            $result = array(
                "status" => true,
            );
        }
        else{
            $result = array(
                "status" => false,
                "msg" => "tgl_delete_client"
            );
        }
        return $result;
    }
    public function set_id_user_create_client($id_user_create_client){

        if($id_user_create_client != ""){
            $this->id_user_create_client = $id_user_create_client;
            $result = array(
                "status" => true,
            );
        }
        else{
            $result = array(
                "status" => false,
                "msg" => "id_user_create_client"
            );
        }
        return $result;
    }
    public function set_id_user_edit_client($id_user_edit_client){

        if($id_user_edit_client != ""){
            $this->id_user_edit_client = $id_user_edit_client;
            $result = array(
                "status" => true,
            );
        }
        else{
            $result = array(
                "status" => false,
                "msg" => "id_user_edit_client"
            );
        }
        return $result;
    }
    public function set_id_user_delete_client($id_user_delete_client){

        if($id_user_delete_client != ""){
            $this->id_user_delete_client = $id_user_delete_client;
            $result = array(
                "status" => true,
            );
        }
        else{
            $result = array(
                "status" => false,
                "msg" => "id_user_delete_client"
            );
        }
        return $result;
    }
}
