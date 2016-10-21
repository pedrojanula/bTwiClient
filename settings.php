<?php

require_once('./libs/TwitterAPIExchange.php');

$settings = array(
    'oauth_access_token' => "YOUR_OAUTH_ACCESS_TOKEN",
    'oauth_access_token_secret' => "YOUR_OAUTH_ACCESS_TOKEN_SECRET",
    'consumer_key' => "YOUR_CONSUMER_KEY",
    'consumer_secret' => "YOUR_CONSUMER_SECRET"
);

$connected = false;

$connect = new TwitterApiExchange($settings);
										
$url = 'https://api.twitter.com/1.1/account/verify_credentials.json';
$getfield = '?include_email=false';
$requestMethod = 'GET';

$response =  $connect->setGetfield($getfield)
	->buildOauth($url, $requestMethod)
	->performRequest(); 

$response = json_decode($response);

if($response->errors == null){
	$connected = true;
}

?>