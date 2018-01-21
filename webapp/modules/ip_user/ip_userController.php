<?php 

require_once 'custom/include/utils.php';
require_once('custom/include/aws/aws-autoloader.php');
require_once 'custom/include/customlib/Paginate.php';
use Aws\S3\S3Client;  
use Aws\Credentials\Credentials;

$awsLoaderActions = array();
$awsLoaderActions[] ="upPreview";
$awsLoaderActions[] ="createBoard";

class ip_user {




function ip_user($auth = true) {
$nonAuthActions = array();
$nonAuthActions[] = 'login';
$nonAuthActions[] = 'activate';
$nonAuthActions[] = 'signup';
$nonAuthActions[] = 'board';
$nonAuthActions[] = 'password';
$nonAuthActions[] = 'forgot';
$nonAuthActions[] = 'regstration';

//$nonAuthActions[] = 'pins';
//$nonAuthActions[] = 'likes';
//$nonAuthActions[] = 'following';
$nonAuthActions[] = 'boardprofile';
$nonAuthActions[] = 'zoompin';
$nonAuthActions[] = 'ajaxAddToBoardModal';


if(!isset($_SESSION['uid']) && !in_array($_REQUEST['action'],$nonAuthActions) && $auth) {
redirect("ip_user/login");
exit;
} 
else if(in_array($_REQUEST['action'],$nonAuthActions) && isset($_SESSION['uid'])) {
//redirect($_SESSION['username']);
//exit;
}
}

function action_login() {


if(isset($_REQUEST['username_or_email'])) {
$isLogin = $this->dologin($_REQUEST['username_or_email'],$_REQUEST['password']);

if(!$isLogin) {
session_destroy();
$_REQUEST['error'] = "Email or Password is invalid.";
} else {

redirect("ip_user/feeds");
exit;
}
}

display('ip_user/views/login.php');
}

function getUserIdByEmail($email) {
global $bean;
$query = array();
$query['sql'] =  "select bean_id as UserID from email_addr_bean_rel   where email_address_id = (SELECT id FROM email_addresses WHERE email_address = '".$email."' and deleted = '0') and bean_module= 'Users' and deleted = '0'";
$rows = $bean->fetch($query);
return $rows;
}

function dologin($email , $password) {

global $bean;


$query = array();
$query['sql'] =  "select bean_id as UserID,u.user_name from email_addr_bean_rel e left join users u on e.bean_id=u.id  where ((e.email_address_id = (SELECT id FROM email_addresses WHERE email_address = '".$email."' and deleted = '0') and e.bean_module= 'Users' and e.deleted = '0') or u.user_name='".$email."' ) and user_hash=md5('".$password."') and u.status='Active' ";


$rows = $bean->fetch($query);
if(count($rows)>0) {
$_SESSION['uid'] = $rows[0]['UserID'];
$_SESSION['username'] = $rows[0]['user_name'];
setcookie('uid',$_SESSION['uid']);
setcookie('username',$_SESSION['username']);
	
	
return true;
}

return false;


}

function action_logout() {
session_destroy();
unset($_COOKIE['uid']);
unset($_COOKIE['username']);
setcookie('uid',null,-1,'/');
redirect('');
}
function action_board() {
global $current_user;


$_REQUEST['page'] = 'ip_user/views/profile.php';
$_REQUEST['profile'] = 'profile.php';
$_REQUEST['profilepage'] = true;
$this->displayPage();

//display('ip_user/views/feeds.php');

//loadContent('ip_user/views/profile.php');
 

//loadContent('ip_user/views/createboardmodal.php');
//exit;
}

function action_saveTopics() {
global $sugar_config,$bean;
$params['topics'] = $_REQUEST['topics'];
$params['id'] = $_SESSION['uid'];
if(count($params['topics'])==0) {
echo 'failed';
exit;
}



$topics = $_REQUEST['topics'];
$user = new User();
$user->retrieve($_SESSION['uid']);
$user->load_relationship('rc_topic_users');
$count = 0;
foreach($topics as $tid) {
$count++;
$user->rc_topic_users->add($tid);
}

if($count>0) {
echo 'passed';


} else {
echo 'failed';

}
die;


}
function getUserBoards($user,$isId = false) {
if(!$isId) {
$user->load_relationship('rc_board_users');

return $user->get_linked_beans("rc_board_users","","date_entered desc");

}
return '';
}


function getAllCategory() {
global $bean;
$query = array();
$query['table'] = 'rc_category';
$topics = $bean->fetch($query);
return $topics;
}

function getFollowerIds($ruser){
$ruser->load_relationship('users_users_1');
$followers = $ruser->users_users_1->get();
return $followers;
}
function displayPage() {

global $sugar_config,$bean,$db;
 

$_REQUEST['topics'] = $this->getAllCategory();


$_REQUEST['topicIds'] = $_REQUEST['beanIds'];

$query = array();
$query['table'] = 'rc_topic';

$_REQUEST['rctopics'] = $bean->fetch($query);


$sql = "select * from users where user_name='".$_REQUEST['uname']."'";
$query = $db->query($sql);
if($query->num_rows == 0) {
die("Invalid Profile");
}
$row = $db->fetchByAssoc($query);



$user = new User();
$user->retrieve($row['id']);

$_REQUEST['isUser'] = false;
if($_SESSION['username']==$_REQUEST['uname']) {
						$_REQUEST['isUser'] = true;
						
						}

$_REQUEST['user'] = $user;

if(isset($_REQUEST['profilepage']) && $_REQUEST['profilepage']) {
$_REQUEST['meta-title'] = $_REQUEST['user']->user_name." Img Pic - Discover The Amazing And Inspiring Images On The Internet";
$_REQUEST['meta-desc'] = $_REQUEST['user']->description;

}

$_REQUEST['followers'] = $this->getFollowerIds($user);

$imageArray = array();
$user->load_relationship('rc_category_users');




//$boards = $user->rc_board_users->getBeans();
$allboards = $this->getUserBoards($user);


$arrayindex = 1;
if(isset($_REQUEST['pageindex'])) {
	$arrayindex = $_REQUEST['pageindex'];
	 
	
	$_REQUEST['meta-title'] .= ' Page '.$arrayindex;
} else {
	$_REQUEST['pageindex'] = 1;
}
$allboardData = $allboards;
if(!$allboards) {
$allboardData = array('s');
}
$paginate = new Paginate();
$paginate->array  = $allboardData;
$paginate->noresult =16; 
$paginate->endto = 3;
$paginate->index = $arrayindex;
$paginate->url = '/'.$_REQUEST['uname'].'/';

$info  = $paginate->process();

$boards = $info['data'];
if(!$allboards) {
$boards = array();
}
$_REQUEST['pagelist'] = $info['pagelist'];
$_REQUEST['prevurl'] = $info['prevurl'];
$_REQUEST['nexturl'] = $info['nexturl'];
$_REQUEST['pagingurl'] = $paginate->url;


$_REQUEST['boards'] = array();
$_REQUEST['boards']['is_secret'] = array();
$_REQUEST['boards']['general'] = array();
$_REQUEST['boardCount'] = count($boards);
$_REQUEST['user']->load_relationship("rc_image_users_1");
$_REQUEST['likes'] = $_REQUEST['user']->rc_image_users_1->getBeans();
$_REQUEST['liked'] = array_keys($_REQUEST['likes']);
$_REQUEST['likecount'] = count($_REQUEST['liked']);
$imageIds = array();
$image = new rc_image();
$pincount = 0;

foreach($boards as $board) {


$board->load_relationship('rc_image_rc_board');
$tempImgArray = $board->get_linked_beans("rc_image_rc_board","rc_image","date_modified desc");
$pincount += count($tempImgArray);
$imgcount =  count($tempImgArray);
$tempImgArray = array_values($tempImgArray);



if($board->is_secret=='Yes') {
$_REQUEST['boards']['is_secret'][$board->id] = $board;
$_REQUEST['boards']['is_secret'][$board->id]->imgcount = $imgcount;
$_REQUEST['boards']['is_secret'][$board->id]->images = array();
} else {
$_REQUEST['boards']['general'][$board->id] = $board;

$_REQUEST['boards']['general'][$board->id]->images = array();

$_REQUEST['boards']['general'][$board->id]->imgcount = $imgcount;
}


for($i=0;$i<4;$i++) {

$img = "";

if(isset($tempImgArray[$i])) {
$img = $tempImgArray[$i]->link;
}

if($board->is_secret == "Yes") {
$_REQUEST['boards']['is_secret'][$board->id]->images[] = $img;
} else {
$_REQUEST['boards']['general'][$board->id]->images[] = $img;

}



}




}
$_REQUEST['pincount'] = $pincount;





















$_REQUEST['boardBeans'] = $boards;













/*









$topic = new rc_category();
$board = new rc_board();
$image = new rc_image();
$totalImageCounter =0;
$flag = true;




foreach($topicIds as $tid) {

$topic->retrieve($tid);
$topic->load_relationship('rc_board_rc_category');
$boardIds = $topic->rc_board_rc_category->get();
foreach($boardIds as $bid) {
$board->retrieve($bid);
$board->load_relationship('rc_image_rc_board');
$params = array(
    'where' => array(
        'lhs_field' => 'status',
        'operator' => '=',
        'rhs_value' => 'Active',
        ),
		'limit' => '2',
		'order_by' => 'rc_image.date_entered desc'
    );
$images = $board->rc_image_rc_board->getBeans($params);
foreach($images as $image) {
$totalImageCounter++;

$imageArray[$image->id] =  $image;

if(count($imageArray) > 14) {
$flag = false;
}




}

if(!$flag) {
break;
}







}


if(!$flag) {
break;
}




}
*/

//$_REQUEST['images'] = $imageArray;
$_REQUEST['incTopicModal']=false;

$topicIds  = $_REQUEST['user']->rc_category_users->get();
$_REQUEST['userTtopicIds'] = $topicIds;


$_REQUEST['user']->load_relationship("rc_topic_users");
$_REQUEST['rcusertopics']  = $_REQUEST['user']->rc_topic_users->getBeans();
$rctopicIds  = array_keys($_REQUEST['rcusertopics']);
$_REQUEST['userTopicIds'] = $rctopicIds;

$_REQUEST['followcount'] = count($rctopicIds);

if(count($rctopicIds)==0 && $_SESSION['username'] == $_REQUEST['uname']) {
$_REQUEST['incTopicModal']=true;
}
display('ip_user/views/feeds.php');


}

function getTopicImages($topicIds) {
global $db;
$sql = "

SELECT i.id,i.link,i.website,i.description,i.unique_id,ib.date_modified,u.first_name,u.user_name as busername,u.last_name,b.name,b.alias as balias,b.id as boardid, ct.rc_topic_rc_categoryrc_topic_idb topic
from rc_image i 
left join rc_image_rc_board_c ib on i.id=ib.rc_image_rc_boardrc_image_ida and ib.deleted = 0 
left join rc_board_rc_category_c bc on ib.rc_image_rc_boardrc_board_idb = bc.rc_board_rc_categoryrc_board_idb and bc.deleted=0
left join rc_topic_rc_category_c ct on bc.rc_board_rc_categoryrc_category_ida = ct.rc_topic_rc_categoryrc_category_ida and ct.deleted=0
left join  rc_board_users_c  bu on ib.rc_image_rc_boardrc_board_idb = bu.rc_board_usersrc_board_idb and bu.deleted=0 
left join users u on bu.rc_board_usersusers_ida = u.id and u.deleted=0 and u.status = 'Active'
left join rc_board b on ib.rc_image_rc_boardrc_board_idb=b.id and b.deleted=0
where i.deleted=0 and  ct.rc_topic_rc_categoryrc_topic_idb IN ('".implode("','",$topicIds)."') and i.status='Active' and i.website !=''
order by ib.date_modified desc";

$page = 1;

if(isset($_SESSION['feedpageindex'])) {
$page =$_SESSION['feedpageindex'];
}

$start = ($page-1)*8;

$sql = "select i.*,rt.alias as talias,rt.name as tname from rc_topic_rc_image_1_c ti left join rc_image i on ti.rc_topic_rc_image_1rc_image_idb = i.id
LEFT JOIN rc_topic rt on ti.rc_topic_rc_image_1rc_topic_ida = rt.id and rt.deleted=0
 where ti.deleted=0 and ti.rc_topic_rc_image_1rc_topic_ida IN ('".implode("','",$topicIds)."') and i.status='Active' and i.website !=''
 GROUP BY i.id order by ti.date_modified desc LIMIT ".$start.",8 ";

$query = $db->query($sql);
$counter =0;
$images = array();
while($row = $db->fetchByAssoc($query)){
//if(isset($images[$row['id']])){
//continue;
//}
$counter++;

   

//if($row['website']!="")
$images[$row['id']] = $row;
//if($counter>14) {
//break;
//}
}

if($counter>0) {

$_SESSION['feedpageindex']++;
}
return $images;
}

function action_feeds() {
global $sugar_config,$current_user,$db;
$user = new User();
$user->retrieve($_SESSION['uid']);
$_REQUEST['incTopicModal']=false;
$user->load_relationship('rc_topic_users');
$rctopicIds  = $user->rc_topic_users->get();
if(count($rctopicIds)==0) {
$_REQUEST['incTopicModal']=true;
}

$sql = "select i.*,rt.alias as talias,rt.name as tname from rc_topic_rc_image_1_c ti left join rc_image i on ti.rc_topic_rc_image_1rc_image_idb = i.id
LEFT JOIN rc_topic rt on ti.rc_topic_rc_image_1rc_topic_ida = rt.id and rt.deleted=0
 where ti.deleted=0 and ti.rc_topic_rc_image_1rc_topic_ida IN ('".implode("','",$rctopicIds)."') and i.status='Active' and i.website !=''
 GROUP BY i.id order by ti.date_modified desc ";

$_REQUEST['pagingurl'] = $sugar_config['http_base_url'].'ip_user/feeds/';
require 'webapp/include/paginate.php';

$query = $db->query($sql);
$images = array();
while($row  = $db->fetchByAssoc($query)) {
	$images[] = $row;
}
$_REQUEST['images'] =$images;

$_REQUEST['boardBeans'] = $this->getUserBoards($user);

$allTopics = array();
if(count($rctopicIds)==0) {
$sql = "select * from rc_topic where deleted=0 order by date_entered desc";
$query = $db->query($sql);
while($row=$db->fetchByAssoc($query)) {
$allTopics[] = $row;

}

}
$_REQUEST['rctopics'] = $allTopics;
display('ip_user/views/userfeeds.php');
}

function action_index() {
global $bean,$db;
redirect('ip_user/feeds');
$_REQUEST['page']  = 'ip_user/views/pages/feeds.php';
$this->displayPage();
$topicIds = $_REQUEST['userTopicIds'];
$_SESSION['feedpage']  = 1;
$_REQUEST['feedImages'] = $this->getTopicImages($topicIds);
}

function action_activate() {
global $sugar_config;
$params= $_REQUEST['params'];
$id = $params[2];
$key = $params[3];



$user = BeanFactory::getBean("Users",$id);
if(isset($user->id) && $user->id!='')
{


if($user->authenticate_id == $key) {
$user->authenticate_id="";
$user->status="Active";
$user->save();
$result['error'] = "Profile Acticated Successfully.";

} else {
$result['error'] = "Invalid Activation Link.";


}


} else {


$result['error'] = "User Not Found.";


}





$_REQUEST['error'] = $result['error'];
display('ip_user/views/login.php');
}

function userIdByUserName($username) {
global $db;
$sql = "SELECT id,user_name from users where user_name='".$username."' and deleted='0'";
$query = $db->query($sql);
if($row=$db->fetchByAssoc($query)) {
return $row['id'];
}

return '';
}

function userIdByEmail($email) {
global $db;
$sqlGetUserIdByEmail = "select bean_id as UserID from email_addr_bean_rel where email_address_id = (SELECT id FROM email_addresses WHERE email_address = '".$email."' and deleted = '0') and bean_module= 'Users' and deleted = '0'";
$result = $db->query($sqlGetUserIdByEmail);
if($row = $db->fetchByAssoc($result)) {
return $row['UserID'];
}

return '';

}

function action_signup($link=true,$source='portal') {
global $bean,$sugar_config,$db,$sugar_config;


if($_REQUEST['email']=="" || $_REQUEST['password']==""  ) {
$_REQUEST['error'] ="Please fill all the fields.";
$_REQUEST['block'] = 'block';


display('ip_home/views/default.php');
return;
} else  {


if(isset($_REQUEST['username'])) {
$string = explode('_',$_REQUEST['username']);
if($string[0]=='imgpic') {
$_REQUEST['error'] ="Please choose diffrent username.";
$_REQUEST['block'] = 'block';
display('ip_home/views/default.php');
return;
}
}
$params = array();
$params["email"]=$_REQUEST['email'];
$params["password"]=$_REQUEST['password'];
$params["username"]=$_REQUEST['username'];
$params["gender"]=$_REQUEST['gender'];
$params["link"]=$link;
echo "<pre>";
print_r($params);
echo "</pre>";
$user = new User();
$string = explode('@',$_REQUEST['email']);
$username = "imgpic_".$string[0];
if($link) {
$username = $_REQUEST['username'];
} 
$uid =  $this->userIdByEmail($_REQUEST['email']);
if($uid!='') {
$user->retrieve($uid);
$result['status'] = 1;
$result['error'] = "Email Already Exist.";
$result['id'] = $user->id;
$result['username'] = $user->user_name;

if(!$link)
{
$user->source =  $source;
$user->gender = $_REQUEST['gender'];
$user->status = "Active"; 
$user->save();

return $result;
}

} else {
$uid =  $this->userIdByUserName($username);
if($uid!='') {

$user->retrieve($uid);

if(!$link) {
$user->first_name = $_REQUEST['first_name'];
$user->last_name = $_REQUEST['last_name'];
$user->status = "Active";
$user->source =$source;
$user->authenticate_id = "";
$user->save();


} 


$result['status'] = 2;
$result['error'] = "Username already Exist.";
$result['id'] = $user->id;
$result['username'] = $user->user_name;
if(!$link)
{

return $result;
}

} else {



$user->user_name = $username;
$user->last_name = $username;
$user->email1 = $_REQUEST['email'];
$user->user_hash = md5($_REQUEST['password']);
$user-> status ='Inactive';
$user->gender = $_REQUEST['gender'];
$user->employee_status = 'Active';
$user->portal_only = 1;
$user->source =$source;
$user->authenticate_id = rand(1000,9999);
$user->save();



$email =  new stdClass();
$email->to = $_REQUEST['email'];
$email->subject = "ImgPic User Activation";
$email->body_html = "Hello ".$username.",<br /> Thank you for registering. Please click on below link to activate your account.<br />";
$email->body_html .= "<a href='".$sugar_config['http_base_url']."ip_user/activate/".$user->id."/".$user->authenticate_id."'>Activate</a>";
sendInstantMail($email);
$result['status'] =3;
$result['error'] = "Profile created successfully.";
$result['id'] = $user->id;
$result['username'] = $user->user_name;



}



}


if($result['status'] == '3' && $result['username']!='') {
$_SESSION['uid'] = $result['id'];
$_SESSION['username'] =  $result['username'];
$_SESSION['email'] = $params['email'];
$_SESSION['last_name'] = $result['username'];
redirect($result['username']);
exit;
} 
else {

$_REQUEST['error'] =$result['error'];
$_REQUEST['block'] = 'block';
display('ip_home/views/default.php');

}



}





}











function isDuplicateBoard($table,$column,$value) {
global $db;

$user = BeanFactory::getBean("Users",$_SESSION['uid']);
$user->load_relationship("rc_board_users");
$boards = $user->rc_board_users->getBeans();
foreach($boards as $board) {
if($board->name == $value) {

return true;
}

}

return false;

}


function createBoard() {


if($_REQUEST['boardName']=='') {
$_SESSION['error'] ="Board name can not be empty.";
redirect($_SESSION['username']);
exit;
}

$board = new rc_board();

if(isset($_REQUEST['id'])) {
$board  = BeanFactory::getBean("rc_board",$_REQUEST['id']);
}

$check = $this->isDuplicateBoard('rc_board','alias',alias_encode($_REQUEST['boardName']));
if($check && alias_encode($board->name) != alias_encode($_REQUEST['boardName']) ) {

$_SESSION['error'] ="Try a different board name (you've already got one like this).";
redirect($_SESSION['username']);
exit;
}
$board->name = $_REQUEST['boardName'];
$board->alias = "";
//$board->is_secret = $_REQUEST['secret'];
$board->description = $_REQUEST['description'];
//$board->created_by = $_SESSION['uid'];

$board->portal = 1;
$board->save();

if(!isset($_REQUEST['id'])) {
$board->load_relationship('rc_board_users');
$board->rc_board_users->add($_SESSION['uid']);
}

$board->load_relationship('rc_board_rc_category');

if(isset($_REQUEST['id']) && $board->rc_board_rc_categoryrc_category_ida!=$_REQUEST['category']) {

$board->rc_board_rc_category->delete($_REQUEST['category']);
$board->rc_board_rc_category->add($_REQUEST['category']);
}
if(!isset($_REQUEST['id'])) {
$board->rc_board_rc_category->add($_REQUEST['category']);
}
return $board;
}

function action_createBoard(){

$_REQUEST['boardid'] = "";

if(isset($_REQUEST['boardName']) && $_REQUEST['boardName']!='') {
$board = $this->createBoard();
$_REQUEST['boardBean'] = $board;
$_REQUEST['boardid'] = $board->id;

}

if(isset($_REQUEST['imgsrc'])) {
$this->action_pinBoard();
}




redirect($_SESSION['username']);
}


function upDeviceToAws($file) {

global $sugar_config;
$ext = getExtension($file['name']);
$actual_image_name = create_guid().".".$ext;
$bucket = $sugar_config['aws_preview_bucket'];


//$credentials = new Credentials($sugar_config['aws_public_key'], $sugar_config['aws_secret_key']);

//$s3Client = S3Client::factory(array('credentials' => $credentials, 'version' => '2006-03-01', 'region'=>$sugar_config['aws_region'],'http' => ['verify' => false]));

/*
$result = $s3Client->putObject(array(
    'Bucket'       => $bucket,
    'Key'          => $actual_image_name,
    'Body'   => file_get_contents($file['tmp_name']),
    'ContentType'  => 'text/plain',
    'ACL'          => 'public-read',
    'StorageClass' => 'REDUCED_REDUNDANCY',
    
));
return $result['ObjectURL'];
*/
$img = file_get_contents($file['tmp_name']);
//$image->link  = $result['ObjectURL'];
$path = $_SERVER['DOCUMENT_ROOT'].'/upload/images/';
$x = file_put_contents($path.$actual_image_name,$img);
return '/upload/images/'.$actual_image_name;
}
function uploadImageToAWS() {

global $sugar_config;

$image = new rc_image();
$image->status = 'Inactive';
$image->website = $_REQUEST['website'];
$ext = getExtension($_REQUEST['imgsrc']);
$actual_image_name = create_guid().".".$ext;
$bucket = $sugar_config['aws_bucket'];

/*
$credentials = new Credentials($sugar_config['aws_public_key'], $sugar_config['aws_secret_key']);
$s3Client = S3Client::factory(array('credentials' => $credentials, 'version' => '2006-03-01', 'region'=>$sugar_config['aws_region'],'http' => ['verify' => false]));
$result = $s3Client->putObject(array(
    'Bucket'       => $bucket,
    'Key'          => $actual_image_name,
    'Body'   => file_get_contents($_REQUEST['imgsrc']),
    'ContentType'  => 'text/plain',
    'ACL'          => 'public-read',
    'StorageClass' => 'REDUCED_REDUNDANCY',
    
));
*/


if(substr($_REQUEST['imgsrc'],0,1)=='/') {

$_REQUEST['imgsrc'] = $_SERVER['DOCUMENT_ROOT'].$_REQUEST['imgsrc'];
//$_REQEST['imgsrc'] = '.'.$_REQUEST['imgsrc'];

}
$img = file_get_contents('./upload/images/208c7c65-8f6c-6ed3-cc0e-59ff5200c81f.jpg');
$img = file_get_contents($_REQUEST['imgsrc']);
//$image->link  = $result['ObjectURL'];
$path = $_SERVER['DOCUMENT_ROOT'].'/upload/images/';
$image->link = '/upload/images/'.$actual_image_name;
$x = file_put_contents($path.$actual_image_name,$img);


$image->assigned_user_id = $_SESSION['uid'];
if(isset($_REQUEST['description']) && $_REQUEST['description']!="") {
$image->description = $_REQUEST['description'];
}

$image->skip_hook=true;
$image->save();


$image->load_relationship('rc_image_rc_board');
$image->rc_image_rc_board->add($_REQUEST['boardid']);

$response = array('type'=>'Info | ','msg'=>'saved successfully');
if(!$x) {
$response = array('type'=>'Info |','msg'=>'Image is not compatible with system');

}


return $response;
}

function setBoardImageRel() {


if($_REQUEST['imgsrc']!='' && $_REQUEST['boardid']!="") {

if(!isset($_REQUEST['boardBean'])) {

$_REQUEST['boardBean'] = BeanFactory::getBean('rc_board',$_REQUEST['boardid']);
}

$board = $_REQUEST['boardBean'];

$board->load_relationship('rc_image_rc_board');
$board->rc_image_rc_board->add($_REQUEST['imgsrc']);
}

}

function action_pinBoard() {
global $sugar_config;

$response = array("type"=>'Info!',"msg"=>"saved successfully");

$string = $_REQUEST['imgsrc'];
if(!empty($string)){
$ext = getExtension($string);
$isnew = false;

if(in_array($ext,$sugar_config['valid_img_ext'])) {
$response  = $this->uploadImageToAWS();

} else {

$this->setBoardImageRel();

}
}
echo json_encode($response);

die;
}


function action_pins() {
global $db;;
if(isset($_REQUEST['params'][1])) {
$tab = $_REQUEST['params'][1];
$uid = $this->userIdByUserName($_REQUEST['uname']);
if($uid =="") {
 die("Invalid Profile");
}
$isCuser = true;
if($uid!=$_SESSION['uid']) {
$isCuser = false;
}
$user  = new User();
$user->id = $uid;
$user->load_relationship('rc_board_users');
$boards = $user->rc_board_users->getBeans();
$images = array();
foreach($boards as $bid=>$board) {

$board->load_relationship('rc_image_rc_board');
$tempImages = $board->rc_image_rc_board->getBeans();
$tempUsers = array();

foreach($tempImages as $key => $image) 
{
if(!$isCuser && $image->status=='Inactive') {
continue;
}
$image->board_name = $board->name;
$img = array();
$img['link'] = $image->link;
$img['board_name'] = $board->name;
$img['description'] = $image->description;
$img['id'] = $image->id;
$img['bid'] = $board->id;
$img['assigned_user_id'] = $image->assigned_user_id;
$img['unique_id'] = $image->unique_id;
$tempUsers[$image->assigned_user_id] = ""; 
$images[$img['id']] =$img;
}

}

$ids = array_keys($tempUsers);
$sql = "select * from users where id in ('".implode("','",$ids)."')";
$query =  $db->query($sql);
while($tuple = $db->fetchByAssoc($query)) {
$tempUsers[$image->assigned_user_id] = $tuple['photo'];
}



$_REQUEST['pins'] = $images;
$_REQUEST['photos'] = $tempUsers;
$_REQUEST['page']='ip_user/views/profile.php';
$_REQUEST['profile'] = "pins.php";
$this->displayPage();
display('ip_user/views/webordevice.php');
display('ip_user/views/weblink.php');
display('ip_user/views/modal/uploadpin.php');


} else {

redirect($_SESSION['username']);
}
}








function action_picfromweb() {
global $sugar_config;
$url = $_REQUEST['url'];
$host = "http:/";
if(substr(strtolower($url),0,5) != 'https') {	
$host = "http:/";
}

$images = array();
$_REQUEST['uname'] = $_SESSION['username']; 
$html = file_get_contents($url);
//die($html);

$file_info = new finfo(FILEINFO_MIME_TYPE);
// See constant value http://php.net/manual/en/fileinfo.constants.php#113687 
 $mime_type = $file_info->buffer($html);
$strarray = explode('/',$mime_type);


if($strarray && isset($strarray[0]) && $strarray[0]=='image') {
$images[] = $url;
}else {
$doc = new DOMDocument();
@$doc->loadHTML($html);
$domain = getDomainName($url);
$dlen = count($domain);
$urlext = getExtension($url);
//$title = $doc->getElementsByTagName('title');
//$_REQUEST['webtitle'] = $title->item(0)->nodeValue;
$tags = $doc->getElementsByTagName('img');
$images = array();
$restrictedExt = $sugar_config['valid_img_ext'];


if(in_array($urlext,$restrictedExt)) {
$images[] = $url;
}
else {
foreach ($tags as $tag) {

$src = $tag->getAttribute('src');
//echo $src."<br/>";
  	   $string = explode('.',$src);
	   $count = count($string);
	   if(substr(strtolower($src),0,4) != 'http') {
	   
	  // $src = str_replace("//","",$src);
	  $str = explode('?',$src);
	  $isq = false;
	  
	  if(count($str)>1) {
	  $isq = true;
	  
	   }
	  //$src = $str[0];
	 // $string = explode('.',$src);
	 //$count = count($string);
	 if(substr(strtolower($src),0,2) == '//') {
	 
	 $src =  "http:".$src;
	 }
	 
	   else if(substr(strtolower($src),0,1) == '/') {
	   
	     $src = $host.$src;
	  
	   } else {
	   
	   
	   $xstr= explode('/',$src);
	   $xs = $xstr[0];
	   
	   
	   
	   $src=  str_replace(" ","",$src);
	   
	  	$src = $host.'/'.$domain.'/'.$src; 
		 
	   
	   }
	  
	   }
	   
//echo $src."<br />";	   
	   
	   if(isset($string[$count-1])) {
	   
	   $ext = $string[$count-1];
	   $extarray = explode('?',$ext);
	   $ext = $extarray[0];
	   
	   $len = strlen($src);
	   if(isset($extarray[1])) {
	   $lastlen = strlen($extarray[1]);
	   // $src = substr($src, 0, ($lastlen+1)*-1);
		//$src = file_get_contents($src);
		//$src .= '?'.rand(1000,9999);
	   }
	   if(!in_array($ext,$restrictedExt) && !$isq) {
	   continue;
	   }
	   
	   } else {
	   continue;
	   }
	   
	   $images[] = $src;
	   
}
}
}
$_REQUEST['imgsrcs'] = $images;
$_REQUEST['page']  = 'ip_user/views/pages/crawler.php';
$this->displayPage();
display('ip_user/views/addtoboardmodal.php');



}



function action_zoompin() {

if(isset($_REQUEST['params'][2]) && $_REQUEST['params'][2]!="" && isset($_REQUEST['params'][3]) && $_REQUEST['params'][3]!=="") {


$_REQUEST['image'] = BeanFactory::getBean('rc_image',$_REQUEST['params'][2]);
$boardId = $_REQUEST['params'][3];
$_REQUEST['board'] = BeanFactory::getBean('rc_board',$_REQUEST['params'][3]);
$_REQUEST['creator'] = BeanFactory::getBean('Users',$_REQUEST['board']->rc_board_usersusers_ida);
loadContent("ip_user/views/modal/zoompin.php");
die;






}





}



function action_upPreview() {
global $sugar_config;
$_FILES['img']['status'] = 0;


if(isset($_FILES['img']['name']) && $_FILES['img']['error']==0 && $_FILES['img']['name']!="") {

$ext = getExtension($_FILES['img']['name']);

if(in_array($ext,$sugar_config['valid_img_ext'])) {

$_FILES['img']['tmp_name'] = $this->upDeviceToAws($_FILES['img']);


$_FILES['img']['status'] = 1;
} 



} 
echo json_encode($_FILES['img']);

die;



}

function action_toggleLike(){

if(isset($_REQUEST['params'][2]) && $_REQUEST['params'][2]!="") {

$image = BeanFactory::getBean("rc_image",$_REQUEST['params'][2]);
$image->load_relationship("rc_image_users_1");
$userIds = $image->rc_image_users_1->get();
if(in_array($_SESSION['uid'],$userIds)) {
$image->rc_image_users_1->delete($_SESSION['uid']);
} else {
$image->rc_image_users_1->add($_SESSION['uid']);
}




}


die;

}


function action_likes() 
{

$_REQUEST['page']='ip_user/views/profile.php';
$_REQUEST['profile'] = "likes.php";
$this->displayPage();

}


function action_following() 
{

$_REQUEST['page']='ip_user/views/profile.php';
$_REQUEST['profile'] = "following.php";
$this->displayPage();

}



function action_explore() {

global $bean;
if(isset($_REQUEST['params'][2]) && $_REQUEST['params'][2]!="") 

{

$name = $_REQUEST['params'][2];
$query = array();
$query['table'] = "rc_topic";
$query['where'] = " alias = '".$name."' ";
$rows = $bean->fetch($query);


if(count($rows)==0) {
die("Topic Not Found");

}
$user = BeanFactory::getBean("Users",$_SESSION['uid']);


$_REQUEST['topics'] = $this->getAllCategory();

$topic = new rc_topic();
$topic->retrieve($rows[0]['id']);

$_REQUEST['topic'] = $rows[0];

$_REQUEST['meta-title'] = $_REQUEST['topic']['name'];
$_REQUEST['meta-desc'] = $_REQUEST['topic']['description'];



$topic->load_relationship("rc_topic_rc_topic");
$_REQUEST['ctopics'] = $topic->rc_topic_rc_topic->getBeans();

$ctopicIds = array_keys($_REQUEST['ctopics']);

$_REQUEST['images'] = $this->getTopicImages(array($rows[0]['id']));

$topic->load_relationship("rc_topic_users");
$_REQUEST['followers'] = $topic->rc_topic_users->get();
$user->load_relationship("rc_topic_users");
$mytopics = $user->rc_topic_users->get();
$_REQUEST['followercount'] = count($_REQUEST['followers']);



$_REQUEST['follow'] = "Follow";
$_REQUEST['class'] = "primary";
if(in_array($rows[0]['id'],$mytopics)){
$_REQUEST['follow'] = "Unfollow";
$_REQUEST['class'] = "";
}


$_REQUEST['boardBeans'] = $this->getUserBoards($user);

display("ip_user/views/explore.php");
display('ip_user/views/addtoboardmodal.php');

}



}


function action_followTopic() {

if(isset($_REQUEST['params'][2]) && $_REQUEST['params'][2]!="") {

$topicId = $_REQUEST['params'][2];
$topic = BeanFactory::getBean("rc_topic",$topicId);
$topic->load_relationship('rc_topic_users');
$userIds = $topic->rc_topic_users->get();
if(in_array($_SESSION['uid'],$userIds)) {
$topic->rc_topic_users->delete($_SESSION['uid']);
} else {

$topic->rc_topic_users->add($_SESSION['uid']);
}

}
die;
}


function action_followingTopics() {

if(!isset($_REQUEST['params'][2]) || $_REQUEST['params'][2]=="") { die;} 

 $user = BeanFactory::getBean("Users",$_REQUEST['params'][2]);

$user->load_relationship("rc_topic_users");
$_REQUEST['rcusertopics']  = $user->rc_topic_users->getBeans();

loadContent('ip_user/views/followingtopic.php');
die;

}
function action_followingPeople() {
global $db;
//$uid = $_SESSION['uid'];

if(!isset($_REQUEST['params'][2]) || $_REQUEST['params'][2]=="") { die;} 

 $user = BeanFactory::getBean("Users",$_REQUEST['params'][2]);
$user->load_relationship("users_users_1");

$_REQUEST['followingusers']  = $user->users_users_1->getBeans();
$userIds = array_keys($_REQUEST['followingusers']);


$rusers = array();
$ruser = new User();
foreach($userIds as $uid) {
$ruser->retrieve($uid);
$ruser->load_relationship('users_users_1');
$followers = $ruser->users_users_1->get();
$rusers[$uid]['count'] = count($followers);
$rusers[$uid]['followers'] = $followers;
}


$_REQUEST['followers'] = $rusers;

$sql = "SELECT * from rc_board_users_c where deleted=0 and rc_board_usersusers_ida in ('".implode("','",$userIds)."')";
$query = $db->query($sql);
$fusers = array();
$boardIds = array();
while($row = $db->fetchByAssoc($query)) {
$fusers[$row['rc_board_usersusers_ida']]['board'] = $row['rc_board_usersrc_board_idb']; 
$boardsIds[] = $row['rc_board_usersrc_board_idb'];
}


$boards = array();

$sql = "select * from  rc_image_rc_board_c  where deleted=0 and rc_image_rc_boardrc_board_idb in ('".implode("','",$boardIds)."')";
$query = $db->query($sql);
while($row = $db->fetchByAssoc($query)) {
$boards[$row['rc_image_rc_boardrc_board_idb']][] = $row;

}



$_REQUEST['boards'] = $boards;
$_REQUEST['fusers'] = $fusers;


loadContent('ip_user/views/followingpeople.php');
die;
}

function action_followingBoard() {
if(!isset($_REQUEST['params'][2]) || $_REQUEST['params'][2]=="") { die;} 

 $user = BeanFactory::getBean("Users",$_REQUEST['params'][2]);
 $user->load_relationship('rc_board_users_1');
 $followingboards = $user->rc_board_users_1->getBeans();
$boards = array();
 foreach($followingboards as $key=>$board){

$boards[$key]['name'] = $board->name;
$boards[$key]['id'] = $board->id;
$boards[$key]['alias'] = $board->alias;
$boards[$key]['username'] = $board->rc_board_users_name;

	$params = array(
    'limit' => '1',
    );

$board->load_relationship('rc_image_rc_board');
$images = $board->rc_image_rc_board->getBeans($params);

$boards[$key]['image'] = "";
foreach($images as $image){
$boards[$key]['image'] = $image->link;
}


}

$_REQUEST['boards'] = $boards;
loadContent('ip_user/views/followingboard.php');
die;

}

function action_boardprofile() {
global $db,$bean;
if(!isset($_REQUEST['params'][1])) {
die("something went wrong in this board");
}



$uid = $_SESSION['uid'];
$_REQUEST['isUser'] = true;
if($_SESSION['username'] != $_REQUEST['params'][0]) {
$_REQUEST['isUser'] = false;
$uid =  $this->userIdByUserName($_REQUEST['params'][0]);
if($uid=='') {
die($_REQUEST['params'][0]."Profile not found");
}


}


$user = BeanFactory::getBean("Users",$uid);

$user->load_relationship('rc_board_users');
$linkedBoardIds = $user->rc_board_users->get();




$_REQUEST['pageindex'] = 1;
$query = array();
$query['table'] = "rc_board";
$query['where'] = "alias = '".$_REQUEST['params'][1]."'";
$rows = $bean->fetch($query);
if(count($rows)==0) {
	$_REQUEST['uname'] = $_REQUEST['params'][0];
	$alias = $_REQUEST['params'][1];
	if(is_numeric($alias)) {
		$_REQUEST['pageindex'] = $alias;
		$this->action_board();
		return;
	}
die("Board Not Found.");
}


$$boardId = $rows[0];
foreach($rows as $row) {

if(in_array($row['id'],$linkedBoardIds)) {
$boardId = $row['id'];
break;
}

}







$_REQUEST['user'] = $user;




$board = BeanFactory::getBean("rc_board",$boardId);

$board->load_relationship("rc_image_rc_board");

$params = array(
        'orderby' => 'date_modified  DESC'
    );
$beans = $board->get_linked_beans("rc_image_rc_board","rc_image","date_modified desc");
//$beans = $board->get_linked_beans('rc_image_rc_board','rc_image'); 

$board->load_relationship("rc_board_users_1");
$followers = $board->rc_board_users_1->getBeans();
$followerIds = array_keys($followers);

$_REQUEST['followerIds'] = $followerIds;
$user->load_relationship("rc_image_users_1");
$_REQUEST['likes'] = $user->rc_image_users_1->getBeans();
$_REQUEST['liked'] = array_keys($_REQUEST['likes']);

$_REQUEST['board'] = $board;
$_SESSION['cboard'] = $board;
$arrayindex = 1;
$_REQUEST['meta-title'] = $board->name." Img Pic ".$_REQUEST['user']->user_name;
$_REQUEST['meta-desc'] = $board->description;

if(isset($_REQUEST['params'][2])) {
	$arrayindex  = $_REQUEST['params'][2];
	$_REQUEST['meta-title'] =$_REQUEST['meta-title']. ' Page '. $_REQUEST['params'][2];
	
}

$paginate = new Paginate();
if($beans) {
$paginate->array  = $beans;

}else {
$paginate->array  = array('a');
}
$paginate->noresult = 20;
$paginate->endto = 3;
$paginate->index = $arrayindex;
$paginate->url = '/'.$_REQUEST['uname'].'/'.$_REQUEST['params'][1].'/';
$info  = $paginate->process();
if(!$beans) {
$info['data'] = array();
}

$_REQUEST['pagelist'] = $info['pagelist'];
$_REQUEST['prevurl'] = $info['prevurl'];
$_REQUEST['nexturl'] = $info['nexturl'];
$_REQUEST['pagingurl'] = $paginate->url;
$_REQUEST['images'] = $info['data'];



$_REQUEST['pincount'] = count($beans);
$_REQUEST['followercount'] = count($followers);

$cuser = $user;
if(!$_REQUEST['isUser']) {
$cuser = BeanFactory::getBean("Users",$_SESSION['uid']);
}
$_REQUEST['boardBeans'] = $this->getUserBoards($cuser);
$_REQUEST['topics'] = $this->getAllCategory();

display('ip_user/views/boardprofile.php');
display('ip_user/views/webordevice.php');
display('ip_user/views/weblink.php');
display('ip_user/views/modal/uploadpin.php');
display('ip_user/views/addtoboardmodal.php');

}


function action_saveProfile() {

$uid = $_SESSION['uid'];

$data = BeanFactory::getBean("Users",$uid);
$data->website = $_REQUEST['website'];
$data->first_name = $_REQUEST['first_name'];
$data->last_name = $_REQUEST['last_name'];
$data->location = $_REQUEST['location'];
$data->user_name = $_REQUEST['user_name'];
$data->description = $_REQUEST['description'];
$data->photo = $this->uploadImageAws($uid);
$data->save();
redirect("");
}
function action_checkUserNameExist($isAjax=true) {

global $bean;
$uid = $_SESSION['uid'];
$username = $_REQUEST['user_name'];
$query['table'] = "users";
$query['where'] = " user_name = '".$username."' and id!='".$uid."'";
$rows = $bean->fetch($query);


if(count($rows) ==0) {
echo json_encode(array("error"=>0,"msg"=>""));
} else {
echo json_encode(array("error"=>1,"msg"=>"Username already exist"));
}

die;


}




function uploadImageAws($id) {
if(isset($_FILES['attachment']) && $_FILES['attachment']['name']!="" && $_FILES['attachment']['error']=='0') {
global $sugar_config;


$valid_formats = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP");
$bucket=$sugar_config['aws_bucket'];
//$credentials = new Credentials($sugar_config['aws_public_key'], $sugar_config['aws_secret_key']);

//$s3Client = S3Client::factory(array('credentials' => $credentials, 'version' => '2006-03-01', 'region'=>$sugar_config['aws_region'],'http' => ['verify' => false]));


$name = $_FILES['attachment']['name'];
$size = $_FILES['attachment']['size'];
$tmp = $_FILES['attachment']['tmp_name'];
$ext = getExtension($name);

if(in_array($ext,$valid_formats))
{

// File size validation
if($size<(1024*1024))
{
$actual_image_name = $id.".".$ext;

move_uploaded_file($tmp,'upload/images/'.$actual_image_name);
/*
$result = $s3Client->putObject(array(
    'Bucket'       => $bucket,
    'Key'          => $actual_image_name,
    'SourceFile'   => $tmp,
    'ContentType'  => 'text/plain',
    'ACL'          => 'public-read',
    'StorageClass' => 'REDUCED_REDUNDANCY',
    
));
return $result['ObjectURL'];

*/
return 'upload/images/'.$actual_image_name;
}

}


}

return "";
}


function action_updateBoard() {

$id = $_REQUEST['id'];

$board = BeanFactory::getBean("rc_board",$id);
$board->load_relationship('rc_board_users');
$users = $board->rc_board_users->get();

if(!in_array($_SESSION['uid'],$users)) {
redirect('');
exit();
}


$this->createBoard();
redirect("");




}




function action_editpin() {

$id = $_REQUEST['id'];
$bid = $_REQUEST['bid'];
$image = beanFactory::getBean("rc_image",$id);
$user = BeanFactory::getBean("Users",$_SESSION['uid']);
$user->load_relationship("rc_board_users");
$_REQUEST['boards'] = $user->rc_board_users->getBeans();
$_REQUEST['image'] =$image;
$_SESSION['editpinbid'] = $bid;

loadContent("ip_user/views/modal/editpin.php");
die;



}



function action_savePinInfo() {


if($_REQUEST['id']!="" && $_SESSION['editpinbid']!="") {

$image  = BeanFactory::getBean("rc_image",$_REQUEST['id']);

if(isset($_REQUEST['description']))
$image->description = $_REQUEST['description'];


if(isset($_REQUEST['website']) )
$image->website = $_REQUEST['website'];

if(isset($_REQUEST['description']) || isset($_REQUEST['website']))
$image->skip_hook=true;
$image->save();


if($_REQUEST['bid']!=$_SESSION['editpinbid']) {

$image->load_relationship("rc_image_rc_board");
$image->rc_image_rc_board->delete($_SESSION['editpinbid']);
$image->rc_image_rc_board->add($_REQUEST['bid']);

}





}


die;
}



function action_password() {

$_REQUEST['error-msg'] = "";
$error['100'] = "User not found.";
$error['200'] = "Please check your mailbox for temporary password.";

if(isset($_REQUEST['params'][2])) {

$_REQUEST['error-msg'] = $error[$_REQUEST['params'][2]];

}
display('ip_user/views/modal/password.php');


}

function action_forgot() {

global $db;
$emailto =  $_POST['passwordResetSearch'];

$rows  = $this->getUserIdByEmail($emailto);

if(count($rows) == 0) {

$error = "100";


} else { 

$id =  $rows[0]['UserID'];

$tempPass = rand(1000,9999);

$sql  = "UPDATE users SET user_hash = md5('".$tempPass."') WHERE id = '".$id."'";
$db->query($sql);



$email =  new stdClass();
$email->to = $emailto;
$email->subject = "ImgPic User Password Change";
$email->body_html = "Your temporary password is ".$tempPass."<br />";
$status = sendInstantMail($email);
$error = "200";

}

redirect('ip_user/password/'.$error);
die; 



}

function action_regstration() {

if(isset($_SESSION['uid'])) {
$_REQUEST['module'] = "ip_user";
$_REQUEST['action'] = "index";
$_REQUEST['uname'] = $_SESSION['username'];

$this->action_index();
return;
//redirect($_SESSION['username']);
}
$_REQUEST['block']="";
if(isset($_REQUEST['error'])) {
$_REQUEST['block'] = "block";
}
display('ip_home/views/default.php');


}




function action_followBoard() {

if(isset($_REQUEST['params'][2]) && $_REQUEST['params'][2]!="") {

$topicId = $_REQUEST['params'][2];
$topic = BeanFactory::getBean("rc_board",$topicId);
$topic->load_relationship('rc_board_users_1');
$userIds = $topic->rc_board_users_1->get();
if(in_array($_SESSION['uid'],$userIds)) {
$topic->rc_board_users_1->delete($_SESSION['uid']);
} else {

$topic->rc_board_users_1->add($_SESSION['uid']);
}

}
die;
}









function action_followPeople() {

if(isset($_REQUEST['params'][2]) && $_REQUEST['params'][2]!="") {

$peopleId = $_REQUEST['params'][2];
$people = BeanFactory::getBean("Users",$peopleId);
$people->load_relationship('users_users_1');
$userIds = $people->users_users_1->get();
if(in_array($_SESSION['uid'],$userIds)) {
$people->users_users_1->delete($_SESSION['uid']);
} else {

$people->users_users_1->add($_SESSION['uid']);
}

}
die;
}

function action_loadFeeds() {

$user = new User();
$user->retrieve($_SESSION['uid']);

$user->load_relationship('rc_topic_users');
$topicIds = $user->rc_topic_users->get();


$_SESSION['feedpage']++;
$_REQUEST['feedImages'] = $this->getTopicImages($topicIds);

require 'webapp/modules/ip_user/views/ajax/feedrows.php';
die;



}
function action_ajaxAddToBoardModal(){
global $current_user;
$_REQUEST['topics'] = $this->getAllCategory();
$_REQUEST['boardBeans'] = $this->getUserBoards($current_user);
echo '<link rel="stylesheet" href="https://imgpic.org/webapp/style/bootstrap.min.css">';
echo '<link rel="stylesheet" href="https://imgpic.org/webapp/style/custom.css">';
require 'webapp/modules/ip_user/views/addtoboardmodal.php';

die;

}
}
