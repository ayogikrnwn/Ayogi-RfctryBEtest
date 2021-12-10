<?php

require_once './config.php';
require_once 'fbConfig.php';
require_once 'User.php';
if (isset($_SESSION["user_id"]) && $_SESSION["user_id"] != "") {
 
  header("location:".SITE_URL . "home.php");
}

if(!$fbUser){
	$fbUser = NULL;
	$loginURL = $facebook->getLoginUrl(array('redirect_uri'=>$redirectURL,'scope'=>$fbPermissions));
	$output = '<a href="'.$loginURL.'"><img src="images/fbon.png"></a>'; 	
}else{
	//Get user profile data from facebook
	$fbUserProfile = $facebook->api('/me?fields=id,first_name,last_name,email,link,gender,locale,picture');
	
	//Initialize User class
	$user = new User();
	
	//Insert or update user data to the database
	$fbUserData = array(
		'oauth_provider'=> 'facebook',
		'oauth_uid' 	=> $fbUserProfile['id'],
		'first_name' 	=> $fbUserProfile['first_name'],
		'last_name' 	=> $fbUserProfile['last_name'],
		'email' 		=> $fbUserProfile['email'],
		'gender' 		=> $fbUserProfile['gender'],
		'locale' 		=> $fbUserProfile['locale'],
		'picture' 		=> $fbUserProfile['picture']['data']['url'],
		'link' 			=> $fbUserProfile['link']
	);
	$userData = $user->checkUser($fbUserData);
	
	//Put user data into session
	$_SESSION['userData'] = $userData;
	
	//Render facebook profile data
	if(!empty($userData)){
		$output = '<h1>Facebook Profile Details </h1>';
		$output .= '<img src="'.$userData['picture'].'">';
        $output .= '<br/>Facebook ID : ' . $userData['oauth_uid'];
        $output .= '<br/>Name : ' . $userData['first_name'].' '.$userData['last_name'];
        $output .= '<br/>Email : ' . $userData['email'];
        $output .= '<br/>Gender : ' . $userData['gender'];
        $output .= '<br/>Locale : ' . $userData['locale'];
        $output .= '<br/>Logged in with : Facebook';
		$output .= '<br/><a href="'.$userData['link'].'" target="_blank">Click to Visit Facebook Page</a>';
        $output .= '<br/>Logout from <a href="logout.php">Facebook</a>'; 
	}else{
		$output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
	}
}
include './header.php';
?>
<div class="container">
  <div class="margin10"></div>
  
  <?php if ($_SESSION["e_msg"] <> "") { ?>
    <div class="alert alert-dismissable alert-danger">
      <button data-dismiss="alert" class="close" type="button">x</button>
      <p><?php echo $_SESSION["e_msg"]; ?></p>
    </div>
  <?php } ?>
  
  <div class="col-sm-3 col-sm-offset-4">
    <a class="btn btn-block btn-social btn-google-plus" href="google_login.php">
            <i class="fa fa-google-plus"></i> Login with Google
          </a>
  </div>
  <br>
  <br>
  <br>
  <div class="col-sm-3 col-sm-offset-4">
  <div><?php echo $output; ?></div>
</div>
<?php

// unset if after it display the error.
$_SESSION["e_msg"] = "";
?>