<?php
// created: 2016-07-06 07:47:30
$dictionary["rc_image_rc_board"] = array (
  'true_relationship_type' => 'many-to-many',
  'relationships' => 
  array (
    'rc_image_rc_board' => 
    array (
      'lhs_module' => 'rc_image',
      'lhs_table' => 'rc_image',
      'lhs_key' => 'id',
      'rhs_module' => 'rc_board',
      'rhs_table' => 'rc_board',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'rc_image_rc_board_c',
      'join_key_lhs' => 'rc_image_rc_boardrc_image_ida',
      'join_key_rhs' => 'rc_image_rc_boardrc_board_idb',
    ),
  ),
  'table' => 'rc_image_rc_board_c',
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
      'name' => 'rc_image_rc_boardrc_image_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'rc_image_rc_boardrc_board_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'rc_image_rc_boardspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'rc_image_rc_board_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'rc_image_rc_boardrc_image_ida',
        1 => 'rc_image_rc_boardrc_board_idb',
      ),
    ),
  ),
);