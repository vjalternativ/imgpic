<?php
// created: 2016-07-04 13:52:26
$dictionary["rc_category"]["fields"]["rc_category_users"] = array (
  'name' => 'rc_category_users',
  'type' => 'link',
  'relationship' => 'rc_category_users',
  'source' => 'non-db',
  'module' => 'Users',
  'bean_name' => 'User',
  'vname' => 'LBL_RC_CATEGORY_USERS_FROM_USERS_TITLE',
  'id_name' => 'rc_category_usersusers_ida',
);
$dictionary["rc_category"]["fields"]["rc_category_users_name"] = array (
  'name' => 'rc_category_users_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_RC_CATEGORY_USERS_FROM_USERS_TITLE',
  'save' => true,
  'id_name' => 'rc_category_usersusers_ida',
  'link' => 'rc_category_users',
  'table' => 'users',
  'module' => 'Users',
  'rname' => 'name',
);
$dictionary["rc_category"]["fields"]["rc_category_usersusers_ida"] = array (
  'name' => 'rc_category_usersusers_ida',
  'type' => 'link',
  'relationship' => 'rc_category_users',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_RC_CATEGORY_USERS_FROM_RC_CATEGORY_TITLE',
);
