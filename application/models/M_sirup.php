<?php
/*
    drop table if exists mstr_sirup;
    create table mstr_sirup(
        id_pk_sirup int primary key auto_increment,
        sirup_rup varchar(100),
        sirup_paket text,
        sirup_klpd varchar(100),
        sirup_satuan_kerja varchar(100),
        sirup_tahun_anggaran int,
        sirup_volume_pekerjaan varchar(300),
        sirup_uraian_pekerjaan varchar(300),
        sirup_spesifikasi_pekerjaan varchar(300),
        sirup_produk_dalam_negri varchar(15),
        sirup_usaha_kecil varchar(15),
        sirup_pra_dipa varchar(15),
        sirup_jenis_pengadaan varchar(300),
        sirup_total int,
        sirup_metode_pemilihan varchar(100),
        sirup_histori_paket varchar(100),
        sirup_tgl_perbarui_paket varchar(100),
        sirup_status varchar(30),
        sirup_tgl_create datetime,
        sirup_tgl_update datetime,
        sirup_tgl_delete datetime,
        sirup_id_create int,
        sirup_id_update int,
        sirup_id_delete int,
        id_fk_pencarian_sirup int
    );
*/
class M_sirup extends CI_Model{
    private $id_pk_sirup;
    private $sirup_rup;
    private $sirup_paket;
    private $sirup_klpd;
    private $sirup_satuan_kerja;
    private $sirup_tahun_anggaran;
    private $sirup_volume_pekerjaan;
    private $sirup_uraian_pekerjaan;
    private $sirup_spesifikasi_pekerjaan;
    private $sirup_produk_dalam_negri;
    private $sirup_usaha_kecil;
    private $sirup_pra_dipa;
    private $sirup_jenis_pengadaan;
    private $sirup_total;
    private $sirup_metode_pemilihan;
    private $sirup_histori_paket;
    private $sirup_tgl_perbarui_paket;
    private $sirup_status;
    private $sirup_tgl_create;
    private $sirup_tgl_update;
    private $sirup_tgl_delete;
    private $sirup_id_create;
    private $sirup_id_update;
    private $sirup_id_delete;
    private $id_fk_pencarian_sirup;
    
    public function insert($sirup_rup,$sirup_paket,$sirup_klpd,$sirup_satuan_kerja,$sirup_tahun_anggaran,$sirup_volume_pekerjaan,$sirup_uraian_pekerjaan,$sirup_spesifikasi_pekerjaan,$sirup_produk_dalam_negri,$sirup_usaha_kecil,$sirup_pra_dipa,$sirup_jenis_pengadaan,$sirup_total,$sirup_metode_pemilihan,$sirup_histori_paket,$sirup_tgl_perbarui_paket,$sirup_id_create,$id_fk_pencarian_sirup){
        $data = array(
            "sirup_rup" => $sirup_rup,
            "sirup_paket" => $sirup_paket,
            "sirup_klpd" => $sirup_klpd,
            "sirup_satuan_kerja" => $sirup_satuan_kerja,
            "sirup_tahun_anggaran" => $sirup_tahun_anggaran,
            "sirup_volume_pekerjaan" => $sirup_volume_pekerjaan,
            "sirup_uraian_pekerjaan" => $sirup_uraian_pekerjaan,
            "sirup_spesifikasi_pekerjaan" => $sirup_spesifikasi_pekerjaan,
            "sirup_produk_dalam_negri" => $sirup_produk_dalam_negri,
            "sirup_usaha_kecil" => $sirup_usaha_kecil,
            "sirup_pra_dipa" => $sirup_pra_dipa,
            "sirup_jenis_pengadaan" => $sirup_jenis_pengadaan,
            "sirup_total" => $sirup_total,
            "sirup_metode_pemilihan" => $sirup_metode_pemilihan,
            "sirup_histori_paket" => $sirup_histori_paket,
            "sirup_tgl_perbarui_paket" => $sirup_tgl_perbarui_paket,
            "sirup_status" => "aktif",
            "sirup_tgl_create" => date("Y-m-d H:i:s"),
            "sirup_id_create" => $sirup_id_create,
            "id_fk_pencarian_sirup" => $id_fk_pencarian_sirup
        );
        return insertRow("mstr_sirup",$data);
    }
    public function insert_lokasi_pekerjaan($data,$id_fk_sirup){
        $data = array(
            "lokasi_pekerjaan" => $data,
            "id_fk_sirup" => $id_fk_sirup
        );
        insertRow("tbl_sirup_lokasi_pekerjaan",$data);
    }
    public function insert_sumber_dana($data,$id_fk_sirup){
        $data = array(
            "sumber_dana" => $data,
            "id_fk_sirup" => $id_fk_sirup
        );
        insertRow("tbl_sirup_sumber_dana",$data);
    }
    public function insert_pemanfaatan_barang($data,$id_fk_sirup){
        $data = array(
            "pemanfaatan_barang" => $data,
            "id_fk_sirup" => $id_fk_sirup
        );
        insertRow("tbl_sirup_pemanfaatan_barang",$data);
    }
    public function insert_jadwal_pelaksanaan($data,$id_fk_sirup){
        $data = array(
            "jadwal_pelaksanaan" => $data,
            "id_fk_sirup" => $id_fk_sirup
        );
        insertRow("tbl_sirup_jadwal_pelaksanaan",$data);
    }
    public function insert_pemilihan_penyedia($data,$id_fk_sirup){
        $data = array(
            "pemilihan_penyedia" => $data,
            "id_fk_sirup" => $id_fk_sirup
        );
        insertRow("tbl_sirup_pemilihan_penyedia",$data);
    }
}