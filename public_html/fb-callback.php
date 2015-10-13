<?php
/*
 * Linnea Strågefors, Oct 2015
 *
 * This is the file Facebook returns to if the OAuth sign-in was valid
 * The application then checks if the authenticated user is authorized 
 * to enter the vehicle role-based page. This is checked in page.php.
 */

session_start();

require_once __DIR__ . '/facebook-php-sdk-v4-5.0-dev/src/Facebook/autoload.php';
include('page.php');

$loginPageURL = 'http://4me302.a2.linneas.net/index.php';
$provider = "Facebook";

$fb = new Facebook\Facebook([  
  'app_id' => '725796267565122',  
  'app_secret' => 'd84c0c61f83c73dd9fc6cce324f9f89c',  
  'default_graph_version' => 'v2.4',  
  ]);  

$helper = $fb->getRedirectLoginHelper();  
  
// get access token
try {  
  $accessToken = $helper->getAccessToken();  
} catch(Facebook\Exceptions\FacebookResponseException $e) {  
  
  // When Graph returns an error  
  echo 'Graph returned an error: ' . $e->getMessage();
  echo '<br><br><a href="' . htmlspecialchars($loginPageURL) . '">Go to start page</a>';

  exit;  
} catch(Facebook\Exceptions\FacebookSDKException $e) {  
  
  // When validation fails or other local issues  
  echo 'Facebook SDK returned an error: ' . $e->getMessage();  
  exit;  
}  

// if no access token, through exeptions
if (! isset($accessToken)) {  
  if ($helper->getError()) {  
    header('HTTP/1.0 401 Unauthorized');  
    echo "Error: " . $helper->getError() . "\n";
    echo "Error Code: " . $helper->getErrorCode() . "\n";
    echo "Error Reason: " . $helper->getErrorReason() . "\n";
    echo "Error Description: " . $helper->getErrorDescription() . "\n";
  } else {  
    header('HTTP/1.0 400 Bad Request');  
    echo 'Bad request';  
  }  
  exit;  
}  

/* The user is logged in with Facebook */
 
// get user name from Graph API
try {
  // Returns a `Facebook\FacebookResponse` object
  $response = $fb->get('/me?fields=id,name', $accessToken);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

// function call to page.php to check if the user
// is qualified to the role-based vehicle page
$user = $response->getGraphUser();
$loginName = $user['name'];
checkUser($loginName, $provider);


?>