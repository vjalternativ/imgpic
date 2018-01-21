<?php
$counter = 0;
			foreach($_REQUEST['likes'] as $image) {
			$counter++;
			
			if($counter ==1) {		 
					 
					 ?>
<div class="row">
  
  <?php } ?>


<div class="col-md-3">
  
<div class="panel panel-info">
<div class="panel-header" style="padding:5px;">

<button class="btn btn-primary" style="position:absolute;right:20px;"   type="button" onclick="saveimage('<?php echo $image->id;?>')">Save</button>
<div class="clearfix"></div>

</div>
<div class="panel-body" >
<a   href="<?php echo $sugar_config['base_url'];?>pic/<?php echo $image->unique_id;?>" style="background: #32556d;">
<img src="<?php echo $image->link;?>" style="width:100%;" />
</a>
</div> 
<div class="panel-footer">

<?php echo substr($image->description,0,250);?>
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


