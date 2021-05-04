<?php
date_default_timezone_set("Asia/Jakarta");
class M_penyelenggara extends CI_Model{

  public function get_penyelenggara(){
    $sql = "SELECT id_pk_penyelenggara, penyelenggara_nama, penyelenggara_status FROM mstr_penyelenggara where penyelenggara_status = 'aktif'";
    $result = $this->db->query($sql);
    return $result;
  }

  public function insert($penyelenggara_nama, $penyelenggara_status) {
    $data = array(
      "penyelenggara_nama"=>$penyelenggara_nama,
      "penyelenggara_status"=>"aktif"
    );
    $this->db->insert("mstr_penyelenggara",$data);
  }

  public function delete_penyelenggara($id_pk_penyelenggara) {
    $sql = "UPDATE mstr_penyelenggara SET penyelenggara_status = 'nonaktif' WHERE id_pk_penyelenggara = $id_pk_penyelenggara";
    $result = $this->db->query($sql);
  }

  public function edit_penyelenggara($id_pk_penyelenggara, $penyelenggara_nama){
    $where = array(
      "id_pk_penyelenggara" => $id_pk_penyelenggara
    );
    $data = array(
      "penyelenggara_nama"=>$penyelenggara_nama
    );
    $this->db->update("mstr_penyelenggara",$data,$where);
  }
  public function search($kolom_pengurutan,$arah_kolom_pengurutan,$pencarian_phrase,$kolom_pencarian,$current_page){
    $search_query = "";
    if($pencarian_phrase != ""){
      if($kolom_pencarian == "all"){
        $search_query = "and (penyelenggara_nama like '%".$pencarian_phrase."%')";
      }
      else{
        $search_query = "and (".$kolom_pencarian." like '%".$pencarian_phrase."%')";
      }
    }
    $sql = "SELECT id_pk_penyelenggara, penyelenggara_nama, penyelenggara_status FROM mstr_penyelenggara where penyelenggara_status = 'aktif' ".$search_query." order by ".$kolom_pengurutan." ".$arah_kolom_pengurutan." limit 20 offset ".(20*($current_page-1));
    return executeQuery($sql);
  }
}
