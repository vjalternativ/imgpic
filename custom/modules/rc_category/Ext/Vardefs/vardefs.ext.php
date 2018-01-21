<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2016-07-10 01:35:48
$dictionary["rc_category"]["fields"]["rc_topic_rc_category"] = array (
  'name' => 'rc_topic_rc_category',
  'type' => 'link',
  'relationship' => 'rc_topic_rc_category',
  'source' => 'non-db',
  'module' => 'rc_topic',
  'bean_name' => 'rc_topic',
  'side' => 'right',
  'vname' => 'LBL_RC_TOPIC_RC_CATEGORY_FROM_RC_TOPIC_TITLE',
);


// created: 2016-07-06 07:20:29
$dictionary["rc_category"]["fields"]["rc_board_rc_category"] = array (
  'name' => 'rc_board_rc_category',
  'type' => 'link',
  'relationship' => 'rc_board_rc_category',
  'source' => 'non-db',
  'module' => 'rc_board',
  'bean_name' => 'rc_board',
  'side' => 'right',
  'vname' => 'LBL_RC_BOARD_RC_CATEGORY_FROM_RC_BOARD_TITLE',
);


// created: 2016-07-06 07:14:01
$dictionary["rc_category"]["fields"]["rc_category_users"] = array (
  'name' => 'rc_category_users',
  'type' => 'link',
  'relationship' => 'rc_category_users',
  'source' => 'non-db',
  'module' => 'Users',
  'bean_name' => 'User',
  'vname' => 'LBL_RC_CATEGORY_USERS_FROM_USERS_TITLE',
);


 $dictionary['rc_category']['fields']['alias'] = array(
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

 


// created: 2016-07-06 07:14:01
$dictionary["rc_category"]["fields"]["rc_category_rc_category"]=array (
  'name' => 'rc_category_rc_category',
  'type' => 'link',
  'relationship' => 'rc_category_rc_category',
  'source' => 'non-db',
  'module' => 'rc_category',
  'bean_name' => 'rc_category',
  'vname' => 'LBL_RC_CATEGORY_RC_CATEGORY_FROM_RC_CATEGORY_L_TITLE',
  'id_name' => 'rc_category_rc_categoryrc_category_ida',
  'side' => 'left',
);
$dictionary["rc_category"]["fields"]["rc_category_rc_category_name"] = array (
  'name' => 'rc_category_rc_category_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_RC_CATEGORY_RC_CATEGORY_FROM_RC_CATEGORY_L_TITLE',
  'save' => true,
  'id_name' => 'rc_category_rc_categoryrc_category_ida',
  'link' => 'rc_category_rc_category',
  'table' => 'rc_category',
  'module' => 'rc_category',
  'rname' => 'name',
);
$dictionary["rc_category"]["fields"]["rc_category_rc_categoryrc_category_ida"] = array (
  'name' => 'rc_category_rc_categoryrc_category_ida',
  'type' => 'link',
  'relationship' => 'rc_category_rc_category',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_RC_CATEGORY_RC_CATEGORY_FROM_RC_CATEGORY_R_TITLE',
);

?>