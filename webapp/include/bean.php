<?php
class bean {




function fetchById($table,$id) {

$query =  array();
$query['table'] = $table;
$query['where'] = "id='".$id."'";
$rows = $this->fetch($query);
return $rows;
}

function fetch($query) {
global $db;
$rows = array();
if(isset($query['table'])) {
$sql = "SELECT * FROM ".$query['table']." WHERE deleted='0' ";
}

if(isset($query['where'])) {

$sql .= "AND ".$query['where'];
}



if(isset($query['sql'])) {
$sql = $query['sql'];
}

$ids = array();
$result = $db->query($sql);
while($row = $db->fetchByAssoc($result)) {
$ids[] = $row['id'];
$rows[] = $row;
}

$_REQUEST['beanIds'] = $ids;

return $rows;
}

function save($table,$data,$custom = array()){



if(isset($data['id'])) {


$sql = "UPDATE ".$table." SET ";
$id = $data['id'];
unset($data['id']);
$pair = array();
foreach($data as $key=>$value) {

$pair[] = $key ."= '".$value."' ";
}


$string= implode(',',$pair);
$sql.= $string;

$sql.="WHERE id='".$id."'";



} else {

$data['id'] =create_guid();
//$data['id'] ='UUID()';

$sql = "INSERT INTO ".$table." (";

$cols = array_keys($data);

$columns = implode(",",$cols);

$values = implode("','",$data);

$sql.=$columns.")  values ('".$values."')";

}
echo $sql;die;

mysql_query($sql) or die(mysql_error());

return $data['id'];

}


}

$bean = new bean();
?>