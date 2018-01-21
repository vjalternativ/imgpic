<?php
class topic {

function action_all() {

global $db,$current_user,$sugar_config;

$likedTopicIds = array();

if(isset($_SESSION['uid'])) {
$user = BeanFactory::getBean("Users",$_SESSION['uid']);
$user->load_relationship("rc_topic_users");
$likedTopicIds  = $user->rc_topic_users->get();

//$likedTopicIds = $current_user->rc_topic_users->get();

}


$sql = "select * from rc_topic where deleted=0 order by date_entered desc";
$query = $db->query($sql);
$topics = array();

$_REQUEST['pagingurl'] = $sugar_config['http_base_url'].'topic/all/';
require 'webapp/include/paginate.php';

$_REQUEST['meta-title'] = 'Img Pic | Topic Page '.$_REQUEST['page'];
foreach($data as $row) {
$follow = "Follow";
$class = "btn-primary";
if(in_array($row['id'],$likedTopicIds)) {
$follow = "Unfollow";
$class = "btn-danger";
}

$row['follow'] = $follow;
$row['class'] = $class;
$topics[] = $row;
}

$_REQUEST['topics'] = $topics;

display('topic/views/default.php');
}


function index() {

require_once 'webapp/modules/ip_user/ip_userController.php';


global $bean,$db,$sugar_config;
if(isset($_REQUEST['params'][1]) && $_REQUEST['params'][1]!="") 

{

$name = $_REQUEST['params'][1];
$query = array();
$query['table'] = "rc_topic";
$query['where'] = " alias = '".$name."' ";
$rows = $bean->fetch($query);

if(count($rows)==0) {
die("Topic Not Found");

}
$_SESSION['feedpageindex'] = 1;

$ip_user = new ip_user(false);

$user = BeanFactory::getBean("Users",$_SESSION['uid']);


$_REQUEST['topics'] = $ip_user->getAllCategory();

$topic = new rc_topic();
$topic->retrieve($rows[0]['id']);

$_REQUEST['topic'] = $rows[0];

$_REQUEST['meta-title'] = $_REQUEST['topic']['name'];
$_REQUEST['meta-desc'] = $_REQUEST['topic']['description'];



$topic->load_relationship("rc_topic_rc_topic");
$_REQUEST['ctopics'] = $topic->rc_topic_rc_topic->getBeans();

$ctopicIds = array_keys($_REQUEST['ctopics']);

$topicIds = array($rows[0]['id']);

$sql = "select i.*,rt.alias as talias,rt.name as tname from rc_topic_rc_image_1_c ti left join rc_image i on ti.rc_topic_rc_image_1rc_image_idb = i.id
LEFT JOIN rc_topic rt on ti.rc_topic_rc_image_1rc_topic_ida = rt.id and rt.deleted=0
 where ti.deleted=0 and ti.rc_topic_rc_image_1rc_topic_ida IN ('".implode("','",$topicIds)."') and i.status='Active' and i.website !=''
 GROUP BY i.id order by ti.date_modified desc  ";

$_REQUEST['pagingurl'] = $sugar_config['http_base_url'].'topic/'.$name.'/';
require 'webapp/include/paginate.php';

$_REQUEST['meta-title'] = $name.' | Img Pic | Topic Page '.$_REQUEST['page'];

$_REQUEST['images'] = $data;
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


$_REQUEST['boardBeans'] = $ip_user->getUserBoards($user);
display("ip_user/views/explore.php");
display('ip_user/views/addtoboardmodal.php');

}

}

}
