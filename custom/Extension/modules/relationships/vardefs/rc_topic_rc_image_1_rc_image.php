<?php
// created: 2016-09-10 18:19:34
$dictionary["rc_image"]["fields"]["rc_topic_rc_image_1"] = array (
  'name' => 'rc_topic_rc_image_1',
  'type' => 'link',
  'relationship' => 'rc_topic_rc_image_1',
  'source' => 'non-db',
  'module' => 'rc_topic',
  'bean_name' => 'rc_topic',
  'vname' => 'LBL_RC_TOPIC_RC_IMAGE_1_FROM_RC_TOPIC_TITLE',
  'id_name' => 'rc_topic_rc_image_1rc_topic_ida',
);
$dictionary["rc_image"]["fields"]["rc_topic_rc_image_1_name"] = array (
  'name' => 'rc_topic_rc_image_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_RC_TOPIC_RC_IMAGE_1_FROM_RC_TOPIC_TITLE',
  'save' => true,
  'id_name' => 'rc_topic_rc_image_1rc_topic_ida',
  'link' => 'rc_topic_rc_image_1',
  'table' => 'rc_topic',
  'module' => 'rc_topic',
  'rname' => 'name',
);
$dictionary["rc_image"]["fields"]["rc_topic_rc_image_1rc_topic_ida"] = array (
  'name' => 'rc_topic_rc_image_1rc_topic_ida',
  'type' => 'link',
  'relationship' => 'rc_topic_rc_image_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_RC_TOPIC_RC_IMAGE_1_FROM_RC_IMAGE_TITLE',
);
