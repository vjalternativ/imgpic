<?php
class pic {
	
	function index() {
	global $db;
	$id = $_REQUEST['params'][1];

	
	$rc_image = new rc_image();
	
	$rc_image->retrieve_by_string_fields(array('unique_id' => $id ));
	
	$_REQUEST['meta-title'] = $rc_image->description." | Img Pic | ".$rc_image->assigned_user_name;
	$_REQUEST['meta-desc'] = $rc_image->description. " | Img Pic - Discover The Amazing And Inspiring Images On The Internet";
	$_REQUEST['meta-image'] = $rc_image->link;
	$topic = new rc_topic();
	$_REQUEST['assigned_user'] = $rc_image->assigned_user_name;	
	$rc_image->load_relationship('rc_topic_rc_image_1');
	$topics = $rc_image->rc_topic_rc_image_1->get();
	$topicId = "";
	
	$hasad = false;
	if(isset($topics[0])) {
	$topicId = $topics[0];
	$topic->retrieve($topicId);
	if($topic->hasad) {
		$hasad = true;
	}
	
	}
	$imageIds = array();
	if($topicId!="") {
	$sql = "SELECT * from rc_topic_rc_image_1_c where rc_topic_rc_image_1rc_topic_ida = '".$topicId."' and deleted=0  group by rc_topic_rc_image_1rc_image_idb order by rand() limit 20";
	$qry = $db->query($sql);
	while($row = $db->fetchByAssoc($qry)) {
	$imageIds[] = $row['rc_topic_rc_image_1rc_image_idb'];
	}
	
	}
	
	
	$relatedPics = array();
	if(count($imageIds)!=0) {
	
	$sql = "SELECT * from rc_image where id in ('".implode("','",$imageIds)."') and deleted=0 order by rand()";
	$qry = $db->query($sql);
	while($row = $db->fetchByAssoc($qry)) {
	$relatedPics[] = $row;
	}
	
	
	}
	
	$_REQUEST['images'] = $relatedPics;
	$_REQUEST['image'] = $rc_image;
	$_REQUEST['isPicPage'] = true;
 	$_REQUEST['hasad'] = $hasad;
	$rc_image->totalviews++;
	$rc_image->save(); 
	
	$_REQUEST['ads'] = array();
	if($rc_image->status == 'Active') {
	$sql = "SELECT * FROM rc_ads where status='Active' and deleted=0 and page='picdetailview' order by date_entered desc";
	$qry = $db->query($sql);
	while($row = $db->fetchByAssoc($qry)) {
	 $_REQUEST['ads'][$row['position']][] = $row;
	}
	}
	
	
	display('ip_user/views/modal/zoompin.php');
	
	
	}
	
	
	function action_popularPics() {
global $db,$sugar_config;
if(isset($_SESSION['uid']) && !isset($_REQUEST['params'])) {
$_REQUEST['module'] = "ip_user";
$_REQUEST['action'] = "index";
$_REQUEST['uname'] = $_SESSION['username'];


require_once 'webapp/modules/ip_user/ip_userController.php';

$ipuser = new ip_user();
$ipuser->action_index();
return true;
}

$_REQUEST['meta-title'] = "Img Pic - Discover The Amazing And Inspiring Images On The Internet";
$_REQUEST['meta-desc'] = "A Image sharing, Hosting, Uploading service that allows members to &quot;pic&quot; images or Gifs to their board Also includes standard social networking features";
$_REQUEST['meta-keywords'] = 'Image Upload, Free Image Hosting, Photo Upload, Picture Upload, Upload Pictures, Upload Photo, Photo Sharing, Share Photos, Photo Sharing Sites, Upload Image, Image Hosting, Photo Storage Sites, Photo Sharing Site, Image Hosting Free, Image Sharing, Picture Site, Picture Sites, Picture Sharing Sites, Share Pictures, Upload A Photo, Picture Sharing, Share Image, Image Share, Photo Site, Picture Hosting, Picture Host, Host Pictures, Host Image, Upload Pics, Pic Host, Image Pic, Upload Pictures Online, Upload Image Online, Upload Photos Online, Upload A Picture, Free Picture Upload, Upload An Image, Free Image Upload, Upload Image Free, Image Upload Free, Anonymous Photo Sharing, Best Photo Share, Photo Storage Site, Public Photo Sharing, Image Hosting Services';
$sql ="select count(*) as likecount,riu.rc_image_users_1rc_image_ida,ri.* from rc_image_users_1_c riu
LEFT JOIN rc_image ri on riu.rc_image_users_1rc_image_ida = ri.id and ri.deleted=0 
WHERE riu.deleted =0 and ri.status='Active' group by riu.rc_image_users_1rc_image_ida order by likecount desc limit 100";
$sql = "select * from rc_image where status='Active' order by totalviews desc ,unique_id desc ";
$qry = $db->query($sql);
$_REQUEST['pagingurl'] = $sugar_config['http_base_url'].'pic/popularPics/';
require 'webapp/include/paginate.php';
if(isset($_REQUEST['params'][2]))
$_REQUEST['meta-title'] = 'Img Pic | Popular pics page '.$_REQUEST['page'];



$_REQUEST['images'] = $data;
display('ip_home/views/popularpics.php');

}


function action_recentPics() {
global $db,$sugar_config;

$sql ="select * from rc_image  
WHERE deleted =0 and status='Active' order by unique_id desc";

$_REQUEST['pagingurl'] = $sugar_config['http_base_url'].'pic/recentPics/';
require 'webapp/include/paginate.php';

$_REQUEST['images'] = $data;
$_REQUEST['meta-title'] = 'Img Pic | Recent pics page '.$_REQUEST['page'];
display('ip_home/views/recentpics.php');

}

}

?>
