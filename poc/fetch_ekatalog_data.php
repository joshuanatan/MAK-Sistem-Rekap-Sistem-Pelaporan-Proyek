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
// $response = json_decode($response,true);
// for($a = 0; $a<$amount; $a++){
//     $id = $response["data"][$a]["id"];

//     $url = "https://sirup.lkpp.go.id/sirup/home/detailPaketPenyediaPublic2017/".$id;
//     curl_setopt_array($curl, array(
//         CURLOPT_URL => $url,
//         CURLOPT_RETURNTRANSFER => true,
//         CURLOPT_ENCODING => "",
//         CURLOPT_MAXREDIRS => 10,
//         CURLOPT_TIMEOUT => 30,
//         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//         CURLOPT_CUSTOMREQUEST => "GET",
//     ));
//     $detail = curl_exec($curl);
//     $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
//     extract_data($detail);
// }

// curl_close($curl);
// function extract_data($html){
//     $dom = new domDocument;
//     try{
//         $dom->loadHTML($html);
//     }
//     catch(Exception $e){

//     }
//     $content = $dom->getElementById("detil")->nodeValue; 
//     $target_key = array(
//         "Kode RUP",
//         "Nama Paket",
//         "Nama KLPD",
//         "Satuan Kerja",
//         "Tahun Anggaran",
//         "Lokasi Pekerjaan",
//         "Volume Pekerjaan",
//         "Uraian Pekerjaan",
//         "Spesifikasi Pekerjaan",
//         "Produk Dalam Negeri",
//         "Usaha Kecil",
//         "Pra DIPA / DPA",
//         "Jenis Pengadaan",
//         "Total Pagu",
//         "Metode Pemilihan",
//         "Pemanfaatan Barang/Jasa",
//         "Jadwal Pelaksanaan Kontrak",
//         "Jadwal Pemilihan Penyedia",
//         "Tanggal Perbarui Paket",
//     );
//     $remove = array(
//         "Pra DIPA / DPA",
//     );
//     $result = array();
//     for($a = 1; $a<count($target_key); $a++){
//         $split = explode($target_key[$a],$content);
//         if($a != 1){
//             $result[$a-1] = $target_key[$a-1]." ".$split[0];
//         }
//         else{
//             $result[$a-1] = $split[0];
//         }
//         if($a+1 == count($target_key)){
//             $result[$a] = $target_key[$a]." ".$split[1];
//         }
//         $content = $split[1];
//     }
    
//     for($a = 0; $a<count($result); $a++){
//         if(in_array($target_key[$a],$remove)){
//             continue;
//         }
//         echo explode($target_key[$a],$result[$a])[1]."<br/>";
//     }
//     // discard white space
//     $dom->preserveWhiteSpace = false;
// }
?>
