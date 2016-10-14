<?php
$ch = curl_init("http://www.tlotto.kr/ttt.json");
$fp = fopen("file.txt", "w");

curl_setopt($ch, CURLOPT_FILE, $fp);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, 0);

$respone = curl_exec($ch);
$respone = substr($respone,0,350);
fwrite($fp,$respone);

$zhengze = '/\[([\s\S]*),\{/i';
preg_match($zhengze,$respone,$matches);

print_r(json_decode($matches[1],true));

curl_close($ch);
fclose($fp); 