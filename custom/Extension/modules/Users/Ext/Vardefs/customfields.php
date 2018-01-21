<?php
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
		
?>