<?php // callback.php

require "vendor/autoload.php";
require_once('vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php');

$access_token = 'ahbj8DK/OxNGHqr9fwgt4pNzw2TNhNIBtmbvEBw0ILtArrE0S78BE+FVulEvtk3y62bz7QkbT+J0f5MJRlC6yMRv4IQyMyTRQLEBV8s+UI/sdJ5YiKkhLB/mmgU8JhoIByJcUoH06CYb3hUotv6BFwdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data

if (!is_null($events['events'])) {
	// Loop through each event	
	
	foreach ($events['events'] as $event) {
		
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			
			$intro_text = "หมายเลขยืนยันการลงทะเบียนของคุณ คือ ";			
			$Line_UserId = $event['source']['userId'];
			$apikey = mt_rand(100000, 999999);			
			$register_text = " กดที่ลิงค์นี้เพื่อลงเบียนผู้ใช้งาน http://ellis.surat.psu.ac.th/Line-Messaging-API/staff_register.php?line_user_id=".$Line_UserId."&apikey=".$apikey;
			
			// Get replyToken
			$replyToken = $event['replyToken'];
			// Get UserId
			$line_userId = $event['source']['userId'];

			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $intro_text.$apikey.$register_text
			];

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);						

			echo $result . "\r\n";			
	
		}
		
	
	
	
	

	// Make a POST Request to Messaging API to reply to sender
	//$url = 'http://ellis.surat.psu.ac.th/Line-Messaging-API/register.php';	
	$url = 'http://ellis.surat.psu.ac.th/Line-Messaging-API/staff_register.php';	

	$headers = ['Content-Type' => 'application/x-www-form-urlencoded', 'charset' => 'utf-8'];

	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, "apikey=$apikey&line_user_id=$line_userId&intro_text=$intro_text");
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);	
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	$result = curl_exec($ch);
	curl_close($ch);
	
		
		
	}
}
echo "OK";
