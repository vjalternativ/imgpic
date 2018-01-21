<script src="<?php echo $sugar_config['http_base_url'];?>webapp/js/feeds.js"></script>


  <?php 
  
  require_once 'webapp/layout/top-header.php';
  loadContent('ip_user/views/error.php');?>
   <?php loadContent($_REQUEST['page']);?>
  
 
  
  
  
  </div>
  
</div>



        
                                                                        
              
                
                                                                                  
                                                        


                                    
            
                                                    
            
                        
            

    



<?php 

if($_REQUEST['incTopicModal']) {
loadContent('ip_user/views/topicmodal.php');
} else {
loadContent('ip_user/views/addtoboardmodal.php');
}

if($_REQUEST['action'] == 'board') {
loadContent('ip_user/views/createboardmodal.php');

}
if($_REQUEST['isUser']) {
loadContent('ip_user/views/modal/editprofile.php');
//loadContent('ip_user/views/modal/validationpopup.php');
}
 ?>
 
<?php //loadContent('ip_user/views/webordevice.php'); ?>
<?php //loadContent('ip_user/views/weblink.php');?>
<!--<div class="ModalManager Module" id="ModalManager-9"></div>-->


<div id="ajaxmodal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
   
	<div class="modal-content" id="ajaxmodal-content">
	
	</div>
  </div>
</div>

<div id="ajaxmodal-a" class="ModalManager Module">
 </div>



</div>

</div>