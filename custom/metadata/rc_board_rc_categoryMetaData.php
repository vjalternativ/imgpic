<?php
// created: 2016-07-06 07:20:29
$dictionary["rc_board_rc_category"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'rc_board_rc_category' => 
    array (
      'lhs_module' => 'rc_category',
      'lhs_table' => 'rc_category',
      'lhs_key' => 'id',
      'rhs_module' => 'rc_board',
      'rhs_table' => 'rc_board',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'rc_board_rc_category_c',
      'join_key_lhs' => 'rc_board_rc_categoryrc_category_ida',
      'join_key_rhs' => 'rc_board_rc_categoryrc_board_idb',
    ),
  ),
  'table' => 'rc_board_rc_category_c',
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
      'name' => 'rc_board_rc_categoryrc_category_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'rc_board_rc_categoryrc_board_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'rc_board_rc_categoryspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'rc_board_rc_category_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'rc_board_rc_categoryrc_category_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'rc_board_rc_category_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'rc_board_rc_categoryrc_board_idb',
      ),
    ),
  ),
);