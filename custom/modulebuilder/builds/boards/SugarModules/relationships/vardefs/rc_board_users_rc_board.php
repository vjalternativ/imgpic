<?php
// created: 2016-07-06 07:20:29
$dictionary["rc_board"]["fields"]["rc_board_users"] = array (
  'name' => 'rc_board_users',
  'type' => 'link',
  'relationship' => 'rc_board_users',
  'source' => 'non-db',
  'module' => 'Users',
  'bean_name' => 'User',
  'vname' => 'LBL_RC_BOARD_USERS_FROM_USERS_TITLE',
  'id_name' => 'rc_board_usersusers_ida',
);
$dictionary["rc_board"]["fields"]["rc_board_users_name"] = array (
  'name' => 'rc_board_users_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_RC_BOARD_USERS_FROM_USERS_TITLE',
  'save' => true,
  'id_name' => 'rc_board_usersusers_ida',
  'link' => 'rc_board_users',
  'table' => 'users',
  'module' => 'Users',
  'rname' => 'name',
);
$dictionary["rc_board"]["fields"]["rc_board_usersusers_ida"] = array (
  'name' => 'rc_board_usersusers_ida',
  'type' => 'link',
  'relationship' => 'rc_board_users',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_RC_BOARD_USERS_FROM_RC_BOARD_TITLE',
);
