<?php
$module_name = 'rc_topic';
$viewdefs [$module_name] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'EDIT',
          1 => 'DUPLICATE',
          2 => 'DELETE',
          3 => 'FIND_DUPLICATES',
        ),
      ),
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
          0 => 'date_entered',
          1 => 'date_modified',
        ),
        2 => 
        array (
          0 => 'description',
          1 => 
          array (
            'name' => 'rc_topic_rc_category_name',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'filename',
            'label' => 'LBL_FILENAME',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'created_by_name',
            'label' => 'LBL_CREATED',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'rc_topic_rc_topic_name',
            'label' => 'LBL_RC_TOPIC_RC_TOPIC_FROM_RC_TOPIC_L_TITLE',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'alias',
            'label' => 'LBL_ALIAS',
          ),
          1 => 
          array (
            'name' => 'hasad',
            'label' => 'LBL_HASAD',
            'comment' => 'Bool Field Comment',
            'studio' => 'visible',
          ),
        ),
      ),
    ),
  ),
);
?>
