<h3>Choose an image to create a Pic</h3>

<?php
$counter = 0;

foreach ($_REQUEST['imgsrcs'] as $src) {
					 
			$counter++;
			
			if($counter ==1) {		 
					 
					 ?>
<div class="row">
  
  <?php } ?>
  <div class="col-md-3">
  
<div class="panel panel-info">
<div class="panel-header" style="padding:5px;">



 <button class="btn btn-primary" style="position:absolute;right:20px;"   type="button" onclick="pinimage('<?php echo $src;?>','<?php echo $_REQUEST['url'];?>')">Save</button>
<div class="clearfix"></div>

</div>
<div class="panel-body" >
<img src="<?php echo $src;?>" style="width:100%;" />

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




<div class="mainContainer hide">
                                    <div class="Module Nags hide">


                                        <div class="Module NagBase NagEmail">
    <div class="centeredWithinWrapper">
                
                            
            <div class="message"><b>Psst.</b> Don't forget to confirm your email! Just look for the message we sent you. <a href="#" id="resendEmail">Resend email</a> or <a href="#" id="editEmail">change your address</a>.</div>
        
                    </div>
</div>
            
        </div>
                    
            
                        
    <div class="FeedPage ImagesFeedPage Module fadeIn" style="min-height: 589px;">


    <h3 class="sectionTitle centeredWithinWrapper">
        Choose an image to create a Pin
    </h3>
    <div class="Grid Module">


<div class="GridItems Module centeredWithinWrapper padItems variableHeightLayout" style="height: 449px;">
    





    
    <?php
	
	foreach ($_REQUEST['imgsrcs'] as $src) {
       //$src = $tag->getAttribute('src');
	 
	   
	?>

        


                    
                                            <div class="item activeItem ui-draggable ui-draggable-disabled ui-state-disabled" aria-disabled="true" style="position:relative; visibility: visible;float:left;">

                                
                                
                                    <div class="Module Pin Pinnable summary" style="visibility: visible;">


        

    
    
        
        
                
    <div class="pinWrapper">
        <div class="pinImageActionButtonWrapper">
            <div class="leftSideButtonsWrapper">
                                                                                                
                                
                            <button onclick="pinimage('<?php echo $src;?>','<?php echo $_REQUEST['url'];?>')" class="Button Module ShowModalButton btn hasText isBrioFlat pinitLocalization primary primaryOnHover repinSmall rounded" type="button">
    


<em></em>
<span class="buttonText">
                        Save
        </span>
        </button>
    
            </div>

            <div class="pinHolder">
                <a class="pinImageWrapper">
                    <div class="hoverMask"></div>
                <img src="<?php echo $src;?>"></a>
            </div>
        </div>
    </div>
</div>
                
                            </div>
                                
                                            
                                
<?php      }

	?>
                                      
                                
                                            
            </div>






</div>




</div></div>
