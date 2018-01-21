<?php
$module_name = 'rc_topic';
$viewdefs [$module_name] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'useTabs' => false,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 'name',
          1 => 'assigned_user_name',
        ),
        1 => 
        array (
          0 => 'description',
          1 => 
          array (
            'name' => 'rc_topic_rc_category_name',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'attachment',
            'studio' => 'visible',
            'label' => 'LBL_ATTACHMENT',
          ),
          1 => 
          array (
            'name' => 'rc_topic_rc_topic_name',
            'label' => 'LBL_RC_TOPIC_RC_TOPIC_FROM_RC_TOPIC_L_TITLE',
          ),
        ),
      ),
    ),
  ),
);
?>
