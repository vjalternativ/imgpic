<?php

 $dictionary['rc_topic']['fields']['alias'] = array(

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



$dictionary['rc_topic']['fields']['hasad'] = array(
            'name' => 'hasad',
            'label' => 'LBL_HASAD',
            'type' => 'bool',
            'default_value' => false, // true or false
            'help' => 'Bool Field Help Text',
            'comment' => 'Bool Field Comment',
            'audited' => false, // true or false
            'mass_update' => false, // true or false
            'duplicate_merge' => false, // true or false
            'reportable' => true, // true or false
            'importable' => 'true', // 'true', 'false' or 'required'
			'studio' => 'visible'
        );


 

?>

