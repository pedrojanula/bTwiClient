<?php

require_once('settings.php');
require_once('./libs/TwitterAPIExchange.php');

if(isset($_POST['status'])){
	$tweet = $_POST['status'];
	$status = false;

	if((strlen($tweet) < 141) || (strlen($tweet) > 0)){
		$url = 'https://api.twitter.com/1.1/statuses/update.json';
		$requestMethod = 'POST';
		$postfield = array('status' => $tweet);

		$twitter = new TwitterAPIExchange($settings);
		$result = $twitter->buildOauth($url, $requestMethod)
			->setPostfields($postfield)
			->performRequest();

		$status = true;
	}

	echo $status;
}

?>