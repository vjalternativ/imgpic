<script src="<?php echo $sugar_config['http_base_url'];?>webapp/js/feeds.js"></script>


<?php
require_once 'webapp/layout/top-header.php';
 ?>
  
  
  <div class="panel panel-default">
        <?php if($_REQUEST['isUser']) {

		?>

<div class="panel-body">



<button class="btn btn-info" onclick="showmodal('editprofile')">Edit Profile</button>
<button class="btn btn-danger "><a class="anchor-white" href="<?php echo $sugar_config['base_url'];?>ip_user/logout/">Logout</a></button>


<hr />
</div>
<?php } ?>

<div class="panel-header text-center padding-10">


                   <b class="h1"><?php echo $_REQUEST['board']->name;?></b>
				   
				   <?php if(isset($_SESSION['uid']) && !$_REQUEST['isUser']) { 
				   
				   $follow = "Follow";
				   $class = "primary";
				   if(in_array($_SESSION['uid'],$_REQUEST['followerIds'])) {
				   
				   $follow = "Unfollow";
				   $class = "danger";
				   
				   }
				   ?>
				   
				   <button class="btn btn-<?php echo $class;?> pull-right" id="follow-board-btn" onclick="toggleBoardFollow('<?php echo $_REQUEST['board']->id;?>')"><?php echo $follow;?></button>
				   <div class="clearfix"></div>

				   <?php } ?>
<hr />
                    <p class="text-center">  <?php echo $_REQUEST['board']->description;?></p>
<hr />
</div>


<div class="panel-body text-center">
<?php 

$menus = array();

$menus[0]['page'] = "pics";

$menus[0]['name'] = "Pics";

$menus[0]['count'] = $_REQUEST['pincount'];


$menus[1]['page'] = "followers";

$menus[1]['count'] = $_REQUEST['followercount'];

$menus[1]['name'] = "Followers";






?>

<ul class="list-inline">

	<?php foreach($menus as $menu) {

	?>

	<li>

                        <a href="#" > 

                                  <div class="BoardCount Module" id="BoardCount-31">
                <span class='value'><?php echo $menu['count'];?></span> <div><?php echo $menu['name'];?></div>    

    

</div>

            </a>

        </li>

	<?php }

	

	?>

        

    </ul>
<hr />
</div>

<div class="panel-body">

<?php if($_REQUEST['isUser']) { ?>
<button class="btn btn-primary" onclick="showmodal('editboard')">Edit Board</button>
<button class="btn btn-info" onclick="showmodal('webordevice')">Save a pic</button>

<?php } ?>
<br />
<br />




<?php
$counter = 0;
foreach($_REQUEST['images'] as $image) {
	
	if(!$_REQUEST['isUser'] && $image->status=="Inactive") {
continue;
}
			$counter++;
			
			if($counter ==1) {		 
					 
					 ?>
<div class="row">
  
  <?php } 
  
  require 'webapp/modules/ip_user/views/include/pinobj.php';

  ?>
  
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




</div>
</div> 
  
 <?php 
require 'webapp/include/paginatetpl.php';
?>
  
  
  
  </div>
  
</div>



        
                                                                        
              
                
                                                                                  
                                                        


                                    
            
                                                    
            
                        
            

    



<?php loadContent('ip_user/views/modal/editboard.php');?>


<div id="ajaxmodal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
   
	<div class="modal-content" id="ajaxmodal-content">
	
	</div>
  </div>
</div>





</div>

</div>



