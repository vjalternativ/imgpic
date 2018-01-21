

<?php

$cats  =  $_REQUEST['categories'];


//echo "<pre>";
//print_r($cats);
//die;

require_once 'webapp/layout/top-header.php';
?>



 <?php 
 
 $counter = 0;
 foreach($cats as $item)
 {
	$counter++;
	
	
	if($counter == 1) {
 ?> 
<div class="row">
  <?php
  }
  ?>
  <div class="col-md-3">
  
  
<div class="panel panel-info">
<div class="panel-body">
<a href="<?php echo $sugar_config['base_url'];?>category/<?php echo $item['alias'];?>">
<img src="<?php echo $item['filename'];?>" style="width:100%;" />
</a>
</div>

<div class="panel-footer">
<div ><b><?php echo $item['name'];?></b> </div>

</div>
</div>  
  </div>


<?php if($counter == 4) {

$counter = 0;
?>
 </div>
<?php } ?>





  <?php
  
  
  
  
  
  
  }
  
  
  if($counter !=0) {
  ?>
  </div>
  <?php
  
  }
  
  
  require 'webapp/include/paginatetpl.php';
  require 'webapp/layout/bottom-footer.php';
  
  ?>
  
  
  
  