<?php


$noresult = 16;
$counter  = 0;
$startfrom = 1;
$endto = 4;
$maxlimit = $noresult*$endto;

$_REQUEST['page'] =  1;
$_REQUEST['pagelist'] = array();

$start = 0;
$next = 2;
$_REQUEST['nexturl'] = $_REQUEST['pagingurl'].'2';
$_REQUEST['prevurl'] = "#";

if(isset($_REQUEST['params'][2])) {
$_REQUEST['page'] = $_REQUEST['params'][2];
}


if(isset($_REQUEST['page']) && $_REQUEST['page']>0) {
	$start = ($_REQUEST['page'] - 1)*$noresult;
	$next = $_REQUEST['page'] + 1;
	$_REQUEST['nexturl'] = $_REQUEST['pagingurl'].$next;
	
}









$sql .= " LIMIT $start,$maxlimit";

$qry = $db->query($sql);
$totalresult = $start+$qry->num_rows;

$totalpages =  $totalresult/$noresult;



if($_REQUEST['page'] > 2) {
$startfrom = $_REQUEST['page']-2;
$endto = $_REQUEST['page'] + 2;
}

for($i=$startfrom;$i<=$totalpages;$i++) {
$counter++;

$_REQUEST['pagelist'][] = $i;

if($counter == 5 || $counter==$endto) {
break;
}

}





if(isset($_REQUEST['page']) && $_REQUEST['page']>0) {

	
	if($_REQUEST['page']*$noresult >= $totalresult) {
		$_REQUEST['nexturl'] = "#";
    }
  
  
if($_REQUEST['page']>1) {
$prev = $_REQUEST['page'] - 1;
$_REQUEST['prevurl'] = $_REQUEST['pagingurl'].$prev;

}

}

$data = array();
$counter=0;
while($row  = $db->fetchByAssoc($qry)) {
	$counter++;
	$data[] = $row;
	if($counter==$noresult) {
		break;
	}
}
//$sql .= " LIMIT $start,$noresult";
?>