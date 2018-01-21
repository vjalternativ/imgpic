

<script src="<?php echo $sugar_config['base_url'];?>webapp/js/feeds.js"></script>



<?php
require_once 'webapp/layout/top-header.php';
$topics  =  $_REQUEST['topics'];
 
$counter=0;
foreach ($topics as $topic) {
$counter++;
?>

  <?php if($counter==1) { ?>
<div class="row">

<?php } ?>


  <div class="col-md-3">
  
  
<div class="panel panel-info">

<?php if(isset($_SESSION['uid'])) { ?>
<div class="panel-header" style="padding:5px;">

<button id="topicFollowBtn-<?php echo $topic['id'];?>" onclick="toggleTopicFollow('<?php echo $topic['id'];?>')" class="btn <?php echo $topic['class'];?>" style="position:absolute;right:20px;"   type="button" ><?php echo $topic['follow'];?></button>
<div class="clearfix"></div>

</div>
<?php } ?>
<div class="panel-body">
<a href="<?php echo $sugar_config['base_url'];?>topic/<?php echo $topic['alias'];?>">
<img src="<?php echo $topic['filename'];?>" alt="<?php echo $topic['name'];?>" title="<?php echo $topic['name'];?>" style="width:100%;" />
</a>

</div>

<div class="panel-footer">
<div ><b><?php echo $topic['name'];?></b> </div>

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
<?php }

require 'webapp/include/paginatetpl.php';
require 'webapp/layout/bottom-footer.php';

?>
