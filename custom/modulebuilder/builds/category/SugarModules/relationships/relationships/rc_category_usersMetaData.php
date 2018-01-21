<?php
// created: 2016-07-04 13:52:26
$dictionary["rc_category_users"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'rc_category_users' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'rc_category',
      'rhs_table' => 'rc_category',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'rc_category_users_c',
      'join_key_lhs' => 'rc_category_usersusers_ida',
      'join_key_rhs' => 'rc_category_usersrc_category_idb',
    ),
  ),
  'table' => 'rc_category_users_c',
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
      'name' => 'rc_category_usersusers_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'rc_category_usersrc_category_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'rc_category_usersspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'rc_category_users_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'rc_category_usersusers_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'rc_category_users_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'rc_category_usersrc_category_idb',
      ),
    ),
  ),
);