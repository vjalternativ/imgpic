<?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will	
// be automatically rebuilt in the future. 
 $hook_version = 1; 
$hook_array = Array(); 
// position, file, function 



//$hook_array['before_save'] = array();
//$hook_array['before_save'][] = array(2,'User before Save','custom/modules/Users/hooks/users.php','UserHook','userBeforeSave');
$hook_array['after_save'] = array();

$hook_array['after_save'][] = array(1,'category after Save','custom/modules/rc_category/hooks/rc_category.php','RC_CategoryHook','afterSave');
 

$hook_array['process_record'] = array();

$hook_array['process_record'][] = array(2,'Images process','custom/modules/rc_category/hooks/rc_category.php','RC_CategoryHook','processRecord');

$hook_array['before_save'] = array();

$hook_array['before_save'][] = array(1,'before Save','custom/modules/rc_board/hooks/rc_board.php','RC_BoardHook','beforeSave');

?>