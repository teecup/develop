<?php



require "vendor/autoload.php";

$access_token = 'ahbj8DK/OxNGHqr9fwgt4pNzw2TNhNIBtmbvEBw0ILtArrE0S78BE+FVulEvtk3y62bz7QkbT+J0f5MJRlC6yMRv4IQyMyTRQLEBV8s+UI/sdJ5YiKkhLB/mmgU8JhoIByJcUoH06CYb3hUotv6BFwdB04t89/1O/w1cDnyilFU=';

$channelSecret = 'd0271fd54d3126540bdb2d831101ccd3';

$pushID = 'Ue8397db755c9256de543ed18d01dff28'; // my ID line
//$pushID = 'U293c83d4954be7f86ea28fd36ae32972'; // Client ID line

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('bot push -> ทดสอบส่งข้อความจาก Line official มายังผู้ใช้เฉพาะคน');
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();







