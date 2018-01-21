<?php
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

?>
