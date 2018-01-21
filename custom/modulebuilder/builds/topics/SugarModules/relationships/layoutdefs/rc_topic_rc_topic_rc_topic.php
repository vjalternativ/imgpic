<?php
 // created: 2016-07-10 01:35:48
$layout_defs["rc_topic"]["subpanel_setup"]['rc_topic_rc_topicrc_topic_ida'] = array (
  'order' => 100,
  'module' => 'rc_topic',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_RC_TOPIC_RC_TOPIC_FROM_RC_TOPIC_R_TITLE',
  'get_subpanel_data' => 'rc_topic_rc_topicrc_topic_ida',
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
