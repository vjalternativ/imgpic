<?php
require_once 'webapp/modules/ip_user/ip_userController.php';
class ip_home {

function action_index() {


if(isset($_SESSION['uid'])) {
$_REQUEST['module'] = "ip_user";
$_REQUEST['action'] = "index";
$_REQUEST['uname'] = $_SESSION['username'];
$ip_user = new ip_user();

$ip_user->action_index();
return;
//redirect($_SESSION['username']);
}
$_REQUEST['block']="";
if(isset($_REQUEST['error'])) {
$_REQUEST['block'] = "block";
}
display('ip_home/views/default.php');

}








}
?>    

                    
                
               