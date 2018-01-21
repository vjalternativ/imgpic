<div id="myModal" class="modal fade in block" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Follow 5 topics</h4>
      </div>
      <div class="modal-body topicmodal-body">
        <?php

$count = 0;

foreach($_REQUEST['rctopics'] as $topic) {

$activeClass = "hidden";



$count++;



if($count==1) {

//$activeClass = "block";

?>
 <div class="row">

<?php



}

?>



  
  <div class="col-md-3" onclick="setTopic('<?php echo $topic['id'];?>','#tick-<?php echo $topic['id'];?>')" id="tick-<?php echo $topic['id'];?>">
  
<div class="panel panel-info">
<div class="panel-body ">
<img src="<?php echo $topic['filename']?>" style="width:100%;" height="130" />

</div>

<div class="panel-footer">
<div ><b><?php echo $topic['name'];?> </b> </div>

</div>
</div>  
  </div>
  
  <?php if($count==4) { 
  $count = 0;
  ?>
  </div>
  <?php } 
  
  
  ?>
  
  
  



<?php





}
if($count !=0) {
  
  ?>
  </div>
  
  <?php
  
  }
?>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="saveTopics()" id="saveTopicsBtn" disabled="disabled" data-dismiss="modal">Done</button>
      </div>
    </div>

  </div>
</div>


<div class="modal-backdrop fade in"></div>

