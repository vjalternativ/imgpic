<?php
 // created: 2016-07-06 07:14:01
$layout_defs["rc_category"]["subpanel_setup"]['rc_category_rc_categoryrc_category_ida'] = array (
  'order' => 100,
  'module' => 'rc_category',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_RC_CATEGORY_RC_CATEGORY_FROM_RC_CATEGORY_R_TITLE',
  'get_subpanel_data' => 'rc_category_rc_categoryrc_category_ida',
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
