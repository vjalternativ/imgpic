<br />
<?php
foreach($_REQUEST['followingusers'] as $people) {

			$counter++;
			
			if($counter ==1) {		 
					 
					 ?>
<div class="row">
  
  <?php } ?>
  <div class="col-md-3">
  
<div class="panel panel-info">

<div class="panel-body" >
       <a href="<?php echo $sugar_config['base_url'].$people->user_name;?>" >

<?php if(isset($people->photo) && $people->photo!="") {
	?>



    <img src="<?php echo $$people->photo;?>"  style="width:100%">



      <?php

	  } 

	  ?></a>
</div> 

<div class="panel-footer">
<div>
       <a href="<?php echo $sugar_config['base_url'].$people->user_name;?>" >
                    <?php echo $people->first_name." ".$people->last_name;?> <br /><?php //echo $board->imgcount;?></a>


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



<?php 

	

foreach($_REQUEST['followingusers'] as $people) {


break;
$pins = 0;

foreach($_REQUEST['fusers'] as $bid) {



$count = 0;

if(in_array($bid,$_REQUEST['boards'])) {

$count = count($_REQUEST['boards'][$bid]);

}



$pins += $count;

}





$follow = "Follow";

$class ="primary";

if(in_array($_SESSION['uid'],$_REQUEST['followers'][$people->id]['followers'])) {

$follow = "Unfollow";

$class = "";

}



?>



 <div class="item  ui-draggable ui-draggable-disabled ui-state-disabled" aria-disabled="true">

                    <div class="Module User draggable gridItem">

    

    <a href="<?php  echo $sugar_config["base_url"].$people->user_name;?>" class="userWrapper" data-element-type="64" title="More from WordPress.com">



    

        <h3 class="username">

            

           <?php echo $people->name;?>

            

        </h3>

                <p class="userStats">

        <span class="value"><?php echo $pins;?></span> <span class="label">Pins</span>

        <span class="value"><?php echo $_REQUEST['followers'][$people->id]['count'];?></span> <span class="label">followers</span>

                </p>

        <div class="userThumbs">

            <span class="focusThumbContainer">

                <span class="hoverMask"></span>

    <img src="https://s-media-cache-ak0.pinimg.com/avatars/wordpressdotcom_1384227686_140.jpg" class="userFocusImage" data-load-state="pending" alt="WordPress.com">



            </span>

                    <span class="thumbContainer ">

                        <span class="hoverMask"></span>

    <img src="https://s-media-cache-ak0.pinimg.com/75x75/a3/e6/76/a3e676adb3ed03d5092584c692b751d9.jpg" class="userPin thumb" data-load-state="pending">

                    </span>

                    <span class="thumbContainer  rightWrap">

                        <span class="hoverMask"></span>

                        

                            

    



    <img src="https://s-media-cache-ak0.pinimg.com/75x75/61/7e/b9/617eb98ab027dad3a69b77dced10ee20.jpg" class="userPin thumb" data-load-state="pending">



                        

                    </span>

                

            

                

                    

                    

                    <span class="thumbContainer ">

                        <span class="hoverMask"></span>

                        

                            

    



    <img src="https://s-media-cache-ak0.pinimg.com/75x75/e8/f5/b6/e8f5b64499dc277ae8a758334733771f.jpg" class="userPin thumb" data-load-state="pending">



                        

                    </span>

                

                    

                    

                    <span class="thumbContainer  rightWrap">

                        <span class="hoverMask"></span>

                        

                            

    



    <img src="https://s-media-cache-ak0.pinimg.com/75x75/68/7f/4e/687f4e4e0949893730e971e438dac820.jpg" class="userPin thumb" data-load-state="pending">



                        

                    </span>

                

            

            

        </div>

    



    </a>

    



    



    <button class="Button FollowButton Module UserFollowButton btn gridItem hasText notNavigatable <?php echo $class;?> rounded" data-element-type="62" type="button">







    









<span class="buttonText">

            

            <?php echo $follow;?>

        </span>

        

</button>

    

    

    







</div>

                



                

            </div>

        

   

<?php } ?>