<?php
require_once 'webapp/layout/top-header.php';
?>

<?php if(isset($_REQUEST['error-msg']) && $_REQUEST['error-msg']!='') { 
?>
<div class="alert alert-info">
<?php echo $_REQUEST['error-msg'];?>
</div>
<?php } ?>
    <form class="standardForm" name="userSearchForm" method="post" action="<?php echo $sugar_config['base_url'];?>ip_user/forgot">
    
	<div class="form-group">
	<div class="row">
	<div class="col-md-6">
	
	<div class="input-group">
	<span class="input-group-addon">Email</span>
	<input class="form-control" type="text" name="passwordResetSearch">
    
	</div>
	</div>
	
	<div class="col-md-2">
	<button type="submit" name="submitForm" class="btn btn-primary">Send</button>
	</div>
	
	</div>
	</div>
</form>
    
<?php require 'webapp/layout/bottom-footer.php'; ?>