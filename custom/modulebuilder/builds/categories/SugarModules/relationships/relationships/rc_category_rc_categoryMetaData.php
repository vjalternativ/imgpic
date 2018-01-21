<?php
// created: 2016-07-06 07:14:01
$dictionary["rc_category_rc_category"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'rc_category_rc_category' => 
    array (
      'lhs_module' => 'rc_category',
      'lhs_table' => 'rc_category',
      'lhs_key' => 'id',
      'rhs_module' => 'rc_category',
      'rhs_table' => 'rc_category',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'rc_category_rc_category_c',
      'join_key_lhs' => 'rc_category_rc_categoryrc_category_ida',
      'join_key_rhs' => 'rc_category_rc_categoryrc_category_idb',
    ),
  ),
  'table' => 'rc_category_rc_category_c',
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
      'name' => 'rc_category_rc_categoryrc_category_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'rc_category_rc_categoryrc_category_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'rc_category_rc_categoryspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'rc_category_rc_category_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'rc_category_rc_categoryrc_category_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'rc_category_rc_category_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'rc_category_rc_categoryrc_category_idb',
      ),
    ),
  ),
);