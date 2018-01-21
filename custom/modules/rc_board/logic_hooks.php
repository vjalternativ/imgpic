<?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will	
// be automatically rebuilt in the future. 
 $hook_version = 1; 
$hook_array = Array(); 
// position, file, function 



//$hook_array['before_save'] = array();
//$hook_array['before_save'][] = array(2,'User before Save','custom/modules/Users/hooks/users.php','UserHook','userBeforeSave');
$hook_array['before_save'] = array();

$hook_array['before_save'][] = array(1,'before Save','custom/modules/rc_board/hooks/rc_board.php','RC_BoardHook','beforeSave');
 



?>