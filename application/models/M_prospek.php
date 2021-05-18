<?php
date_default_timezone_set("Asia/Jakarta");
class M_prospek extends CI_Model{

     public function get_prospek($id_user){
       $sql = "SELECT id_pk_prospek, mstr_provinsi.provinsi_nama as nama_provinsi, mstr_kabupaten.kabupaten_nama as nama_kabupaten, mstr_rs.rs_nama as nama_rs, prospek_principle, total_price_prospek, notes_kompetitor, notes_prospek, no_sirup, no_ekatalog, funnel, funnel_percentage, estimasi_pembelian, note_loss, prospek_status, prospek_id_create
       FROM mstr_prospek
       INNER JOIN mstr_rs on mstr_prospek.id_fk_rs = mstr_rs.id_pk_rs
       INNER JOIN mstr_provinsi on mstr_provinsi.id_pk_provinsi = mstr_prospek.id_fk_provinsi
       INNER JOIN mstr_kabupaten on mstr_kabupaten.id_pk_kabupaten = mstr_prospek.id_fk_kabupaten
       WHERE prospek_id_create= '$id_user' AND prospek_status='aktif'";
       return executeQuery($sql);
     }

     public function get_prospek_detail($id_pk_prospek, $id_user){
       $sql = "SELECT id_pk_prospek, mstr_provinsi.provinsi_nama as nama_provinsi, mstr_kabupaten.kabupaten_nama as nama_kabupaten, mstr_rs.rs_nama as nama_rs, prospek_principle, total_price_prospek, notes_kompetitor, notes_prospek, no_sirup, no_ekatalog, funnel, funnel_percentage, estimasi_pembelian, note_loss, prospek_status, prospek_id_create
       FROM mstr_prospek
       INNER JOIN mstr_rs on mstr_prospek.id_fk_rs = mstr_rs.id_pk_rs
       INNER JOIN mstr_provinsi on mstr_provinsi.id_pk_provinsi = mstr_prospek.id_fk_provinsi
       INNER JOIN mstr_kabupaten on mstr_kabupaten.id_pk_kabupaten = mstr_prospek.id_fk_kabupaten
       WHERE id_pk_prospek = $id_pk_prospek AND prospek_status='aktif'";
       return executeQuery($sql);
     }

     public function get_prospek_all(){
       $sql = "SELECT id_pk_prospek, mstr_provinsi.provinsi_nama as nama_provinsi, mstr_kabupaten.kabupaten_nama as nama_kabupaten, mstr_rs.rs_nama as nama_rs, prospek_principle, total_price_prospek, notes_kompetitor, notes_prospek, no_sirup, no_ekatalog, funnel_percentage, estimasi_pembelian, note_loss, prospek_status, prospek_id_create, mstr_rs.rs_kategori, funnel,
       IF((funnel = 'Prospek' OR funnel = 'Win' OR funnel = 'Loss' OR funnel = 'Hot Prospek' ) AND mstr_rs.rs_kategori = 'Pemerintah', 1,0) as flag_sirup, IF(funnel = 'Win' AND mstr_rs.rs_kategori = 'Pemerintah', 1,0) as flag_ekatalog
       FROM mstr_prospek
       INNER JOIN mstr_rs on mstr_prospek.id_fk_rs = mstr_rs.id_pk_rs
       INNER JOIN mstr_provinsi on mstr_provinsi.id_pk_provinsi = mstr_prospek.id_fk_provinsi
       INNER JOIN mstr_kabupaten on mstr_kabupaten.id_pk_kabupaten = mstr_prospek.id_fk_kabupaten
       WHERE prospek_status='aktif'";
       return executeQuery($sql);
     }

     public function get_prospek_produk($id_fk_prospek){
       $sql = "SELECT id_pk_prospek_produk, tbl_prospek_produk.id_fk_produk, mstr_produk.produk_nama as nama_produk, detail_prospek_quantity, detail_prospek_keterangan, detail_prospek_status, prospek_produk_price, produk_harga_ekat, produk_price_list
       FROM tbl_prospek_produk
       INNER JOIN mstr_produk on tbl_prospek_produk.id_fk_produk = mstr_produk.id_pk_produk
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
       $sql = "SELECT * FROM mstr_produk WHERE produk_status = 'aktif'";
       return executeQuery($sql);
     }

     public function get_data_price($id_pk_produk){
       $sql = "SELECT id_pk_produk, produk_price_list, produk_harga_ekat FROM mstr_produk WHERE id_pk_produk = $id_pk_produk AND produk_status = 'aktif'";
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

     public function insert_prospek_se($id_fk_rs, $prospek_principle, $total_price_prospek, $notes_kompetitor, $notes_prospek, $estimasi_pembelian, $funnel, $id_user) {
       $data = array(
         "id_fk_rs"=>$id_fk_rs,
         "prospek_principle"=>$prospek_principle,
         "total_price_prospek"=>$total_price_prospek,
         "notes_kompetitor"=>$notes_kompetitor,
         "notes_prospek"=>$notes_prospek,
         "estimasi_pembelian"=>$estimasi_pembelian,
         "funnel"=>$funnel,
         "prospek_status"=>"aktif",
         "prospek_id_create" => $id_user,
         "prospek_tgl_create" => date("Y-m-d H:i:s")
       );
       return insertRow("mstr_prospek",$data);
     }

     public function insert_prospek_se_prospek($id_fk_rs, $prospek_principle, $total_price_prospek, $notes_kompetitor, $notes_prospek, $estimasi_pembelian, $funnel, $id_user, $funnel_percentage) {
       $data = array(
         "id_fk_rs"=>$id_fk_rs,
         "prospek_principle"=>$prospek_principle,
         "total_price_prospek"=>$total_price_prospek,
         "notes_kompetitor"=>$notes_kompetitor,
         "notes_prospek"=>$notes_prospek,
         "estimasi_pembelian"=>$estimasi_pembelian,
         "funnel"=>$funnel,
         "funnel_percentage"=>$funnel_percentage,
         "prospek_status"=>"aktif",
         "prospek_id_create" => $id_user,
         "prospek_tgl_create" => date("Y-m-d H:i:s")
       );
       return insertRow("mstr_prospek",$data);
     }

     public function insert_prospek_se_loss($id_fk_rs, $prospek_principle, $total_price_prospek, $notes_kompetitor, $notes_prospek, $estimasi_pembelian, $funnel, $id_user, $note_loss) {
       $data = array(
         "id_fk_rs"=>$id_fk_rs,
         "prospek_principle"=>$prospek_principle,
         "total_price_prospek"=>$total_price_prospek,
         "notes_kompetitor"=>$notes_kompetitor,
         "notes_prospek"=>$notes_prospek,
         "estimasi_pembelian"=>$estimasi_pembelian,
         "funnel"=>$funnel,
         "note_loss"=>$note_loss,
         "prospek_status"=>"aktif",
         "prospek_id_create" => $id_user,
         "prospek_tgl_create" => date("Y-m-d H:i:s")
       );
       return insertRow("mstr_prospek",$data);
     }

     public function insert_prospek_asm($id_fk_kabupaten, $id_fk_rs, $prospek_principle, $total_price_prospek, $notes_kompetitor, $notes_prospek, $estimasi_pembelian, $funnel, $id_user) {
       $data = array(
         "id_fk_kabupaten"=>$id_fk_kabupaten,
         "id_fk_rs"=>$id_fk_rs,
         "prospek_principle"=>$prospek_principle,
         "total_price_prospek"=>$total_price_prospek,
         "notes_kompetitor"=>$notes_kompetitor,
         "notes_prospek"=>$notes_prospek,
         "estimasi_pembelian"=>$estimasi_pembelian,
         "funnel"=>$funnel,
         "prospek_status"=>"aktif",
         "prospek_id_create" => $id_user,
         "prospek_tgl_create" => date("Y-m-d H:i:s")
       );
       return insertRow("mstr_prospek",$data);
     }

     public function insert_prospek_asm_prospek($id_fk_kabupaten, $id_fk_rs, $prospek_principle, $total_price_prospek, $notes_kompetitor, $notes_prospek, $estimasi_pembelian, $funnel, $id_user, $funnel_percentage) {
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
         "prospek_status"=>"aktif",
         "prospek_id_create" => $id_user,
         "prospek_tgl_create" => date("Y-m-d H:i:s")
       );
       return insertRow("mstr_prospek",$data);
     }

     public function insert_prospek_asm_loss($id_fk_kabupaten, $id_fk_rs, $prospek_principle, $total_price_prospek, $notes_kompetitor, $notes_prospek, $estimasi_pembelian, $funnel, $id_user, $note_loss) {
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
         "prospek_status"=>"aktif",
         "prospek_id_create" => $id_user,
         "prospek_tgl_create" => date("Y-m-d H:i:s")
       );
       return insertRow("mstr_prospek",$data);
     }

     public function insert_prospek_asm_sirup($id_fk_kabupaten, $id_fk_rs, $prospek_principle, $total_price_prospek, $notes_kompetitor, $notes_prospek, $estimasi_pembelian, $funnel, $id_user, $no_sirup) {
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
         "prospek_status"=>"aktif",
         "prospek_id_create" => $id_user,
         "prospek_tgl_create" => date("Y-m-d H:i:s")
       );
       return insertRow("mstr_prospek",$data);
     }

     public function insert_prospek_sm($id_fk_provinsi, $id_fk_kabupaten, $id_fk_rs, $prospek_principle, $total_price_prospek, $notes_kompetitor, $notes_prospek, $estimasi_pembelian, $funnel, $id_user) {
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
         "prospek_status"=>"aktif",
         "prospek_id_create" => $id_user,
         "prospek_tgl_create" => date("Y-m-d H:i:s")
       );
       return insertRow("mstr_prospek",$data);
     }

     public function insert_prospek_sm_prospek($id_fk_provinsi, $id_fk_kabupaten, $id_fk_rs, $prospek_principle, $total_price_prospek, $notes_kompetitor, $notes_prospek, $estimasi_pembelian, $funnel, $id_user, $funnel_percentage) {
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
         "prospek_status"=>"aktif",
         "prospek_id_create" => $id_user,
         "prospek_tgl_create" => date("Y-m-d H:i:s")
       );
       return insertRow("mstr_prospek",$data);
     }

     public function insert_prospek_sm_loss($id_fk_provinsi, $id_fk_kabupaten, $id_fk_rs, $prospek_principle, $total_price_prospek, $notes_kompetitor, $notes_prospek, $estimasi_pembelian, $funnel, $id_user, $note_loss) {
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
         "prospek_status"=>"aktif",
         "prospek_id_create" => $id_user,
         "prospek_tgl_create" => date("Y-m-d H:i:s")
       );
       return insertRow("mstr_prospek",$data);
     }

     public function insert_prospek_sm_ekatalog($id_fk_provinsi, $id_fk_kabupaten, $id_fk_rs, $prospek_principle, $total_price_prospek, $notes_kompetitor, $notes_prospek, $estimasi_pembelian, $funnel, $id_user, $no_ekatalog) {
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
         "prospek_status"=>"aktif",
         "prospek_id_create" => $id_user,
         "prospek_tgl_create" => date("Y-m-d H:i:s")
       );
       return insertRow("mstr_prospek",$data);
     }

     public function insert_produk_prospek($id_fk_prospek, $id_fk_produk, $prospek_produk_price, $detail_prospek_quantity, $detail_prospek_keterangan){

       $data = array(
         "id_fk_prospek"=>$id_fk_prospek,
         "id_fk_produk"=>$id_fk_produk,
         "prospek_produk_price" => $prospek_produk_price,
         "detail_prospek_quantity"=>$detail_prospek_quantity,
         "detail_prospek_keterangan"=>$detail_prospek_keterangan,
         "detail_prospek_status"=>"aktif",
         "prospek_produk_id_create" => $this->session->id_user,
         "prospek_produk_tgl_create" => date("Y-m-d H:i:s")
       );
       $this->db->insert("tbl_prospek_produk",$data);
     }

     public function insert_total_price($id_pk_prospek, $total){
       $where =array(
         "id_pk_prospek"=> $id_pk_prospek
       );

       $data = array(
         "total_price_prospek" => $total
       );
       return updateRow("mstr_prospek", $data, $where);
     }

     //Edit

     public function edit_prospek_se($id_pk_prospek, $id_fk_rs, $prospek_principle, $total_price_prospek, $notes_kompetitor, $notes_prospek, $estimasi_pembelian, $funnel, $id_user) {
       $where = array(
         "id_pk_prospek" => $id_pk_prospek,
         "prospek_id_create" => $this->session->id_user
       );

       $data = array(
         "id_fk_rs"=>$id_fk_rs,
         "prospek_principle"=>$prospek_principle,
         "total_price_prospek"=>$total_price_prospek,
         "notes_kompetitor"=>$notes_kompetitor,
         "notes_prospek"=>$notes_prospek,
         "estimasi_pembelian"=>$estimasi_pembelian,
         "funnel"=>$funnel,
         "prospek_status"=>"aktif",
         "prospek_id_update" => $id_user,
         "prospek_tgl_update" => date("Y-m-d H:i:s")
       );
       return updateRow("mstr_prospek",$data, $where);
     }

     public function edit_prospek_se_prospek($id_pk_prospek, $id_fk_rs, $prospek_principle, $total_price_prospek, $notes_kompetitor, $notes_prospek, $estimasi_pembelian, $funnel, $id_user, $funnel_percentage) {
       $where = array(
         "id_pk_prospek" => $id_pk_prospek,
         "prospek_id_create" => $this->session->id_user
       );

       $data = array(
         "id_fk_rs"=>$id_fk_rs,
         "prospek_principle"=>$prospek_principle,
         "total_price_prospek"=>$total_price_prospek,
         "notes_kompetitor"=>$notes_kompetitor,
         "notes_prospek"=>$notes_prospek,
         "estimasi_pembelian"=>$estimasi_pembelian,
         "funnel"=>$funnel,
         "funnel_percentage"=>$funnel_percentage,
         "prospek_status"=>"aktif",
         "prospek_id_update" => $id_user,
         "prospek_tgl_update" => date("Y-m-d H:i:s")
       );
       return updateRow("mstr_prospek",$data, $where);
     }

     public function edit_prospek_se_loss($id_pk_prospek, $id_fk_rs, $prospek_principle, $total_price_prospek, $notes_kompetitor, $notes_prospek, $estimasi_pembelian, $funnel, $id_user, $note_loss) {
       $where = array(
         "id_pk_prospek" => $id_pk_prospek,
         "prospek_id_create" => $this->session->id_user
       );
       $data = array(
         "id_fk_rs"=>$id_fk_rs,
         "prospek_principle"=>$prospek_principle,
         "total_price_prospek"=>$total_price_prospek,
         "notes_kompetitor"=>$notes_kompetitor,
         "notes_prospek"=>$notes_prospek,
         "estimasi_pembelian"=>$estimasi_pembelian,
         "funnel"=>$funnel,
         "note_loss"=>$note_loss,
         "prospek_status"=>"aktif",
         "prospek_id_update" => $id_user,
         "prospek_tgl_update" => date("Y-m-d H:i:s")
       );
       return updateRow("mstr_prospek",$data, $where);
     }

     public function edit_prospek_asm($id_pk_prospek, $id_fk_kabupaten, $id_fk_rs, $prospek_principle, $total_price_prospek, $notes_kompetitor, $notes_prospek, $estimasi_pembelian, $funnel, $id_user) {
       $where = array(
         "id_pk_prospek" => $id_pk_prospek
       );
       $data = array(
         "id_fk_kabupaten"=>$id_fk_kabupaten,
         "id_fk_rs"=>$id_fk_rs,
         "prospek_principle"=>$prospek_principle,
         "total_price_prospek"=>$total_price_prospek,
         "notes_kompetitor"=>$notes_kompetitor,
         "notes_prospek"=>$notes_prospek,
         "estimasi_pembelian"=>$estimasi_pembelian,
         "funnel"=>$funnel,
         "prospek_status"=>"aktif",
         "prospek_id_update" => $id_user,
         "prospek_tgl_update" => date("Y-m-d H:i:s")
       );
       return updateRow("mstr_prospek",$data, $where);
     }

     public function edit_prospek_asm_prospek($id_pk_prospek, $id_fk_kabupaten, $id_fk_rs, $prospek_principle, $total_price_prospek, $notes_kompetitor, $notes_prospek, $estimasi_pembelian, $funnel, $id_user, $funnel_percentage) {
       $where = array(
         "id_pk_prospek" => $id_pk_prospek
       );
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
         "prospek_status"=>"aktif",
         "prospek_id_update" => $id_user,
         "prospek_tgl_update" => date("Y-m-d H:i:s")
       );
       return updateRow("mstr_prospek",$data, $where);
     }

     public function edit_prospek_asm_loss($id_pk_prospek, $id_fk_kabupaten, $id_fk_rs, $prospek_principle, $total_price_prospek, $notes_kompetitor, $notes_prospek, $estimasi_pembelian, $funnel, $id_user, $note_loss) {
       $where = array(
         "id_pk_prospek" => $id_pk_prospek
       );
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
         "prospek_status"=>"aktif",
         "prospek_id_update" => $id_user,
         "prospek_tgl_update" => date("Y-m-d H:i:s")
       );
       return updateRow("mstr_prospek",$data, $where);
     }

     public function edit_prospek_asm_sirup($id_pk_prospek, $id_fk_kabupaten, $id_fk_rs, $prospek_principle, $total_price_prospek, $notes_kompetitor, $notes_prospek, $estimasi_pembelian, $funnel, $id_user, $no_sirup) {
       $where = array(
         "id_pk_prospek" => $id_pk_prospek
       );

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
         "prospek_status"=>"aktif",
         "prospek_id_update" => $id_user,
         "prospek_tgl_update" => date("Y-m-d H:i:s")
       );
       return updateRow("mstr_prospek",$data, $where);
     }

     public function edit_prospek_sm($id_pk_prospek, $id_fk_provinsi, $id_fk_kabupaten, $id_fk_rs, $prospek_principle, $total_price_prospek, $notes_kompetitor, $notes_prospek, $estimasi_pembelian, $funnel, $id_user) {
       $where = array(
         "id_pk_prospek" => $id_pk_prospek
       );
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
         "prospek_status"=>"aktif",
         "prospek_id_update" => $id_user,
         "prospek_tgl_update" => date("Y-m-d H:i:s")
       );
       return updateRow("mstr_prospek",$data, $where);
     }

     public function edit_prospek_sm_prospek($id_pk_prospek, $id_fk_provinsi, $id_fk_kabupaten, $id_fk_rs, $prospek_principle, $total_price_prospek, $notes_kompetitor, $notes_prospek, $estimasi_pembelian, $funnel, $id_user, $funnel_percentage) {
       $where = array(
         "id_pk_prospek" => $id_pk_prospek
       );
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
         "prospek_status"=>"aktif",
         "prospek_id_update" => $id_user,
         "prospek_tgl_update" => date("Y-m-d H:i:s")
       );
       return updateRow("mstr_prospek",$data, $where);
     }

     public function edit_prospek_sm_loss($id_pk_prospek, $id_fk_provinsi, $id_fk_kabupaten, $id_fk_rs, $prospek_principle, $total_price_prospek, $notes_kompetitor, $notes_prospek, $estimasi_pembelian, $funnel, $id_user, $note_loss) {
       $where = array(
         "id_pk_prospek" => $id_pk_prospek
       );
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
         "prospek_status"=>"aktif",
         "prospek_id_update" => $id_user,
         "prospek_tgl_update" => date("Y-m-d H:i:s")
       );
       return updateRow("mstr_prospek",$data, $where);
     }

     public function edit_prospek_sm_ekatalog($id_pk_prospek, $id_fk_provinsi, $id_fk_kabupaten, $id_fk_rs, $prospek_principle, $total_price_prospek, $notes_kompetitor, $notes_prospek, $estimasi_pembelian, $funnel, $id_user, $no_ekatalog) {
       $where = array(
         "id_pk_prospek" => $id_pk_prospek
       );
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
         "prospek_status"=>"aktif",
         "prospek_id_update" => $id_user,
         "prospek_tgl_update" => date("Y-m-d H:i:s")
       );
       return updateRow("mstr_prospek",$data, $where);
     }

     public function edit_produk_prospek($id_pk_prospek_produk, $id_fk_produk, $prospek_produk_price, $detail_prospek_quantity, $detail_prospek_keterangan){
       $where = array(
         "id_pk_prospek_produk" => $id_pk_prospek_produk
       );
       $data = array(
         "id_fk_produk"=>$id_fk_produk,
         "detail_prospek_quantity"=>$detail_prospek_quantity,
         "prospek_produk_price" => $prospek_produk_price,
         "detail_prospek_keterangan"=>$detail_prospek_keterangan,
         "detail_prospek_status"=>"aktif",
         "prospek_produk_id_update" => $this->session->id_user,
         "prospek_produk_tgl_update" => date("Y-m-d H:i:s")
       );
       return updateRow("tbl_prospek_produk",$data, $where);
     }

    public function edit_get_prospek($id_pk_prospek){
      $sql = "SELECT id_pk_prospek, mstr_prospek.id_fk_provinsi, mstr_provinsi.provinsi_nama as nama_provinsi, mstr_prospek.id_fk_kabupaten, mstr_kabupaten.kabupaten_nama as nama_kabupaten, mstr_prospek.id_fk_rs, mstr_rs.rs_nama as nama_rs, prospek_principle, total_price_prospek, notes_kompetitor, notes_prospek, funnel, funnel_percentage, no_sirup, no_ekatalog, note_loss, estimasi_pembelian, prospek_status
      FROM mstr_prospek
      INNER JOIN mstr_rs on mstr_prospek.id_fk_rs = mstr_rs.id_pk_rs
      INNER JOIN mstr_provinsi on mstr_provinsi.id_pk_provinsi = mstr_prospek.id_fk_provinsi
      INNER JOIN mstr_kabupaten on mstr_kabupaten.id_pk_kabupaten = mstr_prospek.id_fk_kabupaten
      WHERE prospek_status='aktif' AND mstr_prospek.id_pk_prospek = $id_pk_prospek AND prospek_id_create = ".$this->session->id_user;
      return executeQuery($sql);
    }

    public function delete($id_pk_prospek){
      $where = array(
        "id_pk_prospek" => $id_pk_prospek,
        "prospek_id_create" => $this->session->id_user
      );
      $data = array(
        "prospek_status" => "deleted",
        "prospek_id_delete" => $this->session->id_user,
        "prospek_tgl_delete" => date("Y-m-d H:i:s")
      );
      updateRow("mstr_prospek",$data,$where);
    }

    public function delete_prospek_produk($id){
      $where = array(
        "id_pk_prospek_produk" => $id
      );
      $data = array(
        "detail_prospek_status"=>"deleted",
        "prospek_produk_id_delete" => $this->session->id_user,
        "prospek_produk_tgl_delete" => date("Y-m-d H:i:s")
      );
      return updateRow("tbl_prospek_produk",$data, $where);
    }

    public function get_sirup() {
      $sql = "SELECT * FROM mstr_sirup;";
      return executeQuery($sql);
    }
    public function get_ekat() {
      $sql = "SELECT * FROM mstr_ekatalog;";
      return executeQuery($sql);
    }

}
