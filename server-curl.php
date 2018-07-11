<?php // callback.php

	//require "vendor/autoload.php";
	//require_once('vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php');

	$url = 'http://ellis.surat.psu.ac.th/Line-Messaging-API/register.php';

	$apikey = "line087725sd";
	$replyToken = "replyTokenreplyTokenreplyTokenreplyToken";
	$intro_text = "ทดสอบภาษาไทย";

	// Make a POST Request to Messaging API to reply to sender
	$url = 'http://ellis.surat.psu.ac.th/Line-Messaging-API/register.php';

	$headers = ['Content-Type' => 'application/x-www-form-urlencoded', 'charset' => 'utf-8'];

	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, "apikey=$apikey&replyToken=$replyToken&intro_text=$intro_text");
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);	
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	$result = curl_exec($ch);
	curl_close($ch);				    	



if ($result === FALSE) {
	echo 'An error has occurred: ' . curl_error($ch) . PHP_EOL;
}
else {
	echo $result;
}
