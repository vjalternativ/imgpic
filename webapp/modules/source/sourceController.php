<?php class source {

	function index() {
	global $db;
	$source = $_REQUEST['params'][1];
	$images = array();
	$sql = "select * from rc_image i where i.status='Active' and i.deleted=0 and i.website like '%".$source."%'";
	//$sql = "select * from rc_image i where  i.deleted=0 and i.website like '%".$source."%'";
	
	$qry = $db->query($sql);
	while($row = $db->fetchByAssoc($qry)) {
		$images[] = $row;
	}
	$_REQUEST['images'] = $images;
	display('source/views/default.php');
	
	}



}

?>