<?php
// created: 2016-07-10 12:57:12
$dictionary["rc_board_users_1"] = array (
  'true_relationship_type' => 'many-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'rc_board_users_1' => 
    array (
      'lhs_module' => 'rc_board',
      'lhs_table' => 'rc_board',
      'lhs_key' => 'id',
      'rhs_module' => 'Users',
      'rhs_table' => 'users',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'rc_board_users_1_c',
      'join_key_lhs' => 'rc_board_users_1rc_board_ida',
      'join_key_rhs' => 'rc_board_users_1users_idb',
    ),
  ),
  'table' => 'rc_board_users_1_c',
  'fields' => 
  array (
    0 => 
    array (
      'name' => 'id',
      'type' => 'varchar',
      'len' => 36,
    ),
    1 => 
    array (
      'name' => 'date_modified',
      'type' => 'datetime',
    ),
    2 => 
    array (
      'name' => 'deleted',
      'type' => 'bool',
      'len' => '1',
      'default' => '0',
      'required' => true,
    ),
    3 => 
    array (
      'name' => 'rc_board_users_1rc_board_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'rc_board_users_1users_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'rc_board_users_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'rc_board_users_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'rc_board_users_1rc_board_ida',
        1 => 'rc_board_users_1users_idb',
      ),
    ),
  ),
);