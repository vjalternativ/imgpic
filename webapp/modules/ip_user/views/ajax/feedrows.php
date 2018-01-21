<?php
$counter = 0;

foreach ($_REQUEST['feedImages'] as $image) {
					 
			$counter++;
			
			if($counter ==1) {		 
					 
					 ?>
<div class="row">
  
  <?php } ?>
  <div class="col-md-3">
  
<div class="panel panel-info">
<div class="panel-header" style="padding:5px;">


<button class="btn btn-default" type="button" id="PinLikeButton-<?php echo $image['id'];?>" onclick="toggleLike('<?php echo $image['id'];?>')" style="position:absolute;">

<i class="fa fa-heart text-default <?php if(in_array($image['id'],$_REQUEST['liked'])) echo 'text-danger'; else echo 'text-default';?>" id="PinLikeButtonHeart-<?php echo $image['id'];?>" >&nbsp;</i></button>
 <button class="btn btn-primary" style="position:absolute;right:20px;"   type="button" onclick="saveimage('<?php echo $image['id'];?>')">Save</button>
<div class="clearfix"></div>

</div>
<div class="panel-body" >
 <a href="<?php echo $sugar_config['base_url'];?>pic/<?php echo $image['unique_id'];?>">
<img src="<?php echo $image['link'];?>" style="width:100%;" />
</a>
</div> 

<div class="panel-footer">
<div>


<div class="<?php if($image['description'] !="") { echo bottom-border; }?>"><?php echo substr($image['description'],0,250);?></div>
<div class="border-bottom">
</div>
<div >
<a href="<?php echo $sugar_config['base_url'].'topic/'.$image['talias'];?>"> 
<?php echo $image['tname'];?>
</a>
</div>


</div>

</div>
</div>  
  </div>
  
  
  
 
  
  
  <?php if($counter == 4) {
  $counter =0;
  ?>
  </div> 
 
  <?php
  
  } 
  ?>
  
  
 
 <?php
 
 }
 if($counter !=0) {
 
 ?>
 </div> 
 
 <?php
 
 }
 ?>