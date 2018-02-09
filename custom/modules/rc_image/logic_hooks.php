<?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will	
// be automatically rebuilt in the future. 
 $hook_version = 1; 
$hook_array = Array(); 
// position, file, function 



//$hook_array['before_save'] = array();
//$hook_array['before_save'][] = array(2,'User before Save','custom/modules/Users/hooks/users.php','UserHook','userBeforeSave');
$hook_array['after_save'] = array();

#$hook_array['after_save'][] = array(1,'Image after Save','custom/modules/rc_image/hooks/rc_image.php','RC_ImageHook','afterSave');
 

$hook_array['process_record'] = array();

$hook_array['process_record'][] = array(2,'Images process','custom/modules/rc_image/hooks/rc_image.php','RC_ImageHook','processRecord');

$hook_array['after_delete'][] = array(1,'Image after Delete','custom/modules/rc_image/hooks/rc_image.php','RC_ImageHook','afterDelete');

?>
