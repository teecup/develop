<?php


$access_token = 'ahbj8DK/OxNGHqr9fwgt4pNzw2TNhNIBtmbvEBw0ILtArrE0S78BE+FVulEvtk3y62bz7QkbT+J0f5MJRlC6yMRv4IQyMyTRQLEBV8s+UI/sdJ5YiKkhLB/mmgU8JhoIByJcUoH06CYb3hUotv6BFwdB04t89/1O/w1cDnyilFU=';


$userId = 'U86d0fce03ebfd3cee4e221bbfc66db7c';

$url = 'https://api.line.me/v2/bot/profile/'.$userId;

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;

