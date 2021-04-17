<?php
class Ekatalog extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }
    public function get_login_page(){
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
        return $authentication_code;
    }
    public function index(){
        $authentication_code = $this->get_login_page();
        #echo "get authentication code done: ".$authentication_code;
        $login_cookies = $this->login($authentication_code, "makhe2012", "m@kit2008");
        $this->get_data($login_cookies);

    }
    public function login($authentication_code,$username,$password){
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
        echo explode(";",$response[2])[0]; #katalog session
        // echo "<br/><br/>";  
        // echo explode(";",$response[3])[0];
        // echo "<br/><br/>";  
        return explode(";",$response[2])[0];
    }
    public function get_data($login_cookies){
        $page = 100;
        $url = "https://e-katalog.lkpp.go.id/purchasing/paket?keyword=&commodity=0&position=&negotiation=&year=2021&status=&sortby=&per_page=$page&offset=1";

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
                "Cookie: ".$login_cookies
            )
        ));
        $response = curl_exec($curl); #string
        $this->explode_data($response);
    }
    private function explode_data($response){
        $dom = new domDocument;
        // load the html into the object
        $dom->loadHTML($response);
        $content = $dom->getElementsByTagName("tr");
        foreach ($content as $a) {
            $test = $a->getElementsByTagName("td");
            $counter = 0;
            foreach ($test as $b){
                if($counter == 1){
                    $pattern = "/[A-Za-z0-9]{3}-[A-Za-z0-9]{5}-[A-Za-z0-9]{7}/";
                    $id_paket = preg_match($pattern, $b->nodeValue, $matches); 
                    $id_paket = $matches[0];
                    echo $id_paket."<br/>";
                    echo explode($id_paket,$b->nodeValue)[1]."<br/>";
                }
                else{
                    echo $b->nodeValue."<br/>";
                }
                $counter++;
            }
            echo "<br/>";
        }   
    }
}