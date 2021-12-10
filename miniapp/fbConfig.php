<?php
session_start();

//Include Facebook SDK
require_once 'inc/facebook.php';

/*
 * Configuration and setup FB API
 */
$appId = '4779394025416013'; //Facebook App ID
$appSecret = '2d29b557101cd587649a11e8cf6b36a5'; // Facebook App Secret
$redirectURL = 'http://www.w3tweaks.com/facebookoauth'; // Callback URL
$fbPermissions = 'email';  //Required facebook permissions

//Call Facebook API
$facebook = new Facebook(array(
  'appId'  => $appId,
  'secret' => $appSecret
));
$fbUser = $facebook->getUser();
?>