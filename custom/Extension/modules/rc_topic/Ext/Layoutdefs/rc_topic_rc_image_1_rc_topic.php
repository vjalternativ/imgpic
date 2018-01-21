<?php
 // created: 2016-09-10 18:19:33
$layout_defs["rc_topic"]["subpanel_setup"]['rc_topic_rc_image_1'] = array (
  'order' => 100,
  'module' => 'rc_image',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_RC_TOPIC_RC_IMAGE_1_FROM_RC_IMAGE_TITLE',
  'get_subpanel_data' => 'rc_topic_rc_image_1',
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
