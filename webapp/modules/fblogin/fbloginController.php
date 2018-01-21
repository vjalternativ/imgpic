<?php 
require_once 'webapp/include/facebook/1353/autoload.php';
require_once 'webapp/modules/ip_user/ip_userController.php';
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\Entities\AccessToken;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Facebook\HttpClients\FacebookHttpable;

class fblogin {



function action_login() {
global $sugar_config;
// init app with app id and secret
FacebookSession::setDefaultApplication( $sugar_config['fb_public_key'],$sugar_config['fb_secret_key'] );
// login helper with redirect_uri
    $helper = new FacebookRedirectLoginHelper($sugar_config['fb_login_redirect'] );
try {
  $session = $helper->getSessionFromRedirect();
} catch( FacebookRequestException $ex ) {
  // When Facebook returns an error
} catch( Exception $ex ) {
  // When validation fails or other local issues
}
// see if we have a session
if ( isset( $session ) ) {
  // graph api request for user data
  $request = new FacebookRequest( $session, 'GET', '/me?locale=en_US&fields=name,email' );
  $response = $request->execute();
  // get response
  $graphObject = $response->getGraphObject();
     	$fbid = $graphObject->getProperty('id');              // To Get Facebook ID
 	    $fbfullname = $graphObject->getProperty('name'); // To Get Facebook full name
	    $femail = $graphObject->getProperty('email');    // To Get Facebook email ID
		$gender = $graphObject->getProperty('gender');
		$firstName = $graphObject->getProperty('first_name');
		$lastName = $graphObject->getProperty('last_name');
		if($gender == 'male'){
		$gender = "male";
		} else {
		$gender = "female";
		}		
	/* ---- Session Variables -----*/
	    $_SESSION['email'] = $femail;           
        $_SESSION['first_name'] = $firstName;
		$_SESSION['last_name'] = $lastName;
    /* ---- header location after session ----*/


$_REQUEST["email"]=$femail;
$_REQUEST["password"]=rand(1000,9999);
$string = explode('@',$femail);
$_REQUEST["username"]=$string[0];
$_REQUEST["gender"]=$gender;
$_REQUEST['first_name'] = $firstName;
$_REQUEST['last_name'] = $lastName;
$_REQUEST['action'] = 'signup';

 

$ip_user = new ip_user();
$result = $ip_user->action_signup(false,'facebook');


if(!isset($result['id']) || $result['id'] == "") {
die("Something went wrong");
}
$_SESSION['uid'] = $result['id'];
$_SESSION['username'] = $result['username'];
redirect('ip_user/feeds');
exit;
} else {
$permissions = ['email'];
  
  
  $loginUrl = $helper->getLoginUrl($permissions);

 header("Location: ".$loginUrl);
exit;
}
}

}

