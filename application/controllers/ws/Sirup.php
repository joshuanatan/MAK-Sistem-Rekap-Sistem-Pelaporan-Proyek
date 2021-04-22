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
    public function get_detail_lokasi_pekerjaan($id_pk_sirup){
        $this->load->model("m_sirup");
        $result = $this->m_sirup->get_detail_lokasi_pekerjaan($id_pk_sirup);
        $result = $result->result_array();
        echo json_encode($result);
    }
    public function get_detail_sumber_dana($id_pk_sirup){
        $this->load->model("m_sirup");
        $result = $this->m_sirup->get_detail_sumber_dana($id_pk_sirup);
        $result = $result->result_array();
        echo json_encode($result);
    }
    public function get_detail_pemanfaatan_barang($id_pk_sirup){
        $this->load->model("m_sirup");
        $result = $this->m_sirup->get_detail_pemanfaatan_barang($id_pk_sirup);
        $result = $result->result_array();
        echo json_encode($result);
    }
    public function get_detail_pelaksanaan_kontrak($id_pk_sirup){
        $this->load->model("m_sirup");
        $result = $this->m_sirup->get_detail_pelaksanaan_kontrak($id_pk_sirup);
        $result = $result->result_array();
        echo json_encode($result);
    }
    public function get_detail_jadwal_pemilihan($id_pk_sirup){
        $this->load->model("m_sirup");
        $result = $this->m_sirup->get_detail_jadwal_pemilihan($id_pk_sirup);
        $result = $result->result_array();
        echo json_encode($result);
    }
    public function delete($id_pk_sirup){
        $this->load->model("m_sirup");
        $this->m_sirup->delete($id_pk_sirup);
        $result["status"] = "success";
        echo json_encode($result);
    }
}