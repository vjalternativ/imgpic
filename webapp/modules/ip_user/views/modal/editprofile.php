<div id="editprofile" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
   
	<div class="modal-content">
      <form class="standardForm" method="post" action="<?php echo $sugar_config['base_url'];?>ip_user/saveProfile" enctype="multipart/form-data"  id="editprofileform">
	  <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Profile</h4>
      </div>
      <div class="modal-body">
    
	<div class="form-group">
	
	<label>First Name</label>
	<input type="text"  name="first_name" id="userFirstName" class="form-control" value="<?php echo $_REQUEST['user']->first_name;?>">
	</div>
	
	<div class="form-group">
	<label>Last Name</label>
	<input type="text" class="form-control" name="last_name" id="userLastName" value="<?php echo $_REQUEST['user']->last_name;?>">
	</div>
	<?php 

	$img = $sugar_config['base_url'].'webapp/img/default_75.png';

	if($_REQUEST['user']->photo != "") {

	$img = $_REQUEST['user']->photo;

	}

	?>
	<div class="form-group">
	<label>Photo</label>
	<input type="file" name="attachment" class="form-control"  />
	</div>
	
	
	<div class="form-group">
	<label>Username</label>
	<input type="text" name="user_name" class="form-control" id="user_name" value="<?php echo $_REQUEST['user']->user_name;?>">
	</div>
	
	
	<div class="form-group">
	
	<label>Description</label>
	<textarea name="description" id="userAbout" class="form-control"> <?php echo $_REQUEST['user']->description;?></textarea>
	</div>
	
	<div class="form-group">
	
	<label>Location</label>
	<input type="text" name="location" id="userLocation" class="form-control" value="<?php echo $_REQUEST['user']->location;?>">
	</div>
	
    
	
	<div class="form-group">
	
	<label>Website</label>
	<input type="url" name="website"  id="userWebsite" class="form-control" value="<?php echo $_REQUEST['user']->website;?>">
	
	</div>


    

    



		
		
		
		
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="button" onclick="saveProfile()"   >Save</button>
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>

</form>

    </div>

  </div>
</div>





<div id="validationpopup" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
   
	<div class="modal-content">
	  <div class="modal-header bg-danger">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Alert</h4>
      </div>
      <div class="modal-body">
    
	
    
<p  id="validationerror">

            Username already taken

        </p>

    



		
		
		
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>


    </div>

  </div>
</div>






































<div class="ModalManager Module " >

<div class="Modal Module modalHasClose absoluteCenter hide" id="editprofile-a">









































    













<div class="modalMask show"></div>

<div class="modalScroller">

    <div class="modalContainer show">

        <span class="positionModuleCaret"></span>

        <div class="modalContent">

            <div class="modalModule">

                

                

            <div class="Module UserEdit modal inModal">























    <form class="standardForm" method="post" action="<?php echo $sugar_config['base_url'];?>ip_user/saveProfile" enctype="multipart/form-data"  id="editprofileform">

        <h1>Edit profile</h1>

        <ul>









<li>

    <h3><label for="userFirstName" class="settingLabel">Name</label></h3>

    <div>

        

        

        <input type="text" class="name first" name="first_name" id="userFirstName" value="<?php echo $_REQUEST['user']->first_name;?>">

        

            <input type="text" class="name last" name="last_name" id="userLastName" value="<?php echo $_REQUEST['user']->last_name;?>">

        

    </div>

</li>



<li>

    <h3><label>Picture</label></h3>

    <div>

        <div class="profileImageWrapper">

            

    <?php 

	$img = $sugar_config['base_url'].'webapp/img/default_75.png';

	if($_REQUEST['user']->photo != "") {

	$img = $_REQUEST['user']->photo;

	}

	?>



    <img src="<?php echo $img;?>" class="profileImage" data-load-state="pending">



        </div>

		

		<input type="file" name="attachment"   />

        <!--  <button class="Button Module ShowModalButton btn changePhoto hasText rounded" type="button">



		<span class="buttonText">

            

            Change picture

        </span>

        

</button> -->

    </div>

</li>



<li>

    <h3><label for="userUserName" class="settingLabel">Username</label></h3>

    <div>

        

        <span class="domain" title="www.pinterest.com/">www.pinterest.com/</span>

        <input type="text" name="user_name" class="username" id="user_name" value="<?php echo $_REQUEST['user']->user_name;?>">

    </div>

</li>

<li>

    <h3><label for="userAbout">About you</label></h3>

    <div>

        <textarea name="description" id="userAbout"> <?php echo $_REQUEST['user']->description;?></textarea>

    </div>

</li>



<li>

    <h3><label for="userLocation" class="settingLabel">Location</label></h3>

    <div>

        <input type="text" name="location" id="userLocation" value="<?php echo $_REQUEST['user']->location;?>">

    </div>

</li>

<li>

    <h3><label for="userWebsite" class="settingLabel">Website</label></h3>

    <div class="Module UserEditVerifyWebsite">









<div class="verifiedDomainContainer hidden">

        <span class="verifiedDomainIcon"></span>

        Site confirmed

</div>





<button class="Button Module btn hasText rounded verifyButton disabled" type="button" disabled="disabled">







    

    









<span class="buttonText">

            

            Confirm website

        </span>

        

</button>



<div class="fillWidth">

    <input type="url" name="website" class="website" id="userWebsite" value="<?php echo $_REQUEST['user']->website;?>">

</div>

</div>

</li>





        </ul>



        <div class="formFooter">

            <p class="helpText">

                Visit <a href="/settings/">your settings</a> to change your password, email or Facebook/Twitter preferences.

            </p>

            <div class="formFooterButtons">

                <button class=" Button Module btn cancelButton hasText rounded" type="button" onclick="closemodal('editprofile')">







    









<span class="buttonText">

            

            Cancel

        </span>

        

</button>

                <button class="Button Module btn hasText primary rounded saveButton" type="button" onclick="saveProfile()">







    









<span class="buttonText">

            

            Save

        </span>

        

</button>

            </div>

        </div>

    </form>



</div></div>

            

                <button class="Button Module borderless cancelButton closeModal inModal show" onclick="closemodal('editprofile')" type="button">















<em></em>

<span class="accessibilityText">Close</span>

</button>

            

        </div>

    </div>

</div>



</div>





<div class="Modal Module modalHasClose absoluteCenter hide" id="validationpopup-a">









































    













<div class="modalMask show"></div>

<div class="modalScroller">

    <div class="modalContainer show">

        <span class="positionModuleCaret"></span>

        <div class="modalContent">

            <div class="modalModule">

                

                

            <div class="ConfirmDialog Module inModal">



    <form class="standardForm">

        

            <h1>Oops!</h1>

        

        <p class="body" id="validationerror">

            Username already taken

        </p>

        <div class="formFooter">

            <div class="formFooterButtons">

                <button class=" Button Module btn hasText primary rounded" type="button" onclick="closemodal('validationpopup')">







    









<span class="buttonText">

            

            OK

        </span>

        

</button>

            </div>

        </div>

    </form>



</div></div>

            

                <button class="Button Module borderless cancelButton closeModal inModal show" onclick="closemodal('validationpopup')" type="button">















<em></em>

<span class="accessibilityText">Close</span>

</button>

            

        </div>

    </div>

</div>



</div>





</div>