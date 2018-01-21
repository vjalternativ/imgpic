<!-- Modal -->
  <div class="modal fade" id="boardmodal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header bg-info">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Save to board</h4>
        </div>
        <div class="modal-body">
		
		<div class="row">
		<div class="col-md-6">
		<img id="modalimg" src="#" style="width:100%"  alt="">
		 <textarea maxlength="500" class="form-control hide"  placeholder="Tell us about this Pic..." style="margin-top:3px;" id="previewpin-desc-field"> </textarea>
			<p class="pinDescription" id="previewpin-desc"></p>
		</div>
		<div class="col-md-6" id="selectboard">
		
		<ul class="list-group">
                
                    
<?php
foreach($_REQUEST['boardBeans'] as $board) {
?>

<li class="list-group-item">
                        
         
<span class="name"><?php echo $board->name;?></span>

    <button onclick="pinboard('<?php echo $board->id;?>')" class="btn btn-danger pull-right btnpinboard" id="btnpinboard-<?php echo $board->id;?>" type="button">
            Save 
</button>

    <div class="clearfix"></div>
                        
                    </li>
<?php
}
?>                    
                    
                
            </ul>
		
		</div>
		
		<div class="col-md-6 hide" id="createboard">


<form class="modalPinCreate" method="post" action="<?php echo $sugar_config['base_url'];?>ip_user/createBoard">
    <input type="hidden" id="pinid" name="pinid" value="" />
	<input  id="secret" name="secret" type="hidden" value="No">

    <h4 class="h4">
        Create a board
    </h4>

<div class="form-group">

<label for="email">Name</label>
  <input id="boardEditName" class="form-control" name="boardName" type="text" autofocus="" placeholder="Board Name.." value="" onkeyup="enablesubmit('boardEditName','creatboardbtn')">
</div>



<div class="form-group">

<label for="email">Description</label>
 <textarea id="boardEditDescription" class="form-control" placeholder="What's your board about?" name="description"></textarea>
</div>




<div class="form-group">

<label for="email">Category</label>
<select class="form-control" id="board_category" name="category">



<?php foreach($_REQUEST['topics'] as $topic) {

?>
  <option value="<?php echo $topic['id'];?>">
        <?php echo $topic['name'];?>
        
    </option>

<?php

}
?>


    
  
</select>
</div>







    

    
    

</form>
</div>
		
		
		</div>
		
		
        </div>
        <div class="modal-footer">
		
		
		<button type="button" class="btn btn-primary selectboard-btns" onclick="createboard()">Create a board</button>
          <button type="button" class="btn btn-default selectboard-btns" data-dismiss="modal">Close</button>
       
	   <button type="button" class="btn btn-default createboard-btns hide" onclick="selectboard()">Cancle</button>
       <button type="button" class="btn btn-primary createboard-btns hide" id="creatboardbtn" onclick="return createboardandpin()" disabled="disabled">Create</button>
       
	   
	    </div>
      </div>
      
    </div>
  </div>




<div class="ModalManager Module" id="addtoboardModal hide"><div  id="boardmodal-a" class="Modal Module undefined male absoluteCenter hide">



<div class="modalMask dark show"></div>
<div class="modalScroller">
    <div class="modalContainer show">
        <span class="positionModuleCaret"></span>
        <div class="modalContent">
            <div class="modalModule">
                
                
            <div class="Module PinCreate TwoPaneModal inModal" style="height: 540px; opacity: 1; transform: scale(1, 1);">





    <button class="Button Module borderless cancelButton twoPaneClose" onclick="closemodal('boardmodal')" type="button">







<em></em>
<span class="accessibilityText">Close</span>
</button>


<div class="left pane">
    
    
        

        <div class="Module PinCreatePin">



    


<div class="pinContainer">
    <div class="pinModuleHolder">
        
    <div class="Module Pin cloned hideHoverUI pinActionBarStickyContainer summary animatingToModal" data-component-type="0" style="opacity: 1; position: static; top: 0px; left: 0px; transform: translate(0px, 0px);">

    
    <div class="pinWrapper">
        
        <div class="bulkEditPinWrapper">
            
        </div>
        <div class="pinImageActionButtonWrapper">

                

                <div class="leftSideButtonsWrapper">
                    
     <button class="Button Module ShowModalButton btn hasText isBrioFlat pinitLocalization primary primaryOnHover repinSmall rounded" data-element-type="0" type="button">



    




<em></em>
<span class="buttonText">
            
            Save
        </span>
        
</button>
    


                    
                </div>

                <div class="rightSideButtonsWrapper ">
                    
                    
                    
                    
                        
                        
                        
    
    
    

    
    
        
    

    
    
    
        
        <button class="Button DropdownButton Module btn isBrioFlat rounded sendSmall sendPinGrid" data-element-type="98" type="button">



    




<em></em>
<span class="accessibilityText">Send</span>
</button>
    

                    
                    

                    

                    
                    
                        
                    
                    
                    

                    
                        
                        
                            
                        
                        
                        
                            
                                <button class="Button LikeButton Module PinLikeButton btn isBrioFlat likeSmall rounded" data-element-type="1" data-source-interest-id="954260075104" type="button">



    




<em></em>
<span class="accessibilityText">Like</span>
</button>
                            
                        
                    

                    
                </div>
            

            
            
            
                
                
            
            
            

            
            
            

            <div class="pinHolder">
                

                
                
                
                    
                
                
                
                    <div class="pinImageWrapper draggable" data-element-type="35" style="background: #141415;">
                
                    
                        <div class="pinDomain hidden">lindsayadlerphotography.com</div>
                    
                    <div class="fadeContainer">
                        
                            <div class="hoverMask"></div>
                        
                        
                        
                            
                        
                        
                        
                        
                        
                        
                        
                            
                        

                        
                            
                        

                        
                        
                        
                            <div class="Image Module pinUiImage" style="width: 236px">







    
        
    





    


    


    


<div class="heightContainer" style="padding-bottom: 149.576271%">
    
    

    <img id="modalimg-a" src="#" class="pinImg fullBleed noFade loaded fade"  alt="">


</div>
</div>
                        
                    </div>
                
                    </div>
                
            </div>
        </div>

        
            
    

        

        
        
        
        
        
        
        
        
            
        
        
        
            <div class="pinMetaWrapper">
                

                

                
                    
                    
                

                

                

                
                    
                

                <div class="pinMeta ">
                    
					    <button id="showdesc" class="Button Module borderless editPinDescription" onclick="show('.pinDescriptionInput')" type="button">







<em></em>
<span class="accessibilityText">Edit description</span>
</button>
                 
                    
                    

                    

                    
                    


                    
                        
                        
                            
                            
                            <div class="Field Module TextField">


    
    <textarea maxlength="500" class="content autogrow 
            pinDescriptionInput pinCreateDescription
        
    " placeholder="Tell us about this Pin..." style="height: 34px;" id="previewpin-desc-field"> </textarea>

</div>
                        
                        <p class="pinDescription" id="previewpin-desc"></p></div>
                
                
            </div>
        
        

        

        
        
        

        
    </div>

</div></div>
</div>

</div>
    

</div>



<div class="right pane hide" id="createboard-a">
    
    
        <div class="Module PinCreateBoardPicker">



    



    <div class="titleContainer">
        <p class="pinCreateTitle">Pick a board</p>
        
        
            <div class="Module PinDupWarning pinCreate">







    


    <div class="pinnedToBoardWarning">
        <strong>Pssst!</strong>
        Looks as though you've already <a href="/vjlizalternativ/testboard/">saved this Pin to testboard</a>.
    </div>

</div>
        
    </div>


<div class="boardsWrapper" data-component-type="13025" style="height: 419px;">
    <div class="BoardPicker Module Picker pinCreate">










    
    <div class="top">
        
        
            
            
            <button class="Button Module btn createButton hasText rounded" type="button">



    




<span class="buttonText">
            
            Create
        </span>
        
</button>
        
        <div class="nameWrapper">
            <div class="searchFilterInputIcon"></div>
            
            
            
            <label>
                
                    <span class="visuallyHidden">Search</span>
                
                <input autocomplete="off" class="Input Module name" name="name" placeholder="Search">


    

    

    

    
            </label>
        </div>
    </div>






    

    






    






    


<div class="selectionBody">
    
    
        <div class="bottom">
            <div class="Module PickerItemCreate pinCreate createBoard" data-element-type="249">



    





<span class="icon"></span>




    
    
        
    
    Create a board

</div>
        </div>
    

    <div class="Module SelectList pinCreate" tabindex="0" style="height: 359px;">















<div class="sections">
    
        
       <!-- <ul class="section recentBoards">
            
            
            <ul class="sectionItems ">
                
                    
                    
                    <li class="item">
                        
                            <div class="BoardLabel Module pinCreate">












    
    
    
    
        
        
    
    <button class="Button Module btn hasText isBrioFlat pinitLocalization primary primaryOnHover repinSmall repinBtn rounded" type="button">



    




<em></em>
<span class="buttonText">
            
            Save
        </span>
        
</button>




    
    
        <div class="boardImg" style="background-image:url(https://s-media-cache-ak0.pinimg.com/200x150/97/d8/28/97d828dc4acaef4959d88780841fc239.jpg)"></div>
    


<span class="nameAndIcons">
    <div class="BoardIcons Module pinCreate">








</div>
    <span class="name">testboard</span>
</span>

</div>
                        
                    </li>
                
            </ul>
        </ul>
    -->
        
        <ul class="section allBoards">
            
            
                <li class="sectionHeading">
                    <div class="Label Module">


All boards
</div>
                </li>
            
            <ul class="sectionItems">
                
                    
                    
                    <li class="item">
                        
                            <div class="BoardLabel Module pinCreate">












    
    
    
    
        
        
    
    <button class="Button Module btn hasText isBrioFlat pinitLocalization primary primaryOnHover repinSmall repinBtn rounded" type="button">



    




<em></em>
<span class="buttonText">
            
            Save
        </span>
        
</button>




    
    
        <div class="boardImg" style="background-image:url(https://s-media-cache-ak0.pinimg.com/200x150/97/d8/28/97d828dc4acaef4959d88780841fc239.jpg)"></div>
    


<span class="nameAndIcons">
    <div class="BoardIcons Module pinCreate">








</div>
    <span class="name">testboard</span>
</span>

</div>
                        
                    </li>
                
            </ul>
        </ul>
    
        
        <ul class="section ">
            
            
            <ul class="sectionItems">
                
            </ul>
        </ul>
    
</div>
</div>
</div>
</div>
</div>
</div>
    

<div class="BoardCreate BoardEditBase Module multiSelect pinCreate simple">



















    










    
    











<form class="modalPinCreate" method="post" action="<?php echo $sugar_config['base_url'];?>ip_user/createBoard">
    <input type="hidden" id="pinid" name="pinid" value="" />
    <h1 class="createTitle">
        Create a board
    </h1>


    <ul>
        
            <li>
                <h3><label for="boardEditName" class="hasError">Name</label></h3>
                <div>
                    <input id="boardEditName" class="boardEditName hasError" name="boardName" type="text" autofocus="" placeholder="Board Name.." value="" onkeyup="enablesubmit('boardEditName','creatboardbtn')"><p class="formFieldMessage formErrorMessage">Don't forget to name your board!</p>
                </div>
            </li>
            <li class="descriptionWrapper">
                <h3><label for="boardEditDescription">Description</label></h3>
                <div>
                    
                    <textarea id="boardEditDescription" class="boardEditDescription" placeholder="What's your board about?" name="description"></textarea>
                </div>
            </li>
            <li class="categoryWrapper">
                <h3><label for="boardEditCategory">Category</label></h3>
                <div>
                    <select class="bs-select" id="board_category" name="category">



<?php foreach($_REQUEST['topics'] as $topic) {

?>
  <option value="<?php echo $topic['id'];?>">
        <?php echo $topic['name'];?>
        
    </option>

<?php

}
?>


    
  
</select>
                </div>
            </li>
            
            <li class="secretToggleWrapper">
                <h3><label for="secret">Secret</label>
                    
                </h3>
                <div>
                    <div class="Checkbox Module fancyToggle styledToggle" id="secretslider">







    
        
    

    
        
    

    

<div class="slider"></div>
    <p class="onText status" id="secrety" onclick="setsecret('No')">Yes</p>
    <p class="offText status" id="secretn" onclick="setsecret('Yes')">No</p>
    <input  id="secret" name="secret" type="hidden" value="No">









    
    
    
    
</div>
                </div>
            </li>
        
        
        
        
        
            
        
        
        <li class="boardCollaboratorsWrapper hide">
            <h3>
                <label>Collaborators</label>
                
            </h3>
            <div class="fieldWrapper">
                
                    
                    

                

                <div class="boardEditCollaborators hasMaxHeight" style="max-height: 191px;">
                    
    <div class="Module SendObjectBase fullWidth flex compact sendShare" data-component-type="56">












    




<div class="sendShareSearch">
    
        <div class="sendShareSearchContacts ">
            <div class="Module SocialTypeaheadField TypeaheadField sendShare fullWidth compact userCircleSelect">














    





    
        <div class="searchIconInputWrapper">
            <div class="searchIcon"></div>
    

    
    
    
    <input autocomplete="off" autofocus="" class="Input Module field" name="name" placeholder="Enter email" type="text">


    

    

    

    

    

    

    
        </div>
    












    

    
    

    
    
        
    

    
    

    
    

    
    

    
    
        
    

    
    

    
    
        
    

    
    

    
    
        
    

    
    
        
    

    
    
        
    

    
    

    
    

    <div class="Module Typeahead sendShare fullWidth flex compact flex userCircleSelect">


    



    






    <ul class="results" data-component-type="35"></ul>

</div>

</div>

            <div class="spinner"></div>

            <div class="ContactsList Module fullWidth flex compact sendShare" style="display: block;">










    
    







    


<ul class="List Module">






    
        
        <li data-index="0">
            

            
                
                    <div class="ImageBlock Module socialConnectCta">


    



<div class="left circle imageSize_sendShare">
    
    

    
        <em></em>
    

    
</div>
<div class="right">
    
        
        

        <h4 class="imageBlockContentTitle">Choose from contacts</h4>

        
        <div class="imageBlockContentBody">
            <span></span>
        </div>
    
</div>
</div>
                
            
        </li>
    

</ul>
</div>
        </div>
    

    

    
</div>

<div class="Module SocialConnectPanel fullWidth flex compact sendShare" style="display: none;">





<div class="header">
    <div class="backNav">
      <a>
        <span class="icon"></span>
        <span class="label">Back</span>
      </a>
    </div>
    <div class="prompt">
        Upload contacts from ...
    </div>
</div>





    


<ul class="socialConnectOptions">
    
        
            <li>
                <a>
                    <div class="Module SocialNetworkConnectButton google listItem sendShare" data-element-type="998">








    



    








    




<em class="icon"></em>
<div class="networkInfo">
    
    
        <h4 class="title">Google</h4>
    

    
    
        <div class="subtitle">vjliz.alternativ@gmail.com</div>
    
</div>

<div class="loadingContent">
    <div class="caption">
        Finding ideas from <br> Google friends
    </div>
</div>
</div>
                </a>
            </li>
        
    
        
            <li>
                <a>
                    <div class="Module SocialNetworkConnectButton listItem sendShare yahoo" data-element-type="998">








    



    








    




<em class="icon"></em>
<div class="networkInfo">
    
    
        <h4 class="title">Yahoo</h4>
    

    
    
</div>

<div class="loadingContent">
    <div class="caption">
        Finding ideas from <br> Yahoo friends
    </div>
</div>
</div>
                </a>
            </li>
        
    
        
            <li>
                <a>
                    <div class="Module SocialNetworkConnectButton facebook listItem sendShare" data-element-type="998">








    



    








    




<em class="icon"></em>
<div class="networkInfo">
    
    
        <h4 class="title">Facebook</h4>
    

    
    
        <div class="subtitle">Friends who are Pinners</div>
    
</div>

<div class="loadingContent">
    <div class="caption">
        Finding ideas from <br> Facebook friends
    </div>
</div>
</div>
                </a>
            </li>
        
    
        
            <li>
                <a>
                    <div class="Module SocialNetworkConnectButton listItem sendShare twitter" data-element-type="998">








    



    








    




<em class="icon"></em>
<div class="networkInfo">
    
    
        <h4 class="title">Twitter</h4>
    

    
    
</div>

<div class="loadingContent">
    <div class="caption">
        Finding ideas from <br> Twitter friends
    </div>
</div>
</div>
                </a>
            </li>
        
    
</ul>
</div>

<div class="MessageDraft Module sendShare">







<div class="selectedUser">
    <div class="headIcon">
        
        
            
        
        <div class="ConversationHead Module small">













<div class="contentContainer">
    
    
    
        
            
        
    

    
    
    
        <div class="headWrapper">
    

    
    
    
    
        
            
            
        
    
        
            
            
        
    
        
            
            
        
    

    
    
    

    <div class="imagesWrapper">
        
    </div>

    <div class="noDrag"></div>
    
        </div>
    
    
    
    
        
    
    <button class="Button Module borderless count badge hidden" type="button">








    &nbsp;
</button>

    
    

    
</div>
</div>
    </div>
    <div class="userInfo">
        <div class="displayName"></div>
    </div>
    <div class="cancel">
      <a class="icon"></a>
    </div>
</div>
<div class="messageForm">
    <textarea class="messageField" placeholder="Add a message"></textarea>

    <button class="Button Module btn hasText messageDraft flat primary rounded" data-element-type="276" type="button">



    




<span class="buttonText">
            
            Send
        </span>
        
</button>
</div>
</div>
</div>

                </div>
            </div>
        </li>

        
        

        
        
    </ul>

    
    <div class="formFooter">
        <div class="formFooterButtons">
            <button class=" Button Module btn cancelButton hasText rounded" onclick="selectboard()" type="button">
<span class="buttonText">
            
            Cancel
        </span>
        
</button>
            <button class="Button Module btn hasText primary rounded saveBoardButton " id="creatboardbtn" onclick="return createboardandpin()" type="button" disabled="disabled">



    




<span class="buttonText">
            
            Create
        </span>
        
</button>
        </div>
    </div>

</form>
</div></div>


<div class="right pane" id="selectboard-a">
    
    
        <div class="Module PinCreateBoardPicker">



    



    <div class="titleContainer">
        <p class="pinCreateTitle">Pick a board</p>
        
        
            <div class="Module PinDupWarning pinCreate">







    


    <div class="pinnedToBoardWarning">
        <strong>Pssst!</strong>
        Looks as though you've already <a href="/vjlizalternativ/sdsd/">saved this Pin to sdsd</a>.
    </div>

</div>
        
    </div>


<div class="boardsWrapper" data-component-type="13025" style="height: 465px;">
    <div class="BoardPicker Module Picker pinCreate">










    
    <div class="top">
        
        
            
            
            <button class="Button Module btn createButton hasText rounded" type="button">



    




<span class="buttonText">
            
            Create
        </span>
        
</button>
        
        <div class="nameWrapper">
            <div class="searchFilterInputIcon"></div>
            
            
            
            <label>
                
                    <span class="visuallyHidden">Search</span>
                
                <input autocomplete="off" class="Input Module name" name="name" placeholder="Search">


    

    

    

    
            </label>
        </div>
    </div>






    

    






    






    


<div class="selectionBody">
    
    
        <div class="bottom">
            <div class="Module PickerItemCreate pinCreate createBoard" onclick="createboard()" data-element-type="249">



    





<span class="icon"></span>




    
    
        
    
    Create a board

</div>
        </div>
    

    <div class="Module SelectList pinCreate" tabindex="0" style="height: 405px;">















<div class="sections">
    
        <!--
        <ul class="section recentBoards">
            
            
            <ul class="sectionItems">
                
                    
                    
                    <li class="item">
                        
                            <div class="BoardLabel Module pinCreate">












    
    
    
    
        
        
    
    <button class="Button Module btn hasText isBrioFlat pinitLocalization primary primaryOnHover repinSmall repinBtn rounded" type="button">



    




<em></em>
<span class="buttonText">
            
            Save
        </span>
        
</button>




    
    
        <div class="boardImg" style="background-image:url(https://s-media-cache-ak0.pinimg.com/200x150/97/d8/28/97d828dc4acaef4959d88780841fc239.jpg)"></div>
    


<span class="nameAndIcons">
    <div class="BoardIcons Module pinCreate">








</div>
    <span class="name">testboard</span>
</span>

</div>
                        
                    </li>
                
            </ul>
			
        </ul>
    -->
        
        <ul class="section allBoards">
            
            
                <li class="sectionHeading">
                    <div class="Label Module">


All boards
</div>
                </li>
            
            <ul class="sectionItems">
                
                    
<?php
foreach($_REQUEST['boardBeans'] as $board) {
?>

<li class="item">
                        
                            <div class="BoardLabel Module pinCreate">












    
    
    
    
        
        
    
    <button onclick="pinboard('<?php echo $board->id;?>')" class="Button Module btn hasText isBrioFlat pinitLocalization primary primaryOnHover repinSmall repinBtn rounded btnpinboard" id="btnpinboard-<?php echo $board->id;?>" type="button">



    




<em></em>
<span class="buttonText" >
            
            Save 
        </span>
        
</button>




    
    
        <div class="boardImg" style="background-image:url(https://s-media-cache-ak0.pinimg.com/200x150/97/d8/28/97d828dc4acaef4959d88780841fc239.jpg)"></div>
    


<span class="nameAndIcons">
    <div class="BoardIcons Module pinCreate">








</div>
    <span class="name"><?php echo $board->name;?></span>
</span>

</div>
                        
                    </li>
<?php
}
?>                    
                    
                
            </ul>
        </ul>
    
        
        <ul class="section ">
            
            
            <ul class="sectionItems">
                
            </ul>
        </ul>
    
</div>
</div>
</div>
</div>
</div>
</div>
    

</div>


    
        

            <div class="Module PinCreateShare">




    
    
    
    
    
    



</div>
        
    

</div></div>
            
                <button class="Button Module borderless cancelButton closeModal inModal  hide" type="button">







<em></em>
<span class="accessibilityText">Close</span>
</button>
            
        </div>
    </div>
</div>

</div></div>

