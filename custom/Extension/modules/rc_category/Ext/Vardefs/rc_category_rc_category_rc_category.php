<?php
// created: 2016-07-06 07:14:01
$dictionary["rc_category"]["fields"]["rc_category_rc_category"]=array (
  'name' => 'rc_category_rc_category',
  'type' => 'link',
  'relationship' => 'rc_category_rc_category',
  'source' => 'non-db',
  'module' => 'rc_category',
  'bean_name' => 'rc_category',
  'vname' => 'LBL_RC_CATEGORY_RC_CATEGORY_FROM_RC_CATEGORY_L_TITLE',
  'id_name' => 'rc_category_rc_categoryrc_category_ida',
  'side' => 'left',
);
$dictionary["rc_category"]["fields"]["rc_category_rc_category_name"] = array (
  'name' => 'rc_category_rc_category_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_RC_CATEGORY_RC_CATEGORY_FROM_RC_CATEGORY_L_TITLE',
  'save' => true,
  'id_name' => 'rc_category_rc_categoryrc_category_ida',
  'link' => 'rc_category_rc_category',
  'table' => 'rc_category',
  'module' => 'rc_category',
  'rname' => 'name',
);
$dictionary["rc_category"]["fields"]["rc_category_rc_categoryrc_category_ida"] = array (
  'name' => 'rc_category_rc_categoryrc_category_ida',
  'type' => 'link',
  'relationship' => 'rc_category_rc_category',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_RC_CATEGORY_RC_CATEGORY_FROM_RC_CATEGORY_R_TITLE',
);
