<?php
 // created: 2016-07-10 12:46:40
$layout_defs["Users"]["subpanel_setup"]['rc_following_users'] = array (
  'order' => 100,
  'module' => 'rc_following',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_RC_FOLLOWING_USERS_FROM_RC_FOLLOWING_TITLE',
  'get_subpanel_data' => 'rc_following_users',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);
