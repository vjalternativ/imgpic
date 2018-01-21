<?php

require_once 'webapp/include/utils.php';
require_once 'custom/include/utils.php';
class ImgPic {

function __construct() {

global $sugar_config,$current_user;
$params = $this->getParams();

if(isset($_COOKIE['uid'])){

$_SESSION['uid'] = $_COOKIE['uid'];
$_SESSION['username'] = $_COOKIE['username'];
$user = new User();
$user->retrieve($_COOKIE['uid']);
$current_user= $user;
}else if(isset($_SESSION['uid'])) {
setcookie('uid',$_SESSION['uid']);
setcookie('username',$_SESSION['username']);

}

if(count($params)==0) {
$_REQUEST['module'] = $sugar_config['ip_default_module'];
$_REQUEST['action'] = $sugar_config['ip_default_action'];
}
/*
else if(count($params)==1 && !in_array($params[0],$sugar_config['modules'])) {

$_REQUEST['module'] = $sugar_config['single_param_module'];
$_REQUEST['action'] = "profile";
$_REQUEST['uname'] = $params[0];

}
*/


 else if(count($params)==1 ) {

$_REQUEST['module'] = $sugar_config['single_param_module'];
$_REQUEST['action'] = $sugar_config['single_param_action'];
$_REQUEST['uname'] = $params[0];


} 



else {
$_REQUEST['module'] = $params[0];
$_REQUEST['action'] = $params[1];

$_REQUEST['params'] = $params;
}

if(!in_array($_REQUEST['module'],$sugar_config['modules'])) {

$_REQUEST['uname'] = $params[0];
$_REQUEST['module'] = $sugar_config['single_param_module'];
}



$modulefile = 'webapp/modules/'.$_REQUEST['module'].'/'.$_REQUEST['module'].'Controller.php';
	if(!file_exists('webapp/modules/'.$_REQUEST['module'].'/'.$_REQUEST['module'].'Controller.php')) {
	die("Module doest not exists.".$modulefile);
	}
	
	$_REQUEST['display'] = array();
	require_once 'webapp/modules/'.$_REQUEST['module'].'/'.$_REQUEST['module'].'Controller.php';
	
	
	
	$methods = get_class_methods($_REQUEST['module']);
	//echo $_REQUEST['module']." ".$_REQUEST['action'];
	//die;
	
		
	
	 
	if(in_array('action_'.$_REQUEST['action'],$methods)) {
	
	$module = new $_REQUEST['module']();
	$module->{'action_'.$_REQUEST['action']}();
	} else {
	if(isset($_REQUEST['uname'])) {
	$_REQUEST['action'] = 'boardprofile';
	$module = new $_REQUEST['module']();
	$module->{'action_'.$_REQUEST['action']}();
	} else {
	$module = new $_REQUEST['module']();
	$module->index();
	
	//die('Invalid URL.'); 
	}
	}
	require_once 'webapp/modules/'.$_REQUEST['module'].'/'.$_REQUEST['module'].'Controller.php';
	$this->loadLayout();
	}

	
	
	 function loadLayout() {
	global $sugar_config;
	require_once 'webapp/layout/header.php';
	foreach($_REQUEST['display'] as $tpl) {
	require $tpl;
	}
	
	//require 'webapp/modules/ip_user/views/webordevice.php';	
	require_once 'webapp/layout/footer.php';
	die;
	}
	
	function getParams() {
	global $sugar_config;
	$params = array();
	
	$baseUrlCount = strlen($sugar_config['base_url']);
	
	$url = substr($_SERVER['REQUEST_URI'],$baseUrlCount);
	
	if($url=='') {
	return $params;
	}
	$params = explode('/',$url);
	
	return $params;
	}

}

$imgPic = new ImgPic();
?>
