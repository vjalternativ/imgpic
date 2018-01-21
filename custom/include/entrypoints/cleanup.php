<?php
class dbcleanup {

function clean() {
global $db;

$sql = "delete from rc_image where link is null";
$db->query($sql);

}

}

$cleanup = new dbcleanup();
$cleanup->clean();
?>

