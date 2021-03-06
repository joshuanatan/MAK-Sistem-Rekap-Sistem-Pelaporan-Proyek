<?php
date_default_timezone_set("Asia/Jakarta");
error_reporting(0);
class Sch_ekatalog extends CI_Controller
{
  private $login_cookies;
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
    $password = "m@kit2008";
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
    echo $response;
    $key = 'Set-Cookie:';
    if (strpos($response, $key) !== false) {
      echo 'true';
    }
    #print_r(explode("Set-Cookie:", $response));
    $response = explode("Set-Cookie:", $response); 
    #echo $response;
    $this->login_cookies = explode(";", $response[2])[0];
  }
  public function get_data()
  {
    if ($this->login_cookies == "") {
      $this->login();
    }
    $count = 0;
    while (true) {
      $count++;
      $page = 20;
      $url = "https://e-katalog.lkpp.go.id/purchasing/paket?keyword=&commodity=0&position=&negotiation=&year=2021&status=&sortby=desc&per_page=$page&offset=$count";
      #$url = "http://localhost/mak/data/test_ekatalog.html";

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
      $response = (curl_exec($curl)); #string
      $response = str_replace('<table aria-describedby="mydesc" class="table table-striped" id="tblListPaket">', '<table>', $response);
      #echo $response;
      $split = explode('<table>', $response);
      $split = explode('</table>', $split[1])[0];
      $split = explode('<tbody>', $split);
      $split = explode('</tbody>', $split[1])[0];

      $split = explode("<tr>", $split);
      echo "Queried data: " . count($split) . " url: " . $url;
      for ($a = 1; $a < count($split); $a++) {
        $regex_link = "/(\/[a-z]+)+(\/[0-9]+)/";
        preg_match($regex_link, $split[$a], $matches);
        $link = $matches[0];

        $regex_link_id = "/([0-9]){7}/"; #contoh id 3809900
        preg_match($regex_link_id, $link, $matches);
        $id = $matches[0];

        $where = array(
          "ekatalog_id" => $id,
          "ekatalog_id_status_query" => 0
        );
        if (!isExistsInTable("temp_ekatalog_id", $where)) {
          $data = array(
            "ekatalog_id_link" => $link,
            "ekatalog_id" => $id,
            "ekatalog_id_status_query" => 0,
          );
          insertRow("temp_ekatalog_id", $data);
        }
      }
      $data = array(
        "log_auto_ekatalog" => "Mengambil daftar E-Katalog",
        "log_auto_ekatalog_desc" => "Mengambil $page data terakhir dari e-katalog",
        "log_auto_ekatalog_date" => date("Y-m-d H:i:s"),
      );
      insertRow("log_auto_ekatalog", $data);
      if (count($split) < $page) {
        break;
      }
    }
  }
  public function get_ekatalog_detail()
  {
    if ($this->login_cookies == "") {
      $this->login();
    }
    $sql = "select id_pk_ekatalog_id, ekatalog_id_link, ekatalog_id, ekatalog_id_status_query, ekatalog_id_query_date from temp_ekatalog_id where ekatalog_id_status_query = 0 limit 50";
    $result = executeQuery($sql);
    if ($result->num_rows() > 0) {
      $result = $result->result_array();
      for ($ekatalog_id_row = 0; $ekatalog_id_row < count($result); $ekatalog_id_row++) {
        $where = array(
          "id_pk_ekatalog_id" => $result[$ekatalog_id_row]["id_pk_ekatalog_id"]
        );
        $data = array(
          "ekatalog_id_status_query" => 1,
          "ekatalog_id_query_date" => date("Y-m-d H:i:s")
        );
        updateRow("temp_ekatalog_id", $data, $where);


        $url = "https://e-katalog.lkpp.go.id/id/purchasing/paket/detail/" . $result[$ekatalog_id_row]["ekatalog_id"];
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
        $response = (curl_exec($curl)); #string
        echo $response . "<br/>";
        $data = array(
          "log_auto_ekatalog" => "Mengambil detail E-Katalog",
          "log_auto_ekatalog_desc" => "Mengambil data detail dari e-katalog dengan id paket = " . $result[$ekatalog_id_row]["ekatalog_id"],
          "log_auto_ekatalog_date" => date("Y-m-d H:i:s"),
        );
        insertRow("log_auto_ekatalog", $data);

        $url = "https://e-katalog.lkpp.go.id/id/purchasing/paket/" . $result[$ekatalog_id_row]["ekatalog_id"] . "/daftar-produk";
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
        $response_produk = (curl_exec($curl)); #string
        echo $response_produk . "<br/>";
        $data = array(
          "id_fk_ekatalog_id" => $result[$ekatalog_id_row]["id_pk_ekatalog_id"],
          "ekatalog_detail" => $response,
          "ekatalog_detail_item" => $response_produk
        );
        insertRow("temp_ekatalog_detail", $data);


        $data = array(
          "log_auto_ekatalog" => "Mengambil detail E-Katalog",
          "log_auto_ekatalog_desc" => "Mengambil data daftar produk dari e-katalog dengan id paket = " . $result[$ekatalog_id_row]["ekatalog_id"],
          "log_auto_ekatalog_date" => date("Y-m-d H:i:s"),
        );
        insertRow("log_auto_ekatalog", $data);
        echo "=================================<br/>";
      }
    }
  }
  public function extract_ekatalog_detail()
  {
    $sql = "select id_pk_ekatalog_detail, id_fk_ekatalog_id, ekatalog_detail, ekatalog_detail_item, ekatalog_detail_status_extract, ekatalog_detail_extract_date from temp_ekatalog_detail where ekatalog_detail_status_extract = 0";
    $result = executeQuery($sql);
    if ($result->num_rows() > 0) {
      $result = $result->result_array();
      for ($row_mstr = 0; $row_mstr < count($result); $row_mstr++) {
        $where = array(
          "id_pk_ekatalog_detail" => $result[$row_mstr]["id_pk_ekatalog_detail"]
        );
        $data = array(
          "ekatalog_detail_status_extract" => 1,
          "ekatalog_detail_extract_date" => date("Y-m-d H:i:s"),
        );
        updateRow("temp_ekatalog_detail", $data, $where);

        $ekatalog_detail = $result[$row_mstr]["ekatalog_detail"];
        $ekatalog_detail = explode('<div role="tabpanel" class="tab-pane active" id="informasi-utama">', $ekatalog_detail)[1];
        $ekatalog_detail = explode('<div role="tabpanel" class="tab-pane" id="pp-ppk">', $ekatalog_detail)[0];

        $ekatalog_status = $result[$row_mstr]["ekatalog_detail"];
        $ekatalog_status = explode('<div class="detail-heading col-md-4">Status</div>', $ekatalog_status)[1];
        $ekatalog_status = explode('<div class="detail-heading col-md-4">Posisi Paket</div>', $ekatalog_status);
        $ekatalog_status_main = trim(strip_tags($ekatalog_status[0]));
        $ekatalog_status_posisi = trim(strip_tags(explode("Riwayat Paket", $ekatalog_status[1])[0]));


        #echo $ekatalog_detail;
        $regex = "/(\<div class\=\"detail\-description col\-md\-9\"\>).*/";
        preg_match_all($regex, $ekatalog_detail, $matches);
        $matches = $matches[0];


        for ($a = 0; $a < count($matches); $a++) {
          $split = explode('<div class="detail-description col-md-9">', $matches[$a])[1];
          $matches[$a] = str_replace("</div>", "", $split);
          #echo $a." - ".$matches[$a]."<br/>";
        }
        #hapus yang gapernah diupdate (which is masih original) dan yang id_create 0 (yg which is dibuat oleh sistem)
        $args = array(
          $matches[1]
        );
        #refrensi urutan liat dari https://e-katalog.lkpp.go.id/id/purchasing/paket/detail/3631844
        $sql = "delete from mstr_ekatalog where ekatalog_id_paket = ? and ekatalog_tgl_update is null and ekatalog_id_create = 0";
        executeQuery($sql, $args); #delete sirup yang udah kedaftar di mstr sirup supaya prevent duplicate. However, setiap kali data masuk ke mstr_sirup, itu sudah pasti ada backupnya di archieve.
        $sql = "delete tbl_ekatalog_produk from tbl_ekatalog_produk inner join mstr_ekatalog on mstr_ekatalog.id_pk_ekatalog = tbl_ekatalog_produk.id_fk_ekatalog where ekatalog_id_paket = ?";
        executeQuery($sql,$args);
        
        $matches[8] = $this->change_date($matches[8]);
        $matches[9] = $this->change_date($matches[9]);
        $total_harga = trim(str_replace("Rp ", "", str_replace(".", "", str_replace(",00", "", strip_tags($matches[12])))));
        $data = array(
          "ekatalog_komoditas" => $matches[0],
          "ekatalog_komoditas_online" => $matches[0],
          "ekatalog_id_paket" => $matches[1],
          "ekatalog_id_paket_online" => $matches[1],
          "ekatalog_nama_paket" => $matches[2],
          "ekatalog_nama_paket_online" => $matches[2],
          "ekatalog_instansi" => $matches[3],
          "ekatalog_instansi_online" => $matches[3],
          "ekatalog_satuan_kerja" => $matches[4],
          "ekatalog_satuan_kerja_online" => $matches[4],
          "ekatalog_npwp_satuan_kerja" => str_replace("&ndash;", "-", $matches[5]),
          "ekatalog_npwp_satuan_kerja_online" => str_replace("&ndash;", "-", $matches[5]),
          "ekatalog_alamat_satuan_kerja" => $matches[6],
          "ekatalog_alamat_satuan_kerja_online" => $matches[6],
          "ekatalog_alamat_pengiriman" => $matches[7],
          "ekatalog_alamat_pengiriman_online" => $matches[7],
          "ekatalog_tgl_buat_online" => $matches[8],
          "ekatalog_tgl_ubah_online" => $matches[9],
          "ekatalog_tahun_anggaran" => $matches[10],
          "ekatalog_tahun_anggaran_online" => $matches[10],
          "ekatalog_total_produk" => $matches[11],
          "ekatalog_total_produk_online" => $matches[11],
          "ekatalog_total_harga" => $total_harga,
          "ekatalog_total_harga_online" => $matches[12],
          "ekatalog_status_paket" => $ekatalog_status_main,
          "ekatalog_status_paket_online" => $ekatalog_status_main,
          "ekatalog_posisi_paket" => $ekatalog_status_posisi,
          "ekatalog_posisi_paket_online" => $ekatalog_status_posisi,
          "ekatalog_status" => "aktif",
          "ekatalog_tgl_create" => date("Y-m-d H:i:s"),
          "ekatalog_id_create" => 0,
        );
        $id_ekatalog = insertRow("mstr_ekatalog", $data);
        $data = array(
          "log_auto_ekatalog" => "Mengekstrak dan memasukan detail E-Katalog ke database MAK-CRM",
          "log_auto_ekatalog_desc" => "Mengekstrak dan memasukan detail dari e-katalog dengan id paket = " . $matches[1] . " dan nama paket: " . $matches[2],
          "log_auto_ekatalog_date" => date("Y-m-d H:i:s"),
        );
        insertRow("log_auto_ekatalog", $data);

        $ekatalog_item = trim($result[$row_mstr]["ekatalog_detail_item"]);
        $ekatalog_item = explode('<table aria-describedby="mydesc" class="table table-bordered">', $ekatalog_item);
        $ekatalog_item = $ekatalog_item[1];
        $ekatalog_item = explode("<tr>", $ekatalog_item);
        for ($a = 2; $a < count($ekatalog_item); $a++) {
          $regex = "/((\<td\>|\<td class\=\"column-right\"\>|<td width=\"200\">|<h6>).*(\<\/td\>))|(<h6>).*(<\/h6>)/";
          preg_match_all($regex, $ekatalog_item[$a], $matches);
          $matches = $matches[0];

          $kuantitas = trim(str_replace(",", ".", strip_tags($matches[1])));
          $harga_satuan = trim(str_replace("Rp ", "", str_replace(".", "", str_replace(",00", "", strip_tags($matches[3])))));
          $perkiraan_ongkos_kirim = trim(str_replace("Rp ", "", str_replace(".", "", str_replace(",00", "", strip_tags($matches[4])))));
          $total_harga = trim(str_replace("Rp ", "", str_replace(".", "", str_replace(",00", "", strip_tags($matches[5])))));

          $data = array(
            "ekatalog_produk_nama_produk" => trim(strip_tags($matches[0])),
            "ekatalog_produk_nama_produk_online" => trim(strip_tags($matches[0])),
            "ekatalog_produk_kuantitas_online" => trim(strip_tags($matches[1])),
            "ekatalog_produk_kuantitas" => floatval($kuantitas),
            "ekatalog_produk_mata_uang_online" => trim(strip_tags($matches[2])),
            "ekatalog_produk_mata_uang" => trim(strip_tags($matches[2])),
            "ekatalog_produk_harga_satuan_online" => trim(strip_tags($matches[3])),
            "ekatalog_produk_harga_satuan" => intval($harga_satuan),
            "ekatalog_produk_perkiraan_ongkos_kirim_online" => trim(strip_tags($matches[4])),
            "ekatalog_produk_perkiraan_ongkos_kirim" => intval($perkiraan_ongkos_kirim),
            "ekatalog_produk_total_harga_online" => trim(strip_tags($matches[5])),
            "ekatalog_produk_total_harga" => intval($total_harga),
            "ekatalog_produk_catatan" => trim(strip_tags($matches[6])),
            "ekatalog_produk_catatan_online" => trim(strip_tags($matches[6])),
            "ekatalog_produk_status" => "aktif",
            "ekatalog_produk_tgl_create" => date("Y-m-d H:i:s"),
            "ekatalog_produk_id_create" => 0,
            "id_fk_ekatalog" => $id_ekatalog
          );
          insertRow("tbl_ekatalog_produk", $data);
        }
        $data = array(
          "log_auto_ekatalog" => "Mengekstrak dan memasukan data produk E-Katalog ke database MAK-CRM",
          "log_auto_ekatalog_desc" => "Mengekstrak dan memasukan data produk dari e-katalog dengan id paket = " . $matches[1] . " dan nama paket: " . $matches[2],
          "log_auto_ekatalog_date" => date("Y-m-d H:i:s"),
        );
        insertRow("log_auto_ekatalog", $data);

        #print_r($ekatalog_item);
        #echo $ekatalog_item;
      }
    }
  }
  public function change_date($tanggal)
  {
    echo $tanggal;
    $tanggal = explode(" ", $tanggal);
    $tgl = $tanggal[0];
    $bln = strtolower(substr($tanggal[1], 0, 3));
    $thn = $tanggal[2];

    if (strtolower($bln) == "mei") {
      $bln = "may";
    } else if (strtolower($bln) == "agu") {
      $bln = "aug";
    } else if (strtolower($bln) == "okt") {
      $bln = "oct";
    } else if (strtolower($bln) == "des") {
      $bln = "dec";
    }
    $formatteddate = date("Y-m-d", strtotime($tgl . " " . $bln . " " . $thn));
    return $formatteddate;
  }
}
