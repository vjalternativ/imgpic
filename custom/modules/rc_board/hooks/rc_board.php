<?php 

require_once('custom/include/utils.php');


class RC_BoardHook {

function beforeSave($bean,$event,$arguments) {
global $db;
if($bean->name=="") {
die("Name cannot be empty");
}

/*
$sql ="SELECT * FROM ".$bean->table_name;
$qry = $db->query($sql);
while($row  = $db->fetchByAssoc($qry)) {
 
$alias = alias_encode($row['name']);
$sql = "update ".$bean->table_name." set alias ='".$alias."' where id='".$row['id']."'";

$db->query($sql);

}
*/
$alias = $bean->alias;

if($bean->alias=="") {
$alias = alias_encode($bean->name);
$bean->alias = $alias;
}


$bean->alias = alias_encode($bean->alias);


if(!isset($bean->portal)) {
$sql = "SELECT id FROM ".$bean->table_name." WHERE alias ='".$alias."' and id!='".$bean->id."'";

$query = $db->query($sql);
if($query->num_rows !=0) {
die("Please choose diffrent name");
}

}


}
}
?>