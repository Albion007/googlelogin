<?php
require_once('google-api/vendor/autoload.php');
$gClient = new Google_Client();
$gClient->setClientId("784433942119-9fmgm5ab3rikb655o3qtelvtn2k6cd4h.apps.googleusercontent.com");
$gClient->setClientSecret("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");
$gClient->setApplicationName("Login tutorial 2");
$gClient->setRedirectUri("http://localhost/logingoogle/controller.php");
$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");

$login_url = $gClient->createAuthUrl();
?>