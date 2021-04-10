<?php
$tahunAnggaran = 2021;
$keyword = urlencode("rawat inap");
$amount = 10;
$url = "https://e-katalog.lkpp.go.id/purchasing/paket?keyword=&commodity=0&position=&negotiation=&year=2021&status=&sortby=&per_page=100&offset=1";

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
$response = curl_exec($curl);
echo $response;
?>
