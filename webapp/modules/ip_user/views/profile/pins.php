<?php
if($_REQUEST['isUser']) {
?>
<button type="button" class="btn btn-primary" onclick="showmodal('webordevice')">Add a Pin</button>
<?php 
} 
?>

<br />
<br />
<?php
$counter = 0;
foreach($_REQUEST['pins'] as $image) {
			$counter++;
			
			if($counter ==1) {		 
					 
					 ?>
<div class="row">
  
  <?php } ?>
  <div class="col-md-3">
  
<div class="panel panel-info">
<div class="panel-header" style="padding:5px;">
<?php if($_REQUEST['isUser']) { ?>
<button onclick="editpin('<?php echo $image['id'];?>','<?php echo $image['bid'];?>')" class="btn btn-default"  type="button">Edit</button>     
<?php
}
?>

<button class="btn btn-primary" style="position:absolute;right:20px;"   type="button" onclick="saveimage('<?php echo $image['id'];?>')">Save</button>
<div class="clearfix"></div>

</div>
<div class="panel-body" >
<a   href="<?php echo $sugar_config['base_url'];?>pic/<?php echo $image['unique_id'];?>" style="background: #32556d;">
<img src="<?php echo $image['link'];?>" style="width:100%;" />
</a>
</div> 

<div class="panel-footer">
<div>

<div class="<?php if($image['description'] !="") { echo bottom-border; }?>" id="img-desc-<?php echo $image['id'];?>"><?php echo substr($image['description'],0,250);?></div>
<div class="border-bottom">

<?php if($_REQUEST['photos'][$image['assigned_user_id']] != "") {
?>
    <img src="<?php echo $_REQUEST['photos'][$image['assigned_user_id']];?>" data-load-state="pending"  data-src="<?php echo $_REQUEST['photos'][$image['assigned_user_id']];?>">
<?php } 
?>

<b>Saved To</b> <?php echo $image['board_name'];?></div>

</div>

</div>
</div>  
  </div>
  
  <?php if($counter == 4) {
  ?>
  </div> 
 <?php
  } 
  ?>
 
 <?php
 
 }
 if($counter !=4) {
 
 ?>
 </div> 
 
 <?php
 
 }
 ?>













   
   





