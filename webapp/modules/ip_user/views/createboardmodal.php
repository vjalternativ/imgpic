<div id="createBoardModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
   
	<div class="modal-content">
    <form class="standardForm" method="post" action="<?php echo $sugar_config['base_url'];?>ip_user/createBoard">
   
	  <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Create a Board</h4>
      </div>
      <div class="modal-body">
    
	<div class="form-group">
	
	<label>Name</label>
	<input id="boardname" onkeyup="enablesubmit('boardname','btn-createboard')" class="form-control" name="boardName" type="text" autofocus="" placeholder="Such as &quot;Places to go&quot; or &quot;Recipes to make&quot;." required="required" value="">
	</div>
	
	
	<div class="form-group">
	
	<label>Description</label>
	<textarea id="boardEditDescription" class="form-control" placeholder="What's your board about?" name="description"></textarea>
	</div>
	
	
	
	<div class="form-group">
	
	<label>Category</label>
	<select class="form-control" name="category">

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
    
	<input class="" id="secret" name="secret" type="hidden" value="No">

	
	



    

    



		
		
		
		
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="submit"  id="btn-createboard" disabled="disabled">Create</button>
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>

</form>

    </div>

  </div>
</div>




<div class="ModalManager Module" id="topicModal"><div  id="createBoardModal-a" class="Modal Module undefined male absoluteCenter hide">







<div class="modalMask dark show"></div>

<div class="modalScroller">

    <div class="modalContainer show">

        <span class="positionModuleCaret"></span>

        

		

		

		

		

		

		

		<div class="modalContent">

            <div class="modalModule">

                

                

            <div class="BoardCreate BoardEditBase Module multiSelect inModal">



</div></div>

            

                <button class="Button Module borderless cancelButton closeModal inModal show" type="button" onclick="closemodal('createBoardModal')">















<em></em>

<span class="accessibilityText">Close</span>

</button>

            

        </div>

		

		

		

		

		

		

		

		

		

		

		

    </div>

</div>



</div></div>