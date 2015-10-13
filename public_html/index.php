<!DOCTYPE html>

<!--
	Linnea Strågefors, Oct 2015
	Start page of the Heavy Vehicle Application
-->

<html>
<head>
	<meta charset="UTF-8">
	<title>A2 login</title>
	<style>
		#g {height: 35px; width: 135px}
	</style>
</head>

<body align="center">
	
	<div align="center">
		<br><br><br><br><br>
	<h3>Login to A2</h1><br><br>
	
	<!-- HybridAuth library is used when signing-in with Twitter and Google -->
	<a href="loggedin.php?provider=Twitter"><img src='images/tSignin.png'></img></a> 
	<a href="loggedin.php?provider=Google"><img id='g' src='images/GSignin.png'></img></a>
	</div>

</body>
</html>

<?php

// Facebook php SDK is used separately for Facebook sign-in
$session=session_start();

require_once __DIR__ . '/facebook-php-sdk-v4-5.0-dev/src/Facebook/autoload.php';

$fb = new Facebook\Facebook([
  'app_id' => '725796267565122',
  'app_secret' => 'd84c0c61f83c73dd9fc6cce324f9f89c',
  'default_graph_version' => 'v2.4',
]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('http://4me302.a2.linneas.net/fb-callback.php', $permissions);

echo '<a href="' . htmlspecialchars($loginUrl) . '"><img src="images/fbLogin.png"></a>';

?>