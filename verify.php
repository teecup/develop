<?php
$access_token = 'dtbGq61uHiCd2QMUpT+V1tYYmOXU1k5MKXTJ4ntKI1kF3dh31yAUVz2bJL667N+1Z5ZXuj57qOuS9TH40lFSP+Rl3hKV0MFOjpXoWhOcEFYWa0q9o+VFMS80WfrRvwEYCsJpIvf89k1w7FKUaf2SfQdB04t89/1O/w1cDnyilFU=';


$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;