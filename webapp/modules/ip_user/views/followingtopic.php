
<br />
<button type="button" class="btn btn-primary"><a href="#" class="anchor-white">All Topics</a></button>
<br />
<br />
<?php
$counter = 0;
			foreach($_REQUEST['rcusertopics'] as $topic) {


	$name = $topic->name;

	$alias = $topic->alias;
			$counter++;
			
			if($counter ==1) {		 
					 
					 ?>
<div class="row">
  
  <?php } ?>


<div class="col-md-3">
  
<div class="panel panel-info">
<div class="panel-header" style="padding:5px;">

<button class="btn btn-danger" id="topicFollowBtn-<?php echo $topic->id;?>" style="position:absolute;right:20px;" onclick="toggleTopicFollow('<?php echo $topic->id;?>')"   type="button" >Unfollow</button>
<div class="clearfix"></div>

</div>
<div class="panel-body" >
<a   href="<?php echo $sugar_config['base_url'];?>ip_user/explore/<?php echo $alias;?>" style="background: #32556d;">
<img src="<?php echo $topic->fetched_row['filename'];?>" style="width:100%;" />
</a>
</div> 
<div class="panel-footer">
<b><?php echo $topic->name;?></b>
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





        

        



        

            

            

            

        

    

