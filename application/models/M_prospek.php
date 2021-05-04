<?php
date_default_timezone_set("Asia/Jakarta");
class M_prospek extends CI_Model{
     public function get_rs(){
      $sql = "
      SELECT id_pk_rs, rs_nama, rs_status
      FROM mstr_rs
      WHERE rs_status = 'aktif'";
      $result = $this->db->query($sql);
      return $result;
     }
     public function get_produk(){
       $sql = "SELECT id_pk_produk, produk_nama FROM mstr_produk WHERE produk_status = 'aktif'";
       return executeQuery($sql);
     }

    public function search($kolom_pengurutan,$arah_kolom_pengurutan,$pencarian_phrase,$kolom_pencarian,$current_page){
      $search_query = "";
      if($pencarian_phrase != ""){
        if($kolom_pencarian == "all"){
          $search_query = "and (rs_kode like '%".$pencarian_phrase."%' or rs_nama like '%".$pencarian_phrase."%' or rs_kelas like '%".$pencarian_phrase."%' or rs_direktur like '%".$pencarian_phrase."%' or rs_alamat like '%".$pencarian_phrase."%' or rs_kategori like '%".$pencarian_phrase."%' or rs_kode_pos like '%".$pencarian_phrase."%' or rs_telepon like '%".$pencarian_phrase."%' or rs_fax like '%".$pencarian_phrase."%' or kabupaten_nama like '%".$pencarian_phrase."%' or provinsi_nama like '%".$pencarian_phrase."%' or jenis_rs_nama like '%".$pencarian_phrase."%' or jenis_rs_kode like '%".$pencarian_phrase."%' or penyelenggara_nama like '%".$pencarian_phrase."%')";
        }
        else{
          $search_query = "and (".$kolom_pencarian." like '%".$pencarian_phrase."%')";
        }
      }
      $sql = "SELECT id_pk_rs, rs_kode, rs_nama, rs_kelas, rs_direktur, rs_alamat, rs_kategori, id_fk_kabupaten, rs_kode_pos, rs_telepon, rs_fax, id_fk_jenis_rs, id_fk_penyelenggara, rs_status, mstr_kabupaten.kabupaten_nama AS nama_kabupaten, id_fk_provinsi, provinsi_nama, mstr_jenis_rs.jenis_rs_nama AS jenis_rs, mstr_penyelenggara.penyelenggara_nama AS penyelenggara FROM mstr_rs
      INNER JOIN mstr_kabupaten ON mstr_rs.id_fk_kabupaten = mstr_kabupaten.id_pk_kabupaten
      INNER JOIN mstr_provinsi ON mstr_kabupaten.id_fk_provinsi = mstr_provinsi.id_pk_provinsi
      INNER JOIN mstr_jenis_rs ON mstr_rs.id_fk_jenis_rs = mstr_jenis_rs.id_pk_jenis_rs
      INNER JOIN mstr_penyelenggara ON mstr_rs.id_fk_penyelenggara = mstr_penyelenggara.id_pk_penyelenggara
      WHERE rs_status = 'aktif' ".$search_query." order by ".$kolom_pengurutan." ".$arah_kolom_pengurutan." limit 20 offset ".(20*($current_page-1));

      return executeQuery($sql);
    }
}