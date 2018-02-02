<?php
	session_start();

	require_once "Facebook/autoload.php";

	$FB = new \Facebook\Facebook([
		'app_id' => '174688093312491',
		'app_secret' => 'b6e4e6c188eec95252cae9c411027aec',
		'default_graph_version' => 'v2.12'
	]);

	$helper = $FB->getRedirectLoginHelper();
?>
