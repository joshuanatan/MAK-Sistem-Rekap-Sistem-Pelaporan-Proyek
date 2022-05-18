<?php
date_default_timezone_set("Asia/Jakarta");
error_reporting(0);
class Sch_ekatalog extends CI_Controller
{
  private $login_cookies;
  private $jwt;
  public function index()
  {
    if ($this->input->get("login")) {
      if (md5($this->input->get("login")) == "523c2c2940a37fb651b7a19b68149e0b") {
        echo "Welcome to sch_ekatalog, below is our available links!:<br/>";
        echo "<a href = '" . base_url() . "sch_ekatalog/get_data'>function get_data()</a><br/>";
        echo "<a href = '" . base_url() . "sch_ekatalog/get_ekatalog_detail'>function get_ekatalog_detail()</a><br/>";
        echo "<a href = '" . base_url() . "sch_ekatalog/extract_ekatalog_detail'>function extract_ekatalog_detail()</a><br/>";
      } else {
        echo "babai.";
        exit();
      }
    } else {
      echo "babai.";
      exit();
    }
  }
  public function __construct()
  {
    parent::__construct();
  }
  public function login()
  {
    $url = "https://e-katalog.lkpp.go.id/user/login";

    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
    ));
    $response = curl_exec($curl); #string

    $pattern = "/[a-f0-9]{40}/i";
    $authentication_code = preg_match($pattern, $response, $matches);
    $authentication_code = $matches[0];

    $username = "makhe2012";
    $password = "M@kpolaris2021";
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://e-katalog.lkpp.go.id/admin.userctr/loginpenyediasubmit",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_HEADER => TRUE,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "username=" . $username . "&password=" . $password . "&authenticityToken=" . $authentication_code,
    ));
    $response = curl_exec($curl);
    // echo $response;
    $key = 'set-cookie:';
    if (strpos($response, $key) !== false) {
      echo 'true';
    }
    #print_r(explode("Set-Cookie:", $response));
    $response = explode("set-cookie: ", $response, 2);
    print_r($response[1]); //careful ini sangat bergantung pada responsenya
    $response[1] = str_replace("set-cookie: ", ";", $response[1]);
    $response[1] = str_replace(array("\n", "\r"), "", $response[1]);
    echo "<br/><br/>";
    // echo $response;
    // print_r($response);
    // $this->login_cookies = explode(";", $response[2])[0];
    $this->login_cookies = $response[1];
  }
  public function get_jwt()
  {
    $this->login();
    echo "login cookies: " . $this->login_cookies;
    $url = "https://e-katalog.lkpp.go.id/home";

    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "Cookie: " . $this->login_cookies
      )
    ));
    $response = curl_exec($curl); #string
    // echo $response;
    preg_match('/(ey[a-zA-Z0-9_-]{1,99}\.){2}[a-zA-Z0-9_-]{1,99}/', $response, $matches);
    $jwt = $matches[0];
    $this->jwt = $jwt;
  }
  public function get_data()
  {
    if ($this->login_cookies == "" || $this->jwt == "") {
      $this->get_jwt();
    }
    $url = "https://e-katalog.lkpp.go.id/api/purchasing/api/v2/epurchasing?timer=Th042022022752&page=0&perPage=1000&limit=1000&total=0&tanggalDibuat=&activityId=&kompetisiId=";
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "Cookie: " . $this->login_cookies,
        "Jwt-Token: " . $this->jwt,
      )
    ));
    $response = (curl_exec($curl)); #string
    $response = json_decode($response, true);
    $response = $response["data"]["list"];
    for ($a = 0; $a < count($response); $a++) {
      $where = array(
        "ekatalog_id_paket" => $response[$a]["no_paket"]
      );
      deleteRow("mstr_ekatalog", $where);
      $data = array(
        "ekatalog_komoditas" => $response[$a]["nama_paket"],
        "ekatalog_id" => $response[$a]["id"],
        "ekatalog_id_paket" => $response[$a]["no_paket"],
        "ekatalog_nama_paket" => $response[$a]["nama_paket"],
        "ekatalog_instansi" => $response[$a]["kldi"]["nama"],
        "ekatalog_satuan_kerja" => $response[$a]["satker"]["nama"],
        "ekatalog_npwp_satuan_kerja" => $response[$a]["satuan_kerja_npwp"],
        "ekatalog_alamat_satuan_kerja" => $response[$a]["satuan_kerja_alamat"],
        "ekatalog_alamat_pengiriman" => $response[$a]["pengiriman_alamat"],
        "ekatalog_tahun_anggaran" => $response[$a]["tahun_anggaran"],
        "ekatalog_total_produk" => $response[$a]["total_product"],
        "ekatalog_status_paket" => $response[$a]["latest_status"]["status_paket"],
        "ekatalog_status" => "aktif",
        "ekatalog_tgl_create" => date("Y-m-d H:i:s"),
        "ekatalog_id_create" => 0,
        "ekatalog_id_sirup" => $response[$a]["rup_id"],
        "ekatalog_id_sirup_online" => $response[$a]["rup_id"],
        "ekatalog_komoditas_online" => $response[$a]["nama_paket"],
        "ekatalog_id_paket_online" => $response[$a]["no_paket"],
        "ekatalog_nama_paket_online" => $response[$a]["nama_paket"],
        "ekatalog_instansi_online" => $response[$a]["kldi"]["nama"],
        "ekatalog_satuan_kerja_online" => $response[$a]["satker"]["nama"],
        "ekatalog_npwp_satuan_kerja_online" => $response[$a]["satuan_kerja_npwp"],
        "ekatalog_alamat_satuan_kerja_online" => $response[$a]["satuan_kerja_alamat"],
        "ekatalog_alamat_pengiriman_online" => $response[$a]["pengiriman_alamat"],
        "ekatalog_tahun_anggaran_online" => $response[$a]["tahun_anggaran"],
        "ekatalog_total_produk_online" => $response[$a]["total_product"],
        "ekatalog_status_paket_online" => $response[$a]["latest_status"]["status_paket"],
        "ekatalog_tgl_buat_online" => $response[$a]["created_date"],
        "ekatalog_tgl_ubah_online" => $response[$a]["modified_date"],
      );
      $id_pk_ekatalog = insertRow("mstr_ekatalog", $data);

      $url = "https://e-katalog.lkpp.go.id/api/purchasing/api/v2/crud/paket/" . $response[$a]["id"];
      $curl = curl_init();
      curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
          "Cookie: " . $this->login_cookies,
          "Jwt-Token: " . $this->jwt,
        )
      ));
      $response2 = (curl_exec($curl)); #string
      $response2 = json_decode($response2, true);
      $kurs = $response2["data"]["paket"]["kurs"]["nama_kurs"];
      $buyer = $response2["data"]["paket"]["buyer"];
      $user_pp = $response2["data"]["paket"]["user_pp"];
      $response2 = $response2["data"]["paket"]["products"];
      $total = 0;
      for ($b = 0; $b < count($response2); $b++) {

        $data = array(
          "ekatalog_produk_nama_produk" => $response2[$b]["nama_produk"],
          "ekatalog_produk_nama_produk_online" => $response2[$b]["nama_produk"],
          "ekatalog_produk_kuantitas_online" => $response2[$b]["kuantitas"],
          "ekatalog_produk_kuantitas" => $response2[$b]["kuantitas"],
          "ekatalog_produk_mata_uang_online" => $kurs,
          "ekatalog_produk_mata_uang" => $kurs,
          "ekatalog_produk_harga_satuan_online" => $response2[$b]["harga_satuan"],
          "ekatalog_produk_harga_satuan" => $response2[$b]["harga_satuan"],
          "ekatalog_produk_perkiraan_ongkos_kirim_online" => $response2[$b]["harga_ongkir"],
          "ekatalog_produk_perkiraan_ongkos_kirim" => $response2[$b]["harga_ongkir"],
          "ekatalog_produk_total_harga_online" => $response2[$b]["harga_total"],
          "ekatalog_produk_total_harga" => $response2[$b]["harga_total"],
          "ekatalog_produk_catatan" => $response2[$b]["catatan"],
          "ekatalog_produk_catatan_online" => $response2[$b]["catatan"],
          "ekatalog_produk_status" => "aktif",
          "ekatalog_produk_tgl_create" => $response2[$b]["created_date"],
          "ekatalog_produk_id_create" => $response2[$b]["modified_date"],
          "id_fk_ekatalog" => $id_pk_ekatalog,
        );
        insertRow("tbl_ekatalog_produk", $data);
        $total += (int) $response2[$b]["konversi_harga_total"];
      }
      echo $total."<br/><br/>";
      $data = array(
        "ekatalog_total_harga" => $total,
        "ekatalog_nama_pp" => $user_pp["nama_lengkap"],
        "ekatalog_position_pp" => $user_pp["jabatan"],
        "ekatalog_nip_pp" => $user_pp["nip"],
        "ekatalog_email_pp" => $user_pp["user_email"],
        "ekatalog_phone_number_pp" => $user_pp["no_telp"],
        "ekatalog_nama_buyer" => $buyer["nama_lengkap"],
        "ekatalog_position_buyer" => $buyer["jabatan"],
        "ekatalog_nip_buyer" => $buyer["nip"],
        "ekatalog_email_buyer" => $buyer["user_email"],
        "ekatalog_phone_number_buyer" => $buyer["no_telp"],
      );
      $where = array(
        "id_pk_ekatalog" => $id_pk_ekatalog
      );
      updateRow("mstr_ekatalog", $data, $where);
      
      $sql = "
      delete from tbl_ekatalog_produk where id_fk_ekatalog not in (select id_pk_ekatalog from mstr_ekatalog)";
      executeQuery($sql);
    }
  }
}
