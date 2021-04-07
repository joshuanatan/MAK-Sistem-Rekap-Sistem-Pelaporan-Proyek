<?php
date_default_timezone_set("Asia/Jakarta");
class M_user extends CI_Model{
    private $id_submit_user;
    private $no_user;
    private $nama_user;
    private $email_user;
    private $password_user;
	private $role_user;
    private $status_user;
    private $tgl_create_user;
    private $tgl_edit_user;
    private $tgl_delete_user;
    private $id_user_create_user;
    private $id_user_edit_user;
    private $id_user_delete_user;
    
    public function get_user(){
        $sql = "select no_user, nama_user, email_user, role_user, status_user from mstr_user";
        $result = executeQuery($sql);
        if($result->num_rows() > 0){
            $data = $result->result_array();
            $result = array(
                "status" => true,
                "msg" => "Data found",
                "data" => $data
            );
        }
        else{
            $result = array(
                "status" => false,
                "msg" => "Data not found",
            );
        }
        return $result;
    }
    public function insert($nama_user, $email_user, $password_user, $role_user){
        $nama_result = $this->set_nama_user($nama_user);
        $email_result = $this->set_email_user($email_user);
        $password_result = $this->set_password_user($password_user);
        $role_result = $this->set_role_user($role_user);
        if(
            $nama_result["status"] &&
            $email_result["status"] &&
            $password_result["status"] &&
            $role_result["status"]
        ){
            $date = date("Y-m-d H:i:S");
            $data = array(
                "nama_user" => $this->nama_user,
                "email_user" => $this->email_user,
                "password_user" => md5($this->password_user),
                "role_user" => $this->role_user,
                "status_user" => "aktif",
                "tgl_create_user" => $date,
                "id_user_create_user" => $this->session->id_user 
            );
            $id_user = insertRow("mstr_user",$data);
            $where = array(
                "id_submit_user" => $id_user
            );
            $data = array(
                "no_user" => md5("user-".$id_user)
            );
            updateRow("mstr_user",$data,$where);
            $result = array(
                "status" => true,
                "msg" => array(
                    "no" => md5("user-".$id_user),
                    "nama" => $this->nama_user,
                    "email" => $this->email_user,
                    "role" => $this->role_user,
                    "status" => "aktif",
                    "tgl_create" => $date,
                )
            );
        }
        else{
            $result = array(
                "status" => false,
                "msg" => array(
                    "nama" => $nama_result["status"],
                    "email" => $email_result["status"],
                    "password" => $password_result["status"],
                    "role" => $role_result["status"]
                )
            );
        }
        return $result;
    }
    public function is_user_exists(){
        $sql = "select id_submit_user from mstr_user where mstr_user.status_user = 'aktif'";
        $result = executeQuery($sql);
        $result = $result->num_rows() > 0 ? true: false;
        return $result;
    }
    public function authentication($email,$password){
        $email_result = $this->set_email_user($email);
        $password_result = $this->set_password_user($password);
        if(
            $email_result["status"] &&
            $password_result["status"]
        ){
            $sql = "select no_user, nama_user, email_user, role_user, status_user from mstr_user where status_user = 'aktif' and email_user = ? and password_user = ?";
            $args = array(
                $this->email_user,md5($this->password_user)
            );
            $result = executeQuery($sql, $args);
            if($result->num_rows() > 0){
                $result = array(
                    "status" => true,
                    "msg" => $result->result_array()
                );
            }
            else{
                $result = array(
                    "status" => false,
                    "msg" => "User is not authenticated"
                );
            }
        }
        else{
            $result = array(
                "status" => false,
                "msg" => "Input is incorrect",
                "data" => array(
                    "email" => $email_result["status"],
                    "password" => $password_result["status"],
                )
            );
        }
        return $result;
    }
    public function set_id_submit_user($id_submit_user){
        if($id_submit_user != ""){
            $this->id_submit_user = $id_submit_user;
            $result = array(
                "status" => true,
            );
        }
        else{
            $result = array(
                "status" => false,
                "section" => "id_submit_user"
            );
        }
        return $result;
    }
    public function set_no_user($no_user){
        if($no_user != ""){
            $this->no_user = $no_user;
            $result = array(
                "status" => true,
            );
        }
        else{
            $result = array(
                "status" => false,
                "section" => "no_user"
            );
        }
        return $result;
    }
    public function set_nama_user($nama_user){
        if($nama_user != ""){
            $this->nama_user = $nama_user;
            $result = array(
                "status" => true,
            );
        }
        else{
            $result = array(
                "status" => false,
                "section" => "nama_user"
            );
        }
        return $result;
    }
    public function set_email_user($email_user){
        if($email_user != ""){
            $this->email_user = $email_user;
            $result = array(
                "status" => true,
            );
        }
        else{
            $result = array(
                "status" => false,
                "section" => "email_user"
            );
        }
        return $result;
    }
    public function set_password_user($password_user){
        if($password_user != ""){
            $this->password_user = $password_user;
            $result = array(
                "status" => true,
            );
        }
        else{
            $result = array(
                "status" => false,
                "section" => "password_user"
            );
        }
        return $result;
    }
    public function set_role_user($role_user){
        if($role_user != ""){
            $this->role_user = $role_user;
            $result = array(
                "status" => true,
            );
        }
        else{
            $result = array(
                "status" => false,
                "section" => "role_user"
            );
        }
        return $result;
    }
    public function set_status_user($status_user){
        if($status_user != ""){
            $this->status_user = $status_user;
            $result = array(
                "status" => true,
            );
        }
        else{
            $result = array(
                "status" => false,
                "section" => "status_user"
            );
        }
        return $result;
    }
    public function set_tgl_create_user($tgl_create_user){
        if($tgl_create_user != ""){
            $this->tgl_create_user = $tgl_create_user;
            $result = array(
                "status" => true,
            );
        }
        else{
            $result = array(
                "status" => false,
                "section" => "tgl_create_user"
            );
        }
        return $result;
    }
    public function set_tgl_edit_user($tgl_edit_user){
        if($tgl_edit_user != ""){
            $this->tgl_edit_user = $tgl_edit_user;
            $result = array(
                "status" => true,
            );
        }
        else{
            $result = array(
                "status" => false,
                "section" => "tgl_edit_user"
            );
        }
        return $result;
    }
    public function set_tgl_delete_user($tgl_delete_user){
        if($tgl_delete_user != ""){
            $this->tgl_delete_user = $tgl_delete_user;
            $result = array(
                "status" => true,
            );
        }
        else{
            $result = array(
                "status" => false,
                "section" => "tgl_delete_user"
            );
        }
        return $result;
    }
    public function set_id_user_create_user($id_user_create_user){
        if($id_user_create_user != ""){
            $this->id_user_create_user = $id_user_create_user;
            $result = array(
                "status" => true,
            );
        }
        else{
            $result = array(
                "status" => false,
                "section" => "id_user_create_user"
            );
        }
        return $result;
    }
    public function set_id_user_edit_user($id_user_edit_user){
        if($id_user_edit_user != ""){
            $this->id_user_edit_user = $id_user_edit_user;
            $result = array(
                "status" => true,
            );
        }
        else{
            $result = array(
                "status" => false,
                "section" => "id_user_edit_user"
            );
        }
        return $result;
    }
    public function set_id_user_delete_user($id_user_delete_user){
        if($id_user_delete_user != ""){
            $this->id_user_delete_user = $id_user_delete_user;
            $result = array(
                "status" => true,
            );
        }
        else{
            $result = array(
                "status" => false,
                "section" => "id_user_delete_user"
            );
        }
        return $result;
    }
    public function get_role_user($no_user){
        $user_result = $this->set_no_user($no_user);
        if($user_result["status"]){
            $sql = "select role_user from mstr_user where no_user = ?";
            $args = array(
                $this->no_user
            );
            $result = executeQuery($sql,$args);
            if($result->num_rows() > 0){
                $result = $result->result_array();
                $data = array(
                    "status" => true,
                    "msg" => "User role is found",
                    "data" => array(
                        "role" => $result[0]["role_user"]
                    )
                );
            }
            else{
                $data = array(
                    "status" => false,
                    "msg" => "User role is not found"
                );
            }
        }
        else{
            $data = array(
                "status" => false,
                "msg" => "Invalid argument"
            );
        }
        return $data;
    }
}