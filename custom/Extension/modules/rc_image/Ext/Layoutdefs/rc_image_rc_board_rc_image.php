<?php
 // created: 2016-07-06 07:47:30
$layout_defs["rc_image"]["subpanel_setup"]['rc_image_rc_board'] = array (
  'order' => 100,
  'module' => 'rc_board',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_RC_IMAGE_RC_BOARD_FROM_RC_BOARD_TITLE',
  'get_subpanel_data' => 'rc_image_rc_board',
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
