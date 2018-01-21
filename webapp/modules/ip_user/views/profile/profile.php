<H1>Board</H1>
  <?php if(isset($_REQUEST['isUser']) && $_REQUEST['isUser']) {

?>
<button class="btn btn-primary" onclick="showmodal('createBoardModal')">Create Board</button>
<br />
<br />

<?php
}
$counter = 0;

foreach($_REQUEST['boards']['general'] as $board) {

			$counter++;
			
			if($counter ==1) {		 
					 
					 ?>
<div class="row">
  
  <?php } ?>
  <div class="col-md-3">
  
<div class="panel panel-info">

<div class="panel-body" >
       <a href="<?php echo $sugar_config['base_url'].$_REQUEST['user']->user_name.'/'.$board->alias;?>" >

<?php if(isset($board->images[0])) {
	?>



    <img src="<?php echo $board->images[0];?>"  style="width:100%">



      <?php

	  } 

	  ?></a>
</div> 

<div class="panel-footer">
<div>
       <a href="<?php echo $sugar_config['base_url'].$_REQUEST['user']->user_name.'/'.$board->alias;?>" >
                    <?php echo $board->name;?> <br /><?php echo $board->imgcount;?></a>


</div>

</div>
</div>  
  </div>
  
  
  
 
  
  
  <?php if($counter == 4) {
  $counter=0;
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

<?php 
require 'webapp/include/paginatetpl.php';
?>

