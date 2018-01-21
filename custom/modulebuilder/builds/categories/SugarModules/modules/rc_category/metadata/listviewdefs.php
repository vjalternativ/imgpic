<?php
$module_name = 'rc_category';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'FILENAME' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_FILENAME',
    'width' => '10%',
    'default' => true,
  ),
  'RC_CATEGORY_RC_CATEGORY_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_RC_CATEGORY_RC_CATEGORY_FROM_RC_CATEGORY_L_TITLE',
    'id' => 'RC_CATEGORY_RC_CATEGORYRC_CATEGORY_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'DATE_ENTERED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => false,
  ),
);
?>
