<?php

$images  =  $_REQUEST['images'];
global $sugar_config;
$cdnurl = '';
if($sugar_config['isenablecdn']) {
	$cdnurl = $sugar_config['cdnurl'];
}


$counter=0;
foreach ($images as $image) {
$counter++;
$link = $image['link'];
if(!empty($image['thumbnail'])) {
	$link  = $image['thumbnail'];
}
?>

  <?php if($counter==1) { ?>
<div class="row">

<?php } ?>


  <div class="col-md-3">
  
  
<div class="panel panel-info">
<div class="panel-body">
<a href="<?php echo $sugar_config['base_url'];?>pic/<?php echo $image['unique_id'];?>">
<img src="<?php echo $cdnurl.$link;?>" style="width:100%;" alt="<?php echo $image['name'];?>" title="<?php echo $image['name'];?>"   />
</a>

</div>

<div class="panel-footer">
<div >
<?php 
if ($image['description']!="") { ?> 

<p><?php echo $image['description'];?></p>
<hr />

<?php }

if($image['website']!="") {

?>
<b>Saved From </b> <?php echo getDomainName($image['website']); ?>
<?php 

}  ?>
 </div>

</div>
</div>  
  </div>


 <?php if($counter==4) { 
 $counter = 0;
 ?>
 </div>
<?php } ?>
<?php
}
?>

  
  
  
<?php if($counter!=0) { 
 ?>
 </div>
<?php } ?>
