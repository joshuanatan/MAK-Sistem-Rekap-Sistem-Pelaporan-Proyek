<?php
date_default_timezone_set("Asia/Jakarta");
class M_prospek extends CI_Model{

     public function get_prospek(){
       $sql = "SELECT id_pk_prospek, mstr_provinsi.provinsi_nama as nama_provinsi, mstr_kabupaten.kabupaten_nama as nama_kabupaten, mstr_rs.rs_nama as nama_rs, prospek_principle, total_price_prospek, notes_kompetitor, notes_prospek, funnel, estimasi_pembelian, prospek_status
       FROM mstr_prospek
       INNER JOIN mstr_rs on mstr_prospek.id_fk_rs = mstr_rs.id_pk_rs
       INNER JOIN mstr_provinsi on mstr_provinsi.id_pk_provinsi = mstr_prospek.id_fk_provinsi
       INNER JOIN mstr_kabupaten on mstr_kabupaten.id_pk_kabupaten = mstr_prospek.id_fk_kabupaten
       WHERE prospek_status='aktif'";
       $result = $this->db->query($sql);
       return $result;
     }

     public function get_prospek_produk($id_fk_prospek){
       $sql = "SELECT mstr_produk.produk_nama as nama_produk, detail_prospek_quantity, mstr_produk.produk_price_list as harga_produk, detail_prospek_keterangan, detail_prospek_status
       FROM tbl_prospek_produk
       INNER JOIN mstr_produk on tbl_prospek_produk.id_pk_prospek_produk = mstr_produk.id_pk_produk
       WHERE id_fk_prospek = $id_fk_prospek AND detail_prospek_status='aktif'";
       return executeQuery($sql);
     }

     public function get_kabupaten($id_fk_user){
      $sql = "SELECT *
      FROM mstr_kabupaten
      INNER JOIN tbl_user_kabupaten on mstr_kabupaten.id_pk_kabupaten = tbl_user_kabupaten.id_fk_kabupaten
      WHERE tbl_user_kabupaten.id_fk_user = $id_fk_user AND kabupaten_status = 'aktif'";
      return executeQuery($sql);
     }

     public function get_provinsi(){
      $sql = "SELECT *
      FROM mstr_provinsi
      WHERE provinsi_status = 'aktif'";
      return executeQuery($sql);
     }

     public function get_kabupaten_adv($id_pk_provinsi){
      $sql = "SELECT *
      FROM mstr_kabupaten
      WHERE id_fk_provinsi = $id_pk_provinsi AND kabupaten_status = 'aktif'";
      return executeQuery($sql);
     }

     public function get_rs_sales_engineer($id){
      $sql = "SELECT id_pk_rs, rs_nama, rs_status
      FROM mstr_rs
      INNER JOIN tbl_user_rs on mstr_rs.id_pk_rs = tbl_user_rs.id_fk_rs
      WHERE tbl_user_rs.id_fk_user = ? AND rs_status = 'aktif' AND tbl_user_rs.user_rs_status = 'aktif'";
      $args = array(
        $id
      );
      $result = executeQuery($sql, $args);
      return $result;
     }

     public function get_produk(){
       $sql = "SELECT id_pk_produk, produk_nama,produk_price_list FROM mstr_produk WHERE produk_status = 'aktif'";
       return executeQuery($sql);
     }

     public function get_rs($id_kabupaten){
       $sql = "SELECT *
       FROM mstr_rs
       WHERE id_fk_kabupaten = ? AND rs_status = 'aktif'";
       $args = array(
         $id_kabupaten
       );
       return executeQuery($sql, $args);
     }

     public function get_data_rs_kategori($id_pk_rs){
       $sql = "SELECT rs_kategori FROM mstr_rs WHERE id_pk_rs = $id_pk_rs AND rs_status = 'aktif'";
       return executeQuery($sql);
     }

     public function delete($id_pk_prospek){
       $where = array(
         "id_pk_prospek" => $id_pk_prospek
       );
       $data = array(
         "prospek_status" => "deleted"
       );
       updateRow("mstr_prospek",$data,$where);
     }

     public function insert_prospek_se($id_fk_rs, $prospek_principle, $total_price_prospek, $notes_kompetitor, $notes_prospek, $estimasi_pembelian, $funnel) {
       $data = array(
         "id_fk_rs"=>$id_fk_rs,
         "prospek_principle"=>$prospek_principle,
         "total_price_prospek"=>$total_price_prospek,
         "notes_kompetitor"=>$notes_kompetitor,
         "notes_prospek"=>$notes_prospek,
         "estimasi_pembelian"=>$estimasi_pembelian,
         "funnel"=>$funnel,
         "prospek_status"=>"aktif"
       );
       return insertRow("mstr_prospek",$data);
     }

     public function insert_prospek_se_prospek($id_fk_rs, $prospek_principle, $total_price_prospek, $notes_kompetitor, $notes_prospek, $estimasi_pembelian, $funnel, $funnel_percentage) {
       $data = array(
         "id_fk_rs"=>$id_fk_rs,
         "prospek_principle"=>$prospek_principle,
         "total_price_prospek"=>$total_price_prospek,
         "notes_kompetitor"=>$notes_kompetitor,
         "notes_prospek"=>$notes_prospek,
         "estimasi_pembelian"=>$estimasi_pembelian,
         "funnel"=>$funnel,
         "funnel_percentage"=>$funnel_percentage,
         "prospek_status"=>"aktif"
       );
       return insertRow("mstr_prospek",$data);
     }

     public function insert_prospek_se_loss($id_fk_rs, $prospek_principle, $total_price_prospek, $notes_kompetitor, $notes_prospek, $estimasi_pembelian, $funnel, $note_loss) {
       $data = array(
         "id_fk_rs"=>$id_fk_rs,
         "prospek_principle"=>$prospek_principle,
         "total_price_prospek"=>$total_price_prospek,
         "notes_kompetitor"=>$notes_kompetitor,
         "notes_prospek"=>$notes_prospek,
         "estimasi_pembelian"=>$estimasi_pembelian,
         "funnel"=>$funnel,
         "note_loss"=>$note_loss,
         "prospek_status"=>"aktif"
       );
       return insertRow("mstr_prospek",$data);
     }

     public function insert_prospek_asm($id_fk_kabupaten, $id_fk_rs, $prospek_principle, $total_price_prospek, $notes_kompetitor, $notes_prospek, $estimasi_pembelian, $funnel) {
       $data = array(
         "id_fk_kabupaten"=>$id_fk_kabupaten,
         "id_fk_rs"=>$id_fk_rs,
         "prospek_principle"=>$prospek_principle,
         "total_price_prospek"=>$total_price_prospek,
         "notes_kompetitor"=>$notes_kompetitor,
         "notes_prospek"=>$notes_prospek,
         "estimasi_pembelian"=>$estimasi_pembelian,
         "funnel"=>$funnel,
         "prospek_status"=>"aktif"
       );
       return insertRow("mstr_prospek",$data);
     }

     public function insert_prospek_asm_prospek($id_fk_kabupaten, $id_fk_rs, $prospek_principle, $total_price_prospek, $notes_kompetitor, $notes_prospek, $estimasi_pembelian, $funnel, $funnel_percentage) {
       $data = array(
         "id_fk_kabupaten"=>$id_fk_kabupaten,
         "id_fk_rs"=>$id_fk_rs,
         "prospek_principle"=>$prospek_principle,
         "total_price_prospek"=>$total_price_prospek,
         "notes_kompetitor"=>$notes_kompetitor,
         "notes_prospek"=>$notes_prospek,
         "estimasi_pembelian"=>$estimasi_pembelian,
         "funnel"=>$funnel,
         "funnel_percentage"=>$funnel_percentage,
         "prospek_status"=>"aktif"
       );
       return insertRow("mstr_prospek",$data);
     }

     public function insert_prospek_asm_loss($id_fk_kabupaten, $id_fk_rs, $prospek_principle, $total_price_prospek, $notes_kompetitor, $notes_prospek, $estimasi_pembelian, $funnel, $note_loss) {
       $data = array(
         "id_fk_kabupaten"=>$id_fk_kabupaten,
         "id_fk_rs"=>$id_fk_rs,
         "prospek_principle"=>$prospek_principle,
         "total_price_prospek"=>$total_price_prospek,
         "notes_kompetitor"=>$notes_kompetitor,
         "notes_prospek"=>$notes_prospek,
         "estimasi_pembelian"=>$estimasi_pembelian,
         "funnel"=>$funnel,
         "note_loss"=>$note_loss,
         "prospek_status"=>"aktif"
       );
       return insertRow("mstr_prospek",$data);
     }

     public function insert_prospek_asm_sirup($id_fk_kabupaten, $id_fk_rs, $prospek_principle, $total_price_prospek, $notes_kompetitor, $notes_prospek, $estimasi_pembelian, $funnel, $no_sirup) {
       $data = array(
         "id_fk_kabupaten"=>$id_fk_kabupaten,
         "id_fk_rs"=>$id_fk_rs,
         "prospek_principle"=>$prospek_principle,
         "total_price_prospek"=>$total_price_prospek,
         "notes_kompetitor"=>$notes_kompetitor,
         "notes_prospek"=>$notes_prospek,
         "estimasi_pembelian"=>$estimasi_pembelian,
         "funnel"=>$funnel,
         "no_sirup"=>$no_sirup,
         "prospek_status"=>"aktif"
       );
       return insertRow("mstr_prospek",$data);
     }

     public function insert_prospek_sm($id_fk_provinsi, $id_fk_kabupaten, $id_fk_rs, $prospek_principle, $total_price_prospek, $notes_kompetitor, $notes_prospek, $estimasi_pembelian, $funnel) {
       $data = array(
         "id_fk_provinsi"=>$id_fk_provinsi,
         "id_fk_kabupaten"=>$id_fk_kabupaten,
         "id_fk_rs"=>$id_fk_rs,
         "prospek_principle"=>$prospek_principle,
         "total_price_prospek"=>$total_price_prospek,
         "notes_kompetitor"=>$notes_kompetitor,
         "notes_prospek"=>$notes_prospek,
         "estimasi_pembelian"=>$estimasi_pembelian,
         "funnel"=>$funnel,
         "prospek_status"=>"aktif"
       );
       return insertRow("mstr_prospek",$data);
     }

     public function insert_prospek_sm_prospek($id_fk_provinsi, $id_fk_kabupaten, $id_fk_rs, $prospek_principle, $total_price_prospek, $notes_kompetitor, $notes_prospek, $estimasi_pembelian, $funnel, $funnel_percentage) {
       $data = array(
         "id_fk_provinsi"=>$id_fk_provinsi,
         "id_fk_kabupaten"=>$id_fk_kabupaten,
         "id_fk_rs"=>$id_fk_rs,
         "prospek_principle"=>$prospek_principle,
         "total_price_prospek"=>$total_price_prospek,
         "notes_kompetitor"=>$notes_kompetitor,
         "notes_prospek"=>$notes_prospek,
         "estimasi_pembelian"=>$estimasi_pembelian,
         "funnel"=>$funnel,
         "funnel_percentage"=>$funnel_percentage,
         "prospek_status"=>"aktif"
       );
       return insertRow("mstr_prospek",$data);
     }

     public function insert_prospek_sm_loss($id_fk_provinsi, $id_fk_kabupaten, $id_fk_rs, $prospek_principle, $total_price_prospek, $notes_kompetitor, $notes_prospek, $estimasi_pembelian, $funnel, $note_loss) {
       $data = array(
         "id_fk_provinsi"=>$id_fk_provinsi,
         "id_fk_kabupaten"=>$id_fk_kabupaten,
         "id_fk_rs"=>$id_fk_rs,
         "prospek_principle"=>$prospek_principle,
         "total_price_prospek"=>$total_price_prospek,
         "notes_kompetitor"=>$notes_kompetitor,
         "notes_prospek"=>$notes_prospek,
         "estimasi_pembelian"=>$estimasi_pembelian,
         "funnel"=>$funnel,
         "note_loss"=>$note_loss,
         "prospek_status"=>"aktif"
       );
       return insertRow("mstr_prospek",$data);
     }

     public function insert_prospek_sm_ekatalog($id_fk_provinsi, $id_fk_kabupaten, $id_fk_rs, $prospek_principle, $total_price_prospek, $notes_kompetitor, $notes_prospek, $estimasi_pembelian, $funnel, $no_ekatalog) {
       $data = array(
         "id_fk_provinsi"=>$id_fk_provinsi,
         "id_fk_kabupaten"=>$id_fk_kabupaten,
         "id_fk_rs"=>$id_fk_rs,
         "prospek_principle"=>$prospek_principle,
         "total_price_prospek"=>$total_price_prospek,
         "notes_kompetitor"=>$notes_kompetitor,
         "notes_prospek"=>$notes_prospek,
         "estimasi_pembelian"=>$estimasi_pembelian,
         "funnel"=>$funnel,
         "no_ekatalog"=>$no_ekatalog,
         "prospek_status"=>"aktif"
       );
       return insertRow("mstr_prospek",$data);
     }

     public function insert_produk_prospek($id_fk_prospek, $id_fk_produk, $detail_prospek_quantity, $detail_prospek_keterangan){

       $data = array(
         "id_fk_prospek"=>$id_fk_prospek,
         "id_fk_produk"=>$id_fk_produk,
         "detail_prospek_quantity"=>$detail_prospek_quantity,
         "detail_prospek_keterangan"=>$detail_prospek_keterangan,
         "detail_prospek_status"=>"aktif"
       );
       $this->db->insert("tbl_prospek_produk",$data);
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
