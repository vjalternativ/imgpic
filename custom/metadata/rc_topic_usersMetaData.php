<?php
// created: 2016-07-10 01:35:48
$dictionary["rc_topic_users"] = array (
  'true_relationship_type' => 'many-to-many',
  'relationships' => 
  array (
    'rc_topic_users' => 
    array (
      'lhs_module' => 'rc_topic',
      'lhs_table' => 'rc_topic',
      'lhs_key' => 'id',
      'rhs_module' => 'Users',
      'rhs_table' => 'users',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'rc_topic_users_c',
      'join_key_lhs' => 'rc_topic_usersrc_topic_ida',
      'join_key_rhs' => 'rc_topic_usersusers_idb',
    ),
  ),
  'table' => 'rc_topic_users_c',
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
      'name' => 'rc_topic_usersrc_topic_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'rc_topic_usersusers_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'rc_topic_usersspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'rc_topic_users_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'rc_topic_usersrc_topic_ida',
        1 => 'rc_topic_usersusers_idb',
      ),
    ),
  ),
);