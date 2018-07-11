<?php
$access_token = '30Tf3e0wn3k7CE4NwIjAwjt7M8cMO8Rbs8pIWiY9jlD6WMdkvybkQIVaIK4FPe27Z5ZXuj57qOuS9TH40lFSP+Rl3hKV0MFOjpXoWhOcEFYdcVZylVeLU6Mw/ENeq2cKYN9CVUdxYX2FqXAZSpeZbwdB04t89/1O/w1cDnyilFU=
';


$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;