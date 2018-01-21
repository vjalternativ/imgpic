<?php
$module_name = 'rc_topic';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
  'RC_TOPIC_RC_CATEGORY_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_RC_TOPIC_RC_CATEGORY_FROM_RC_CATEGORY_TITLE',
    'id' => 'RC_TOPIC_RC_CATEGORYRC_CATEGORY_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'FILENAME' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_FILENAME',
    'width' => '10%',
    'default' => true,
  ),
);
?>
