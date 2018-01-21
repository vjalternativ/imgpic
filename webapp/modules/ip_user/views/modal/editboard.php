<div id="editboard" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
   
	<div class="modal-content">
    <form class="standardForm" method="post" action="<?php echo $sugar_config['base_url'];?>ip_user/updateBoard">
		<input type="hidden" name="id" value="<?php echo $_REQUEST['board']->id;?>"  />

   

	  <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Your Board <?php echo $_REQUEST['board']->name;?></h4>
      </div>
      <div class="modal-body">
    
	<div class="form-group">
	
	<label>Name</label>
	<input id="boardEditName" class="form-control" name="boardName" type="text" placeholder="Such as &quot;Places to go&quot; or &quot;Recipes to make&quot;." value="<?php echo $_REQUEST['board']->name;?>">

	</div>
	
	
	<div class="form-group">
	
	<label>Description</label>
	<textarea id="boardEditDescription" class="form-control" placeholder="What's your board about?" name="description">

					

					<?php echo $_REQUEST['board']->description;?>

					</textarea>
	</div>
	
	
	
	<div class="form-group">
	
	<label>Category</label>
	<select class="form-control" name="category">
<?php foreach($_REQUEST['topics'] as $topic) {
?>

  <option value="<?php echo $topic['id'];?>"  <?php if($_REQUEST['board']->rc_board_rc_categoryrc_category_ida == $topic['id']) echo 'selected=selected';?> >
        <?php echo $topic['name'];?>
    </option>
<?php
}
?>


</select>
	</div>
    
	
	
	



    

    



		
		
		
		
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="submit"  id="btn-createboard" >Save</button>
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>

</form>

    </div>

  </div>
</div>

