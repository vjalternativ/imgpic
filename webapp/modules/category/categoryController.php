<?php
class category {

function index() {

global $db,$sugar_config;
$cat = $_REQUEST['params'][1];
if($cat == "") {
die("category not found");
}

$id = "";
$sql = "select id from rc_category where alias = '".$cat."'";
$query = $db->query($sql);
if($row = $db->fetchByAssoc($query)) {

$id = $row['id'];

$_REQUEST['meta-title'] = 'Img Pic | '. $row['name'];
$_REQUEST['meta-description'] = $row['description'];

} else  {
die("category not found");
}
$_REQUEST['pagingurl'] = $sugar_config['http_base_url'].'category/'.$cat.'/';
$sql = "SELECT i.* from rc_image i LEFT JOIN rc_image_rc_board_c ib on i.id=ib.rc_image_rc_boardrc_image_ida and ib.deleted=0
		LEFT JOIN rc_board_rc_category_c bc  on ib.rc_image_rc_boardrc_board_idb = bc.rc_board_rc_categoryrc_board_idb and bc.deleted=0
		WHERE bc.rc_board_rc_categoryrc_category_ida = '".$id."' and i.deleted=0 and i.status='Active' order by i.date_entered desc";
require 'webapp/include/paginate.php';
$_REQUEST['images'] = $data;

$_REQUEST['meta-title'] =  $cat. ' Img Pic | Category Page '.$_REQUEST['page'];
display('category/views/images.php');
}



function action_all() {

global $sugar_config;
if(isset($_SESSION['uid']) && !isset($_REQUEST['params'])) {
$_REQUEST['module'] = "ip_user";
$_REQUEST['action'] = "index";
$_REQUEST['uname'] = $_SESSION['username'];


$ipuser = new ip_user();
$ipuser->action_index();
return true;
}
//$_REQUEST['meta-title'] = "Img Pic - Discover The Amazing And Inspiring Images On The Internet";
//$_REQUEST['meta-desc'] = "A Image sharing, Hosting, Uploading service that allows members to &quot;pic&quot; images or Gifs to their board Also includes standard social networking features";
//$_REQUEST['meta-keywords'] = 'Image Upload, Free Image Hosting, Photo Upload, Picture Upload, Upload Pictures, Upload Photo, Photo Sharing, Share Photos, Photo Sharing Sites, Upload Image, Image Hosting, Photo Storage Sites, Photo Sharing Site, Image Hosting Free, Image Sharing, Picture Site, Picture Sites, Picture Sharing Sites, Share Pictures, Upload A Photo, Picture Sharing, Share Image, Image Share, Photo Site, Picture Hosting, Picture Host, Host Pictures, Host Image, Upload Pics, Pic Host, Image Pic, Upload Pictures Online, Upload Image Online, Upload Photos Online, Upload A Picture, Free Picture Upload, Upload An Image, Free Image Upload, Upload Image Free, Image Upload Free, Anonymous Photo Sharing, Best Photo Share, Photo Storage Site, Public Photo Sharing, Image Hosting Services';
global $db;
//rc_category
$_REQUEST['pagingurl'] = $sugar_config['http_base_url'].'category/all/';

$sql = "select * from rc_category where deleted =0";
require 'webapp/include/paginate.php';
$_REQUEST['categories'] = $data;
$_REQUEST['meta-title'] = 'Img Pic | Category page '.$_REQUEST['page'];
display('ip_home/views/categories.php');
}


}
?>
