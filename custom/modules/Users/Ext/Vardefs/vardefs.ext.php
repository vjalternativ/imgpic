<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2016-07-09 21:50:40
$dictionary["User"]["fields"]["rc_image_users_1"] = array (
  'name' => 'rc_image_users_1',
  'type' => 'link',
  'relationship' => 'rc_image_users_1',
  'source' => 'non-db',
  'module' => 'rc_image',
  'bean_name' => 'rc_image',
  'vname' => 'LBL_RC_IMAGE_USERS_1_FROM_RC_IMAGE_TITLE',
);


// created: 2016-07-06 07:14:01
$dictionary["User"]["fields"]["rc_category_users"] = array (
  'name' => 'rc_category_users',
  'type' => 'link',
  'relationship' => 'rc_category_users',
  'source' => 'non-db',
  'module' => 'rc_category',
  'bean_name' => 'rc_category',
  'vname' => 'LBL_RC_CATEGORY_USERS_FROM_RC_CATEGORY_TITLE',
);


// created: 2016-07-10 12:46:40
$dictionary["User"]["fields"]["rc_following_users"] = array (
  'name' => 'rc_following_users',
  'type' => 'link',
  'relationship' => 'rc_following_users',
  'source' => 'non-db',
  'module' => 'rc_following',
  'bean_name' => 'rc_following',
  'vname' => 'LBL_RC_FOLLOWING_USERS_FROM_RC_FOLLOWING_TITLE',
);


 $dictionary['User']['fields']['gender'] = array(
            'name' => 'gender',
            'label' => 'LBL_DROPDOWN_GENDER',
            'type' => 'enum',
            'options' => 'gender_list',
			'default_value' => 'male', //key of entry in specified list
            'mass_update' => false, // true or false
            'required' => false, // true or false
            'reportable' => true, // true or false
            'audited' => false, // true or false
            'importable' => 'true', // 'true', 'false' or 'required'
            'duplicate_merge' => false, // true or false
        );

 $dictionary['User']['fields']['source'] = array(
            'name' => 'source',
            'label' => 'LBL_DROPDOWN_SOURCE',
            'type' => 'enum',
            'options' => 'source_list',
			'default_value' => '', //key of entry in specified list
            'mass_update' => false, // true or false
            'required' => false, // true or false
            'reportable' => true, // true or false
            'audited' => false, // true or false
            'importable' => 'true', // 'true', 'false' or 'required'
            'duplicate_merge' => false, // true or false
        );
		
		
		$dictionary['User']['fields']['location'] = array(
            'name' => 'location',
            'label' => 'LBL_LOCATION',
            'type' => 'varchar',
            'max_size' => 255,
			'mass_update' => false, // true or false
            'required' => false, // true or false
            'reportable' => true, // true or false
            'audited' => false, // true or false
            'importable' => 'true', // 'true', 'false' or 'required'
            'duplicate_merge' => false, // true or false
        );
		 
		
		$dictionary['User']['fields']['website'] = array(
            'name' => 'website',
            'label' => 'LBL_WEBSITE',
            'type' => 'varchar',
            'max_size' => 255,
			'mass_update' => false, // true or false
            'required' => false, // true or false
            'reportable' => true, // true or false
            'audited' => false, // true or false
            'importable' => 'true', // 'true', 'false' or 'required'
            'duplicate_merge' => false, // true or false
        );
		


// created: 2016-07-10 13:45:26
$dictionary["User"]["fields"]["users_users_1"] = array (
  'name' => 'users_users_1',
  'type' => 'link',
  'relationship' => 'users_users_1',
  'source' => 'non-db',
  'module' => 'Users',
  'bean_name' => 'User',
  'vname' => 'LBL_USERS_USERS_1_FROM_USERS_L_TITLE',
);
$dictionary["User"]["fields"]["users_users_1"] = array (
  'name' => 'users_users_1',
  'type' => 'link',
  'relationship' => 'users_users_1',
  'source' => 'non-db',
  'module' => 'Users',
  'bean_name' => 'User',
  'vname' => 'LBL_USERS_USERS_1_FROM_USERS_R_TITLE',
);


// created: 2016-07-10 12:57:12
$dictionary["User"]["fields"]["rc_board_users_1"] = array (
  'name' => 'rc_board_users_1',
  'type' => 'link',
  'relationship' => 'rc_board_users_1',
  'source' => 'non-db',
  'module' => 'rc_board',
  'bean_name' => 'rc_board',
  'vname' => 'LBL_RC_BOARD_USERS_1_FROM_RC_BOARD_TITLE',
);


// created: 2016-07-10 01:35:48
$dictionary["User"]["fields"]["rc_topic_users"] = array (
  'name' => 'rc_topic_users',
  'type' => 'link',
  'relationship' => 'rc_topic_users',
  'source' => 'non-db',
  'module' => 'rc_topic',
  'bean_name' => 'rc_topic',
  'vname' => 'LBL_RC_TOPIC_USERS_FROM_RC_TOPIC_TITLE',
);


// created: 2016-07-06 07:20:29
$dictionary["User"]["fields"]["rc_board_users"] = array (
  'name' => 'rc_board_users',
  'type' => 'link',
  'relationship' => 'rc_board_users',
  'source' => 'non-db',
  'module' => 'rc_board',
  'bean_name' => 'rc_board',
  'side' => 'right',
  'vname' => 'LBL_RC_BOARD_USERS_FROM_RC_BOARD_TITLE',
);

?>