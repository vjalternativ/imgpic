<br />
<?php
foreach($_REQUEST['boards'] as $board) {

			$counter++;
			
			if($counter ==1) {		 
					 
					 ?>
<div class="row">
  
  <?php } ?>
  <div class="col-md-3">
  
<div class="panel panel-info">

<div class="panel-body" >
       <a href="<?php echo $sugar_config['base_url'].$board['username'].'/'.$board['alias'];?>" >

<?php if(isset($board['image']) && $board['image']!="") {
	?>



    <img src="<?php echo $board['image'];?>"  style="width:100%">



      <?php

	  } 

	  ?></a>
</div> 

<div class="panel-footer">
<div>
       <a href="<?php echo $sugar_config['base_url'].$board['username'].'/'.$board['alias'];?>" >
                    <?php echo $board['name'];?> <br /><?php //echo $board->imgcount;?></a>


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