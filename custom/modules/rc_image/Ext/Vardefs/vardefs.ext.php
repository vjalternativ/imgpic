<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2016-09-10 18:19:34
$dictionary["rc_image"]["fields"]["rc_topic_rc_image_1"] = array (
  'name' => 'rc_topic_rc_image_1',
  'type' => 'link',
  'relationship' => 'rc_topic_rc_image_1',
  'source' => 'non-db',
  'module' => 'rc_topic',
  'bean_name' => 'rc_topic',
  'vname' => 'LBL_RC_TOPIC_RC_IMAGE_1_FROM_RC_TOPIC_TITLE',
  'id_name' => 'rc_topic_rc_image_1rc_topic_ida',
);
$dictionary["rc_image"]["fields"]["rc_topic_rc_image_1_name"] = array (
  'name' => 'rc_topic_rc_image_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_RC_TOPIC_RC_IMAGE_1_FROM_RC_TOPIC_TITLE',
  'save' => true,
  'id_name' => 'rc_topic_rc_image_1rc_topic_ida',
  'link' => 'rc_topic_rc_image_1',
  'table' => 'rc_topic',
  'module' => 'rc_topic',
  'rname' => 'name',
);
$dictionary["rc_image"]["fields"]["rc_topic_rc_image_1rc_topic_ida"] = array (
  'name' => 'rc_topic_rc_image_1rc_topic_ida',
  'type' => 'link',
  'relationship' => 'rc_topic_rc_image_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_RC_TOPIC_RC_IMAGE_1_FROM_RC_IMAGE_TITLE',
);


// created: 2016-07-06 07:47:30
$dictionary["rc_image"]["fields"]["rc_image_rc_board"] = array (
  'name' => 'rc_image_rc_board',
  'type' => 'link',
  'relationship' => 'rc_image_rc_board',
  'source' => 'non-db',
  'module' => 'rc_board',
  'bean_name' => 'rc_board',
  'vname' => 'LBL_RC_IMAGE_RC_BOARD_FROM_RC_BOARD_TITLE',
);


 $dictionary['rc_image']['fields']['website'] = array(
            'name' => 'website',
            'label' => 'LBL_WEBSITE',
            'type' => 'varchar',
			'max_size' => 255,
            'mass_update' => false, // true or false
            'required' => false, // true or false
            'reportable' => true, // true or false
            'audited' => true, // true or false
            'importable' => 'true', // 'true', 'false' or 'required'
            'duplicate_merge' => false, // true or false
        );
		
		
		$dictionary['rc_image']['fields']['unique_id'] = array(
            'name' => 'unique_id',
            'label' => 'LBL_WEBSITE',
            'type' => 'int',
			'mass_update' => false, // true or false
            'required' => false, // true or false
            'reportable' => true, // true or false
            'audited' => true, // true or false
            'importable' => 'true', // 'true', 'false' or 'required'
            'duplicate_merge' => false, // true or false
			'auto_increment' => true
        );
		
		
		 $dictionary['rc_image']['fields']['totalviews'] = array(
            'name' => 'totalviews',
            'label' => 'LBL_VIEWS',
            'type' => 'int',
			'max_size' => 255,
            'mass_update' => false, // true or false
            'required' => false, // true or false
            'reportable' => true, // true or false
            'audited' => true, // true or false
            'importable' => 'true', // 'true', 'false' or 'required'
            'duplicate_merge' => false, // true or false
        );
		
		
		$dictionary['rc_image']['fields']['ischecked'] = array(
            'name' => 'ischecked',
            'label' => 'LBL_ISCHECKED',
            'type' => 'int',
			'mass_update' => false, // true or false
            'required' => false, // true or false
            'reportable' => true, // true or false
            'audited' => true, // true or false
            'importable' => 'true', // 'true', 'false' or 'required'
            'duplicate_merge' => false, // true or false
			
        );
$dictionary['rc_image']['fields']['thumbnail'] = array(
		'name' => 'thumbnail',
		'label' => 'LBL_THUMBNAIL',
		'type' => 'varchar',
		'max_size' => 255,
		'mass_update' => false, // true or false
		'required' => false, // true or false
		'reportable' => true, // true or false
		'audited' => false, // true or false
		'importable' => 'true', // 'true', 'false' or 'required'
		'duplicate_merge' => false, // true or false
);




// created: 2016-07-09 21:50:40
$dictionary["rc_image"]["fields"]["rc_image_users_1"] = array (
  'name' => 'rc_image_users_1',
  'type' => 'link',
  'relationship' => 'rc_image_users_1',
  'source' => 'non-db',
  'module' => 'Users',
  'bean_name' => 'User',
  'vname' => 'LBL_RC_IMAGE_USERS_1_FROM_USERS_TITLE',
);

?>