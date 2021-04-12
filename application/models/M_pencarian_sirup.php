<?php
date_default_timezone_set("Asia/Jakarta");
/*
create table mstr_pencarian_sirup(
    id_pk_pencarian_sirup int primary key auto_increment,
    pencarian_sirup_tahun varchar(100),
    pencarian_sirup_frase varchar(100),
    pencarian_sirup_jenis int,
    pencarian_sirup_status  varchar(20),
    pencarian_sirup_id_create int,
    pencarian_sirup_id_update int,
    pencarian_sirup_id_delete int,
    pencarian_sirup_tgl_create datetime,
    pencarian_sirup_tgl_update datetime,
    pencarian_sirup_tgl_delete  datetime
)
*/
class M_pencarian_sirup extends CI_Model{
    private $id_pk_pencarian_sirup;
    private $pencarian_sirup_tahun;
    private $pencarian_sirup_frase;
    private $pencarian_sirup_jenis;
    private $pencarian_sirup_status;
    private $pencarian_sirup_id_create;
    private $pencarian_sirup_id_update;
    private $pencarian_sirup_id_delete;
    private $pencarian_sirup_tgl_create;
    private $pencarian_sirup_tgl_update;
    private $pencarian_sirup_tgl_delete;

    public function __construct(){
        parent::__construct();
    }
    public function get_data($search = ""){
        $query = "";
        if($search != ""){

        }
        $sql = "select id_pk_pencarian_sirup,pencarian_sirup_tahun,pencarian_sirup_frase,pencarian_sirup_jenis,pencarian_sirup_status,pencarian_sirup_id_create,pencarian_sirup_id_update,pencarian_sirup_id_delete,pencarian_sirup_tgl_create,pencarian_sirup_tgl_update,pencarian_sirup_tgl_delete from mstr_pencarian_sirup where pencarian_sirup_status = 'aktif' ".$query;
        
        $result = executeQuery($sql);
        return $result;
    }
    public function insert(){
        if($this->pencarian_sirup_tahun == ""){
            return false;
        }
        if($this->pencarian_sirup_frase == ""){
            return false;
        }
        if($this->pencarian_sirup_jenis == ""){
            return false;
        }
        if($this->pencarian_sirup_status == ""){
            return false;
        }
        $data = array(
            "pencarian_sirup_tahun" => $this->pencarian_sirup_tahun,
            "pencarian_sirup_frase" => $this->pencarian_sirup_frase,
            "pencarian_sirup_jenis" => $this->pencarian_sirup_jenis,
            "pencarian_sirup_status" => $this->pencarian_sirup_status,
            "pencarian_sirup_id_create" => $this->session->id_user,
            "pencarian_sirup_tgl_create" => date("Y-m-d H:i:s")
        );
        return insertRow("mstr_pencarian_sirup",$data);
    }
    public function update(){
        $where = array(
            "id_pk_pencarian_sirup" => $this->id_pk_pencarian_sirup
        );
        $data = array(
            "pencarian_sirup_tahun" => $this->pencarian_sirup_tahun, 
            "pencarian_sirup_frase" => $this->pencarian_sirup_frase, 
            "pencarian_sirup_jenis" => $this->pencarian_sirup_jenis, 
            "pencarian_sirup_id_update" => $this->session->id_user, 
            "pencarian_sirup_tgl_update" => date("Y-m-d H:i:s"), 
        );
        updateRow("mstr_pencarian_sirup",$data,$where);
        return true;
    }
    public function delete(){
        if($this->id_pk_pencarian_sirup == ""){
            return false;
        }
        $where = array(
            "id_pk_pencarian_sirup" => $this->id_pk_pencarian_sirup
        );
        $data = array(
            "pencarian_sirup_status" => "nonaktif",
            "pencarian_sirup_id_delete" => $this->session->id_user,
            "pencarian_sirup_tgl_delete" => date("Y-m-d H:i:S")
        );
        updateRow("mstr_pencarian_sirup",$data,$where);
        return true;
    }
    public function set_insert($pencarian_sirup_tahun,$pencarian_sirup_frase,$pencarian_sirup_jenis,$pencarian_sirup_status){
        if(!$this->set_pencarian_sirup_tahun($pencarian_sirup_tahun)){
            return false;
        }
        if(!$this->set_pencarian_sirup_frase($pencarian_sirup_frase)){
            return false;
        }
        if(!$this->set_pencarian_sirup_jenis($pencarian_sirup_jenis)){
            return false;
        }
        if(!$this->set_pencarian_sirup_status($pencarian_sirup_status)){
            return false;
        }
        return true;
    }
    public function set_update($id_pk_pencarian_sirup,$pencarian_sirup_tahun,$pencarian_sirup_frase,$pencarian_sirup_jenis){
        if(!$this->set_id_pk_pencarian_sirup($id_pk_pencarian_sirup)){
            return false;
        }
        if(!$this->set_pencarian_sirup_tahun($pencarian_sirup_tahun)){
            return false;
        }
        if(!$this->set_pencarian_sirup_frase($pencarian_sirup_frase)){
            return false;
        }
        if(!$this->set_pencarian_sirup_jenis($pencarian_sirup_jenis)){
            return false;
        }
        return true;
    }
    public function set_delete($id_pk_pencarian_sirup){
        if(!$this->set_id_pk_pencarian_sirup($id_pk_pencarian_sirup)){
            return false;
        }
        return true;
    }
    public function set_id_pk_pencarian_sirup($id_pk_pencarian_sirup){
        if($id_pk_pencarian_sirup != ""){
            $this->id_pk_pencarian_sirup = $id_pk_pencarian_sirup;
            return true;
        }
        return false;
    }
    public function set_pencarian_sirup_tahun($pencarian_sirup_tahun){
        if($pencarian_sirup_tahun != ""){
            $this->pencarian_sirup_tahun = $pencarian_sirup_tahun;
            return true;
        }
        return false;
    }
    public function set_pencarian_sirup_frase($pencarian_sirup_frase){
        if($pencarian_sirup_frase != ""){
            $this->pencarian_sirup_frase = $pencarian_sirup_frase;
            return true;
        }
        return false;
    }
    public function set_pencarian_sirup_jenis($pencarian_sirup_jenis){
        if($pencarian_sirup_jenis != ""){
            $this->pencarian_sirup_jenis = $pencarian_sirup_jenis;
            return true;
        }
        return false;
    }
    public function set_pencarian_sirup_status($pencarian_sirup_status){
        if($pencarian_sirup_status != ""){
            $this->pencarian_sirup_status = $pencarian_sirup_status;
            return true;
        }
        return false;
    }
}