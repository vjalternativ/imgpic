<div class="ModalManager Module">
<div class="Modal Module modalHasClose absoluteCenter hide" >




















    






<div class="modalMask show"></div>
<div class="modalScroller">
    <div class="modalContainer show">
        <span class="positionModuleCaret"></span>
        <div class="modalContent">
            <div class="modalModule">
                
                
            <div class="Module UserEdit modal inModal">











    <form class="standardForm" method="post" novalidate="">
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
            
    

    <img src="https://s-passets-cache-ak0.pinimg.com/images/user/default_75.png" class="profileImage" data-load-state="pending">

        </div>
        <button class="Button Module ShowModalButton btn changePhoto hasText rounded" type="button">



    




<span class="buttonText">
            
            Change picture
        </span>
        
</button>
    </div>
</li>

<li>
    <h3><label for="userUserName" class="settingLabel">Username</label></h3>
    <div>
        
        <span class="domain" title="www.pinterest.com/">www.pinterest.com/</span>
        <input type="text" name="username" class="username" id="userUserName" value="<?php echo $_REQUEST['user']->user_name;?>">
    </div>
</li>
<li>
    <h3><label for="userAbout">About you</label></h3>
    <div>
        <textarea name="about" id="userAbout"></textarea>
    </div>
</li>

<li>
    <h3><label for="userLocation" class="settingLabel">Location</label></h3>
    <div>
        <input type="text" name="location" id="userLocation" value="vjgurgaon">
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
    <input type="url" name="website_url" class="website" id="userWebsite" value="">
</div>
</div>
</li>


        </ul>

        <div class="formFooter">
            <p class="helpText">
                Visit <a href="/settings/">your settings</a> to change your password, email or Facebook/Twitter preferences.
            </p>
            <div class="formFooterButtons">
                <button class=" Button Module btn cancelButton hasText rounded" type="button">



    




<span class="buttonText">
            
            Cancel
        </span>
        
</button>
                <button class="Button Module btn hasText primary rounded saveButton" type="submit">



    




<span class="buttonText">
            
            Save
        </span>
        
</button>
            </div>
        </div>
    </form>

</div></div>
            
                <button class="Button Module borderless cancelButton closeModal inModal show" type="button">







<em></em>
<span class="accessibilityText">Close</span>
</button>
            
        </div>
    </div>
</div>

</div></div>