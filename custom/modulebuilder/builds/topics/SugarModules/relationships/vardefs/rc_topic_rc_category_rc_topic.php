<?php
// created: 2016-07-10 01:35:48
$dictionary["rc_topic"]["fields"]["rc_topic_rc_category"] = array (
  'name' => 'rc_topic_rc_category',
  'type' => 'link',
  'relationship' => 'rc_topic_rc_category',
  'source' => 'non-db',
  'module' => 'rc_category',
  'bean_name' => 'rc_category',
  'vname' => 'LBL_RC_TOPIC_RC_CATEGORY_FROM_RC_CATEGORY_TITLE',
  'id_name' => 'rc_topic_rc_categoryrc_category_ida',
);
$dictionary["rc_topic"]["fields"]["rc_topic_rc_category_name"] = array (
  'name' => 'rc_topic_rc_category_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_RC_TOPIC_RC_CATEGORY_FROM_RC_CATEGORY_TITLE',
  'save' => true,
  'id_name' => 'rc_topic_rc_categoryrc_category_ida',
  'link' => 'rc_topic_rc_category',
  'table' => 'rc_category',
  'module' => 'rc_category',
  'rname' => 'name',
);
$dictionary["rc_topic"]["fields"]["rc_topic_rc_categoryrc_category_ida"] = array (
  'name' => 'rc_topic_rc_categoryrc_category_ida',
  'type' => 'link',
  'relationship' => 'rc_topic_rc_category',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_RC_TOPIC_RC_CATEGORY_FROM_RC_TOPIC_TITLE',
);
