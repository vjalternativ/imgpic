<form class="standardForm" method="post" >
  
	  <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit this Pic</h4>
      </div>
      <div class="modal-body">
    <input type="hidden" name="id" id="formpinid" value="<?php echo $_REQUEST['image']->id;?>" />


    

    <img src="<?php echo $_REQUEST['image']->link;?>" class="pinPreviewImg" style="max-width:100%" data-load-state="pending">
<br />
<br />
	<div class="form-group">
	
	<label>Board</label>
	<select name="board-id" id="board-id" class="form-control">
			<?php foreach($_REQUEST['boards'] as $board) {
			?>
			<option <?php if($_REQUEST['bid']==$board->id) echo 'selected="selected"' ?> value="<?php echo $board->id;?>"><?php echo $board->name;?></option>
			
			<?php
			
			
			}
			?>
			</select>
	</div>
	
	<?php if($_SESSION['uid'] == $_REQUEST['image']->assigned_user_id) { ?>
	<div class="form-group">
	
	<label>Description</label>
	<textarea id="pinFormDescription" name="description" class="form-control" placeholder="Tell us about this Pin..."> <?php echo $_REQUEST['image']->description;?></textarea>
	</div>
	
	
	
	<div class="form-group">
	
	<label>Website</label>
	<input type="text" class="form-control" name="link" id="pinFormLink" value="<?php echo $_REQUEST['image']->website;?>">
	</div>
    
	
	<?php } ?>
	



    

    



		
		
		
		
      </div>
      <div class="modal-footer">
	  <button class="btn btn-primary" type="button" onclick="savePinInfo()">Save</button>
        
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>

</form>



<div class="Modal Module modalHasClose absoluteCenter hide" id="editpincontent">




















    






<div class="modalMask show"></div>
<div class="modalScroller">
    <div class="modalContainer show">
        <span class="positionModuleCaret"></span>
        <div class="modalContent">
            <div class="modalModule">
                
                
            <div class="Module PinEdit inModal">







    















    <div class="Module PinForm showLink" data-component-type="MODAL_REPIN">





    
    
    
    
    
    
    
    
        
    






    
    
    
    
    
    
    


<form class="standardForm" method="post">
    <h1 class="pinFormHeader">Edit this Pin</h1>

    
    

    <div class="Module PinPreview">



<input type="hidden" name="id" id="formpinid" value="<?php echo $_REQUEST['image']->id;?>" />


    

    <img src="<?php echo $_REQUEST['image']->link;?>" class="pinPreviewImg" data-load-state="pending">




</div>

    <ul>
        
        <li class="boardWrapper">
            <h3><label>Board</label></h3>
            <div>
			
			
			<select name="board-id" id="board-id">
			<?php foreach($_REQUEST['boards'] as $board) {
			?>
			<option <?php if($_REQUEST['bid']==$board->id) echo 'selected="selected"' ?> value="<?php echo $board->id;?>"><?php echo $board->name;?></option>
			
			<?php
			
			
			}
			?>
			</select>
			
            </div>
        </li>
		<?php if($_SESSION['uid'] == $_REQUEST['image']->assigned_user_id) { ?>
		
        <li>
            <h3><label for="pinFormDescription">Description</label></h3>
            <div>
                
                    
                
                <div class="Field Module TextField">


    
    <textarea id="pinFormDescription" name="description" class="content" placeholder="Tell us about this Pin..."> <?php echo $_REQUEST['image']->description;?></textarea>

</div>
            </div>
        </li>
        
            
            <li>
                <h3><label for="pinFormLink">Website</label></h3>
                <div>
                    <input type="text" name="link" id="pinFormLink" value="<?php echo $_REQUEST['image']->website;?>">
                </div>
            </li>
        
		<?php } ?>
        
            
            
        
    </ul>

    <div class="formFooter">
        
        
        
            <div class="formFooterDelete">
                <button class="Button Module btn deleteButton hasText rounded" type="button">



    




<span class="buttonText">
            
            Delete Pin
        </span>
        
</button>
            </div>
        

        <div class="formFooterButtons">
            
                <button class=" Button Module btn cancelButton hasText rounded" onclick="closemodal('editpincontent')" type="button">



    




<span class="buttonText">
            
            Cancel
        </span>
        
</button>
            

            
            
            
            
            
                
            

            <button class="Button Module btn hasText primary rounded savePinButton" type="button" onclick="savePinInfo()">



    




<span class="buttonText">
            
            Save
        </span>
        
</button>
        </div>
    </div>

    
</form>
</div>

</div></div>
            
                <button class="Button Module borderless cancelButton closeModal inModal show" onclick="closemodal('editpincontent')" type="button">







<em></em>
<span class="accessibilityText">Close</span>
</button>
            
        </div>
    </div>
</div>

</div>