<?php
 // created: 2016-07-06 07:20:29
$layout_defs["Users"]["subpanel_setup"]['rc_board_users'] = array (
  'order' => 100,
  'module' => 'rc_board',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_RC_BOARD_USERS_FROM_RC_BOARD_TITLE',
  'get_subpanel_data' => 'rc_board_users',
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
