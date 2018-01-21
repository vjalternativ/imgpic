<?php
require_once 'webapp/layout/top-header.php';

$grid = 12;
if(isset($_REQUEST['ads']['rightsidebar']) && $_REQUEST['hasad']) {
$grid = 10;
}
?>

  <div class="row">
  <div class="col-md-<?php echo $grid;?>">
  <?php if(isset($_REQUEST['ads']['top']) && $_REQUEST['hasad']) {

foreach($_REQUEST['ads']['top'] as $ad) {
echo "<br />";
echo from_html($ad['description']);
}


}
global $sugar_config;
//$shareurl = $_SERVER['PHP_SELF'];
$shareurl = $sugar_config['site_url'].$_SERVER['REQUEST_URI'];
?>  
<div class="panel panel-info">
<div class="panel-header" style="padding:5px;">

<!-- Facebook -->
    <a href="http://www.facebook.com/sharer.php?u=<?php echo $shareurl;?>" target="_blank">
        <img width="30" src="https://simplesharebuttons.com/images/somacro/facebook.png" alt="Facebook" />
    </a>
    
    <!-- Google+ -->
    <a href="https://plus.google.com/share?url=<?php echo $shareurl;?>" target="_blank">
        <img width="30" src="https://simplesharebuttons.com/images/somacro/google.png" alt="Google" />
    </a>
    
    <!-- LinkedIn -->
    <!--
	<a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=https://simplesharebuttons.com" target="_blank">
        <img src="https://simplesharebuttons.com/images/somacro/linkedin.png" alt="LinkedIn" />
    </a>
    
    -->
    
    <!-- Reddit -->
    <a href="http://reddit.com/submit?url<?php echo $shareurl;?>&title=ImgPic" target="_blank">
        <img width="30" src="https://simplesharebuttons.com/images/somacro/reddit.png" alt="Reddit" />
    </a>
    
    <!-- StumbleUpon-->
    <a href="http://www.stumbleupon.com/submit?url=<?php echo $shareurl;?>&title=ImgPic" target="_blank">
        <img width="30" src="https://simplesharebuttons.com/images/somacro/stumbleupon.png" alt="StumbleUpon" />
    </a>
    <!-- Tumblr-->
    <a href="http://www.tumblr.com/share/link?url<?php echo $shareurl;?>&title=ImgPic" target="_blank">
        <img width="30" src="https://simplesharebuttons.com/images/somacro/tumblr.png" alt="Tumblr" />
    </a>
     
    <!-- Twitter -->
    <a href="https://twitter.com/share?url<?php echo $shareurl;?>&text=ImgPic" target="_blank">
        <img width="30" src="https://simplesharebuttons.com/images/somacro/twitter.png" alt="Twitter" />
    </a>

<button class="btn btn-default <?php if(in_array($_REQUEST['image']->id,$_REQUEST['liked'])) echo 'unlike';?> hide" type="button" id="PinLikeButton-<?php echo $_REQUEST['image']->id;?>" onclick="toggleLike('<?php echo $_REQUEST['image']->id;?>')" style="position:absolute;">

<i class="fa fa-heart text-danger" >&nbsp;</i></button>

<button class="btn btn-primary hide" style="position:absolute;right:20px;"   type="button" onclick="saveimage('<?php echo $_REQUEST['image']->id;?>')">Save</button>

<button class="btn btn-default pull-right"    type="button" onclick="window.history.back();">Back</button>
<div class="clearfix"></div>

</div>
<div class="panel-body" style="text-align:center" >


<?php

global $sugar_config;
$cdnurl = '';
if($sugar_config['isenablecdn']) {
        $cdnurl = $sugar_config['cdnurl'];
}



 if($_REQUEST['image']->website!="") { ?>
<a href="<?php echo $_REQUEST['image']->website;?>" rel="nofollow" target="_blank" class="anchor-white">
<?php } ?>
<img src="<?php echo $cdnurl.$_REQUEST['image']->link;?>" style="max-width:100%;" title="<?php echo $_REQUEST['image']->name;?>"  alt="<?php echo $_REQUEST['image']->name;?>" />
<?php if($_REQUEST['image']->website!="") { ?>
</a>
<?php } ?>
</div> 

<div class="panel-footer">
<div>
<?php if($_REQUEST['image']->description !="") {  ?>
<div style="margin-bottom:5px; " id="img-desc-<?php echo $_REQUEST['image']->id;?>"><?php echo $_REQUEST['image']->description;?></div>
<?php } ?>


<div >

 
<?php if($_REQUEST['image']->website!="") { 
														 ?>
<b>Saved From</b> <a href="<?php echo $sugar_config['base_url'];?>source/<?php echo getDomainName($_REQUEST['image']->website); ?>"><?php echo getDomainName($_REQUEST['image']->website); ?></a>

<b>Posted By</b> <a href="<?php echo $sugar_config['base_url'];?><?php echo $_REQUEST['assigned_user']; ?>"><?php echo $_REQUEST['assigned_user']; ?></a>
<button type="button" class="btn btn-info pull-right" style="margin-left:5px;"><a href="<?php echo $_REQUEST['image']->website;?>" rel="nofollow" target="_blank" class="anchor-white">Visit</a></button>
<button type="button" class="btn btn-danger pull-right">Views (<?php echo $_REQUEST['image']->totalviews;?>)</button>
<div class="clearfix"></div>

<?php } ?>

</div>

<?php if(isset($_REQUEST['ads']['bottom'])  && $_REQUEST['hasad'])  {

foreach($_REQUEST['ads']['bottom'] as $ad) {
echo "<br />";
echo from_html($ad['description']);
}


}
?>  


<br />

<h4>Related Pics</h4>

<?php
require_once 'webapp/modules/pic/views/assocpics.php';
?>


</div>

</div>
</div>  
  </div>
  
  <div class="col-md-2">

<?php if(isset($_REQUEST['ads']['rightsidebar']) && $_REQUEST['hasad']) {

foreach($_REQUEST['ads']['rightsidebar'] as $ad) {
echo "<br />";
echo from_html($ad['description']);
}


}
?>  

  
  
  </div>
</div>
					
			
			<?php
			
			require 'webapp/layout/bottom-footer.php';
			?>		 
				

