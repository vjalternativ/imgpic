<?php
$class = "hide";
if($_SESSION['uid']==$_REQUEST['user']->id) {
$class ="";
}
$sclass= "primary";
$follow = "Follow";
if(in_array($_SESSION['uid'],$_REQUEST['followers'])) {
$sclass= "danger";
$follow = "Unfollow";
}
$currentUserProfile = false;
if($_SESSION['username']==$_REQUEST['uname']) {
$currentUserProfile = true;
}
$padding = "";
if(isset($_SESSION['uid'])) {
$padding = "padding-top-60";
}
?>
<div class="panel panel-default">
        <?php if($_REQUEST['isUser']) {

		?>

<div class="panel-body">



<button class="btn btn-info" onclick="showmodal('editprofile')">Edit Profile</button>
<button class="btn btn-danger "><a class="anchor-white" href="<?php echo $sugar_config['base_url'];?>ip_user/logout/">Logout</a></button>


<hr />
</div>
<?php } ?>

<div class="panel-header text-center" style="padding-top:10px;padding-right:10px;">



 <b class="h1"><img src="<?php echo $_REQUEST['user']->photo;?>" width="100" height="100" style="border-radius:50px;" />
 &nbsp;&nbsp;
 <?php echo $_REQUEST['user']->name;?></b>
 
 <?php if(!$currentUserProfile && isset($_SESSION['uid'])) { ?>				
<button id="follow-people-btn" onclick="togglePeopleFollow('<?php echo $_REQUEST['user']->id;?>')" class="btn  btn-<?php echo $sclass;?> pull-right" type="button"><?php echo $follow;?></button>
<div class="clearfix"></div>
<?php } ?>
 
<hr />
                    <p class="text-center">  <?php echo $_REQUEST['user']->description;?></p>
					  <?php if($_REQUEST['user']->website!="") { ?>
					  <hr />
					  <p class="text-center">  <?php echo $_REQUEST['user']->website;?></p>
					  <?php } ?>
					  
					  <hr />

</div>


<div class="panel-body text-center">
<?php 

$menus = array();

$menus[0]['page'] = "board";

$menus[0]['name'] = "Boards";

$menus[0]['count'] = $_REQUEST['boardCount'];



$menus[1]['page'] = "pins";

$menus[1]['count'] = $_REQUEST['pincount'];

$menus[1]['name'] = "Pics";



$menus[2]['page'] = "likes";

$menus[2]['count'] = $_REQUEST['likecount'];

$menus[2]['name'] = "Likes";





$menus[3]['page'] = "following";

$menus[3]['count'] = $_REQUEST['followcount'];

$menus[3]['name'] = "Following";



?>

<ul class="list-inline">

	<?php foreach($menus as $menu) {

	?>

	<li>

                        <a href="<?php echo $sugar_config['base_url'].$_REQUEST['user']->user_name."/".$menu['page'];?>" class="<?php if($_REQUEST['action']==$menu['page']) echo 'active';?>" > 

                                  <div class="BoardCount Module" id="BoardCount-31">
                <span class='value'><?php echo $menu['count'];?></span> <div><?php echo $menu['name'];?></div>    

    

</div>

            </a>

        </li>

	<?php }

	

	?>

        

    </ul>
<hr />
</div>

<div class="panel-body">
<?php loadContent('ip_user/views/profile/'.$_REQUEST['profile']);?>

</div>
</div>


    

    

