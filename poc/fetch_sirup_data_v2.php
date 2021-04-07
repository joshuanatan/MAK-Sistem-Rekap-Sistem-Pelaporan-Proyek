<?php

$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$url = "http://localhost/mak/poc/test.html";
curl_setopt($ch, CURLOPT_URL, $url);
$detail = curl_exec($ch);
echo gettype($detail);

$dom = new domDocument;
// load the html into the object
$dom->loadHTML($detail);
$content = $dom->getElementById("detil")->nodeValue; 

$content = str_replace("</tr>","",$content);
echo $content;
$result = array();

$dom->preserveWhiteSpace = false;

$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);
?>
