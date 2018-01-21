<?php
 // created: 2016-07-09 21:50:40
$layout_defs["Users"]["subpanel_setup"]['rc_image_users_1'] = array (
  'order' => 100,
  'module' => 'rc_image',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_RC_IMAGE_USERS_1_FROM_RC_IMAGE_TITLE',
  'get_subpanel_data' => 'rc_image_users_1',
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
