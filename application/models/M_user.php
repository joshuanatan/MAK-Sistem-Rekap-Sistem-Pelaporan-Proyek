<?php
date_default_timezone_set("Asia/Jakarta");
class M_user extends CI_Model{
    private $id_pk_user;
    private $id_fk_atasan;
    private $user_username;
    private $user_password;
    private $user_email;
    private $user_telepon;
    private $user_status;
    private $user_tgl_create;
    private $user_tgl_update;
    private $user_tgl_delete;
    private $user_id_create;
    private $user_id_update;
    private $user_id_delete;


    public function get_user(){
        $sql = "select id_pk_user, id_fk_atasan, user_username, user_password, user_email, user_telepon, user_status, user_tgl_create, user_tgl_update, user_tgl_delete, user_id_create, user_id_update, user_id_delete FROM mstr_user WHERE user_status='aktif'";
        $result = $this->db->query($sql);
        return $result;
    }

    public function insert_user($user_username, $user_password, $user_email, $user_telepon){
        $date = date("Y-m-d H:i:S");
        $data = array(
          "user_username"=>$user_username,
          "user_password"=>md5($user_password),
          "user_email"=>$user_email,
          "user_telepon"=>$user_telepon,
          "user_status"=>"aktif",
          "user_tgl_create"=>$date
        );
        $this->db->insert("mstr_user", $data);
    }

    public function delete_user($id_pk_user) {
        $sql = "UPDATE mstr_user SET user_status = 'nonaktif' WHERE id_pk_user = $id_pk_user";
        $result = $this->db->query($sql);
    }

    public function edit_user($id_pk_user, $user_username, $user_password, $user_email, $user_telepon){
        $date = date("Y-m-d H:i:S");
        $password = md5($user_password);
        $sql = "UPDATE mstr_user SET user_username = '$user_username', user_password = '$password', user_email = '$user_email', user_telepon = '$user_telepon', user_tgl_update = '$date' WHERE id_pk_user = $id_pk_user";
        $result = $this->db->query($sql);
    }
  }
