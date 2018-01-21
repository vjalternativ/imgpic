<script src="<?php echo $sugar_config['http_base_url'];?>webapp/js/feeds.js"></script>

<?php 


require_once 'webapp/layout/top-header.php';

?>
  
  
  <div class="panel panel-default">
        <?php if(isset($_SESSION['uid'])) {

		?>

<div class="panel-body">



<button class="btn btn-default <?php echo $_REQUEST['class'];?>" onclick="toggleTopicFollow('<?php echo $_REQUEST['topic']['id'];?>')"><?php echo $_REQUEST['follow'];?></button>

<hr />
</div>
<?php } ?>

<div class="panel-header text-center">


                   <b class="h1"><?php echo $_REQUEST['topic']['name'];?></b>
<hr />
                    

</div>


<div class="panel-body text-center">
<?php 

$menus = array();

$menus[0]['page'] = "followers";

$menus[0]['name'] = "Followers";

$menus[0]['count'] = $_REQUEST['followercount'];


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


<?php if(count($_REQUEST['ctopics'])!=0) {

			?>

<h1>Related Topics</h1>



<?php
$counter = 0;
foreach($_REQUEST['ctopics'] as $ctopic) {



$alias = alias_encode($ctopic->name);
	
			$counter++;
			
			if($counter ==1) {		 
					 
					 ?>
<div class="row">
  
  <?php } 
  

  ?>
  
    <div class="col-md-3">
  
<div class="panel panel-info">

<div class="panel-body" >
<a   href="<?php echo $sugar_config['base_url'];?>ip_user/explore/<?php echo $alias;?>" style="background: #32556d;">
<img src="<?php echo $ctopic->filename;?>" title="<?php echo $ctopic->name;?>" alt="<?php echo $ctopic->name;?>" style="width:100%;" />
</a>
</div> 

<div class="panel-footer">
<b><?php echo $ctopic->name;?></b>


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
 
 
 
 
 }
 ?>














<h1>Pics</h1>



<?php
$counter = 0;
foreach($_REQUEST['images'] as $image) {



	
			$counter++;
			
			if($counter ==1) {		 
					 
					 ?>
<div class="row">
  
  <?php } 
  

  ?>
  
 <?php require 'webapp/modules/ip_user/views/pinwrapper.php';?>
   

					
					 
				
  
  <?php if($counter == 4) {
  $counter = 0;
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

</div>
</div> 
  
 
  
  
  
  </div>
  
</div>



        
                                                                        
              
                
                                                                                  
                                                        


                                    
            
                                                    
            
                        
            

    
<?php
require 'webapp/include/paginatetpl.php';

?>

<div id="ajaxmodal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
   
	<div class="modal-content" id="ajaxmodal-content">
	
	</div>
  </div>
</div>





</div>

</div>







