<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2016-07-06 07:20:29
$dictionary["rc_board"]["fields"]["rc_board_rc_category"] = array (
  'name' => 'rc_board_rc_category',
  'type' => 'link',
  'relationship' => 'rc_board_rc_category',
  'source' => 'non-db',
  'module' => 'rc_category',
  'bean_name' => 'rc_category',
  'vname' => 'LBL_RC_BOARD_RC_CATEGORY_FROM_RC_CATEGORY_TITLE',
  'id_name' => 'rc_board_rc_categoryrc_category_ida',
);
$dictionary["rc_board"]["fields"]["rc_board_rc_category_name"] = array (
  'name' => 'rc_board_rc_category_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_RC_BOARD_RC_CATEGORY_FROM_RC_CATEGORY_TITLE',
  'save' => true,
  'id_name' => 'rc_board_rc_categoryrc_category_ida',
  'link' => 'rc_board_rc_category',
  'table' => 'rc_category',
  'module' => 'rc_category',
  'rname' => 'name',
);
$dictionary["rc_board"]["fields"]["rc_board_rc_categoryrc_category_ida"] = array (
  'name' => 'rc_board_rc_categoryrc_category_ida',
  'type' => 'link',
  'relationship' => 'rc_board_rc_category',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_RC_BOARD_RC_CATEGORY_FROM_RC_BOARD_TITLE',
);


// created: 2016-07-06 07:47:30
$dictionary["rc_board"]["fields"]["rc_image_rc_board"] = array (
  'name' => 'rc_image_rc_board',
  'type' => 'link',
  'relationship' => 'rc_image_rc_board',
  'source' => 'non-db',
  'module' => 'rc_image',
  'bean_name' => 'rc_image',
  'vname' => 'LBL_RC_IMAGE_RC_BOARD_FROM_RC_IMAGE_TITLE',
);


 $dictionary['rc_board']['fields']['alias'] = array(
            'name' => 'alias',
            'label' => 'LBL_ALIAS',
			'vname' => 'LBL_ALIAS',
            'type' => 'varchar',
			'max_size' => 255,
            'mass_update' => false, // true or false
            'required' => false, // true or false
            'reportable' => true, // true or false
            'audited' => false, // true or false
            'importable' => 'true', // 'true', 'false' or 'required'
            'duplicate_merge' => false, // true or false
        );

 


// created: 2016-07-10 12:57:12
$dictionary["rc_board"]["fields"]["rc_board_users_1"] = array (
  'name' => 'rc_board_users_1',
  'type' => 'link',
  'relationship' => 'rc_board_users_1',
  'source' => 'non-db',
  'module' => 'Users',
  'bean_name' => 'User',
  'vname' => 'LBL_RC_BOARD_USERS_1_FROM_USERS_TITLE',
);


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

?>