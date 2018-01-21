  <div class="col-md-3">
  
<div class="panel panel-info">
<div class="panel-header" style="padding:5px;">

<button class="btn btn-default <?php if(in_array($image->id,$_REQUEST['liked'])) echo 'unlike';?>" type="button" id="PinLikeButton-<?php echo $image['id'];?>" onclick="toggleLike('<?php echo $image['id'];?>')" style="position:absolute;">

<i class="fa fa-heart text-danger" >&nbsp;</i></button>

<button class="btn btn-primary" style="position:absolute;right:20px;"   type="button" onclick="<?php if(isset($_SESSION['username'])) { ?>saveimage('<?php echo $image['id'];?>')<?php } else { ?>register()<?php } ?>">Save</button>
<div class="clearfix"></div>

</div>
<div class="panel-body" >
<?php
$link  = $image['link'];
if(!empty($image['thumbnail'])) {

$link = $image['thumbnail'];
}
?>
<a   onclick="zoompin('<?php echo $image['id'];?>')" href="<?php echo $sugar_config['base_url'];?>pic/<?php echo $image['unique_id'];?>" style="background: #32556d;">
<img src="<?php echo $link;?>" style="width:100%;" title="<?php echo $image['name'];?>" alt="<?php echo $image['description'];?>" />
</a>
</div> 

<div class="panel-footer">
<div>

<div class="<?php if($image['description'] !="") { echo bottom-border; }?>" id="img-desc-<?php echo $image['id'];?>"><?php echo substr($image['description'],0,250);?></div>
<div class="border-bottom">


<?php if(isset($image['website']) && $image['website']!="") { 
														 ?>
<b>Saved From</b> <?php echo getDomainName($image['website']); ?>
<?php } else {
?>
<b>Saved By</b><?php echo $image['first_name']." ".$image['last_name']; ?>
<?php

} ?>

</div>


</div>

</div>
</div>  
  </div>

					
					 
				

