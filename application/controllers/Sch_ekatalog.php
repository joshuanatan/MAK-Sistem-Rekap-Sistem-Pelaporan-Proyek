<?php
date_default_timezone_set("Asia/Jakarta");
class Sch_ekatalog extends CI_Controller{
  private $login_cookies;
  public function __construct(){
    parent::__construct();
  }
  private function login(){
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
        CURLOPT_POSTFIELDS => "username=".$username."&password=".$password."&authenticityToken=".$authentication_code,
    ));
    $response = curl_exec($curl);
    $response = explode("Set-Cookie:",$response);
    #echo count($response);
    #set=cookie itu ada di array index 1,2,3 SAJA. Index 0 dan 4 itu tidak ada karena sudah diakhir. 
    /*
    [1] E_KATALOG_5_FLASH=; Max-Age=0; Expires=Sat, 10 Apr 2021 06:35:51 GMT; Path=/; SameSite=Lax; HttpOnly
    [2] E_KATALOG_5_SESSION=6dc2855c69edff702a881019e68da7e3943266d2-___TS=1618040151095&___ID=e7f462a7-de6a-4f38-abae-750b13906f7a; Max-Age=3600; Expires=Sat, 10 Apr 2021 07:35:51 GMT; Path=/; SameSite=Lax; HttpOnly
    [3] E_KATALOG_5_ERRORS=; Max-Age=0; Expires=Sat, 10 Apr 2021 06:35:51 GMT; Path=/; SameSite=Lax; HttpOnly
    */
    // echo explode(";",$response[1])[0];
    // echo "<br/><br/>";  
    // echo explode(";",$response[2])[0]; #katalog session
    // echo "<br/><br/>";  
    // echo explode(";",$response[3])[0];
    // echo "<br/><br/>";  
    $this->login_cookies = explode(";",$response[2])[0];
  }
  public function get_data($login_cookies){
    if($this->login_cookies == ""){
      $this->login();
    }
    $page = 100;
    #$url = "https://e-katalog.lkpp.go.id/purchasing/paket?keyword=&commodity=0&position=&negotiation=&year=2021&status=&sortby=desc&per_page=$page&offset=1";
    $url = "http://localhost/mak/data/test_ekatalog.html";

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
        "Cookie: ".$this->login_cookies
      )
    ));
    $response = (curl_exec($curl)); #string
    $response = str_replace('<table aria-describedby="mydesc" class="table table-striped" id="tblListPaket">','<table>',$response);
    #echo $response;
    $split = explode('<table>',$response);
    $split = explode('</table>',$split[1])[0];
    $split = explode('<tbody>',$split);
    $split = explode('</tbody>',$split[1])[0];

    $split = explode("<tr>",$split);
    for($a = 1; $a<count($split); $a++){
      $regex_link = "/(\/[a-z]+)+(\/[0-9]+)/";
      preg_match($regex_link, $split[$a],$matches);
      $link = $matches[0];

      $regex_link_id = "/([0-9]){7}/"; #contoh id 3809900
      preg_match($regex_link_id, $link,$matches);
      $id = $matches[0];

      $where = array(
        "ekatalog_id" => $id
      );
      if(!isExistsInTable("temp_ekatalog_id",$where)){
        $data = array(
          "ekatalog_id_link" => $link,
          "ekatalog_id" => $id,  
          "ekatalog_id_status_query" => 0,  
        );
        insertRow("temp_ekatalog_id",$data);
      }
    }
  }
  public function get_ekatalog_detail(){
    if($this->login_cookies == ""){
      $this->login();
    }
    $sql = "select id_pk_ekatalog_id, ekatalog_id_link, ekatalog_id, ekatalog_id_status_query, ekatalog_id_query_date from temp_ekatalog_id where ekatalog_id_status_query = 0 limit 1";
    $result = executeQuery($sql);
    $result = $result->result_array();

    $url = "https://e-katalog.lkpp.go.id/id/purchasing/paket/detail/".$result[0]["ekatalog_id"];
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
        "Cookie: ".$this->login_cookies
      )
    ));
    $response = (curl_exec($curl)); #string
    
    $url = "https://e-katalog.lkpp.go.id/id/purchasing/paket/".$result[0]["ekatalog_id"]."/daftar-produk";
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
        "Cookie: ".$this->login_cookies
      )
    ));
    $response_produk = (curl_exec($curl)); #string

    $data = array(
      "id_fk_ekatalog_id" => $result[0]["id_pk_ekatalog_id"],
      "ekatalog_detail" => $response,
      "ekatalog_detail_item" => $response_produk
    );
    insertRow("temp_ekatalog_detail",$data);

    $where = array(
      "id_pk_ekatalog_id" => $result[0]["id_pk_ekatalog_id"]
    );
    $data = array(
      "ekatalog_id_status_query" => 1,
      "ekatalog_id_query_date" => date("Y-m-d H:i:s")
    );
    updateRow("temp_ekatalog_id",$data,$where);
  }
  public function extract_ekatalog_detail(){
    $sql = "select id_pk_ekatalog_detail, id_fk_ekatalog_id, ekatalog_detail, ekatalog_detail_item, ekatalog_detail_status_extract, ekatalog_detail_extract_date from temp_ekatalog_detail where ekatalog_detail_status_extract = 0 limit 1";
    $result = executeQuery($sql);
    $result = $result->result_array();

    $ekatalog_detail = $result[0]["ekatalog_detail"];
    $ekatalog_detail = explode('<div role="tabpanel" class="tab-pane active" id="informasi-utama">', $ekatalog_detail)[1];
    $ekatalog_detail = explode('<div role="tabpanel" class="tab-pane" id="pp-ppk">', $ekatalog_detail)[0];

    #echo $ekatalog_detail;
    $regex = "/(\<div class\=\"detail\-description col\-md\-9\"\>).*/";
    preg_match_all($regex, $ekatalog_detail, $matches);
    $matches = $matches[0];
    print_r($matches);
    

    for($a = 0; $a<count($matches); $a++){
      $split = explode('<div class="detail-description col-md-9">',$matches[$a])[1];
      $split = str_replace("</div>","",$split);
      echo $split."<br/>";
    }
  }
}