<?php
// created: 2016-07-10 01:35:48
$dictionary["rc_topic"]["fields"]["rc_topic_rc_topic"]=array (
  'name' => 'rc_topic_rc_topic',
  'type' => 'link',
  'relationship' => 'rc_topic_rc_topic',
  'source' => 'non-db',
  'module' => 'rc_topic',
  'bean_name' => 'rc_topic',
  'vname' => 'LBL_RC_TOPIC_RC_TOPIC_FROM_RC_TOPIC_L_TITLE',
  'id_name' => 'rc_topic_rc_topicrc_topic_ida',
  'side' => 'left',
);
$dictionary["rc_topic"]["fields"]["rc_topic_rc_topic_name"] = array (
  'name' => 'rc_topic_rc_topic_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_RC_TOPIC_RC_TOPIC_FROM_RC_TOPIC_L_TITLE',
  'save' => true,
  'id_name' => 'rc_topic_rc_topicrc_topic_ida',
  'link' => 'rc_topic_rc_topic',
  'table' => 'rc_topic',
  'module' => 'rc_topic',
  'rname' => 'name',
);
$dictionary["rc_topic"]["fields"]["rc_topic_rc_topicrc_topic_ida"] = array (
  'name' => 'rc_topic_rc_topicrc_topic_ida',
  'type' => 'link',
  'relationship' => 'rc_topic_rc_topic',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_RC_TOPIC_RC_TOPIC_FROM_RC_TOPIC_R_TITLE',
);
