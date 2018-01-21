<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2016-07-10 01:35:48
$dictionary["rc_topic"]["fields"]["rc_topic_rc_topic"]=array (
  'name' => 'rc_topic_rc_topic',
  'type' => 'link',
  'relationship' => 'rc_topic_rc_topic',
  'source' => 'non-db',
  'module' => 'rc_topic',
  'bean_name' => 'rc_topic',
  'vname' => 'LBL_RC_TOPIC_RC_TOPIC_FROM_RC_TOPIC_L_TITLE',
  'id_name' => 'rc_topic_rc_topicrc_topic_ida',
  'side' => 'left',
);
$dictionary["rc_topic"]["fields"]["rc_topic_rc_topic_name"] = array (
  'name' => 'rc_topic_rc_topic_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_RC_TOPIC_RC_TOPIC_FROM_RC_TOPIC_L_TITLE',
  'save' => true,
  'id_name' => 'rc_topic_rc_topicrc_topic_ida',
  'link' => 'rc_topic_rc_topic',
  'table' => 'rc_topic',
  'module' => 'rc_topic',
  'rname' => 'name',
);
$dictionary["rc_topic"]["fields"]["rc_topic_rc_topicrc_topic_ida"] = array (
  'name' => 'rc_topic_rc_topicrc_topic_ida',
  'type' => 'link',
  'relationship' => 'rc_topic_rc_topic',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_RC_TOPIC_RC_TOPIC_FROM_RC_TOPIC_R_TITLE',
);


// created: 2016-07-10 01:35:48
$dictionary["rc_topic"]["fields"]["rc_topic_rc_category"] = array (
  'name' => 'rc_topic_rc_category',
  'type' => 'link',
  'relationship' => 'rc_topic_rc_category',
  'source' => 'non-db',
  'module' => 'rc_category',
  'bean_name' => 'rc_category',
  'vname' => 'LBL_RC_TOPIC_RC_CATEGORY_FROM_RC_CATEGORY_TITLE',
  'id_name' => 'rc_topic_rc_categoryrc_category_ida',
);
$dictionary["rc_topic"]["fields"]["rc_topic_rc_category_name"] = array (
  'name' => 'rc_topic_rc_category_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_RC_TOPIC_RC_CATEGORY_FROM_RC_CATEGORY_TITLE',
  'save' => true,
  'id_name' => 'rc_topic_rc_categoryrc_category_ida',
  'link' => 'rc_topic_rc_category',
  'table' => 'rc_category',
  'module' => 'rc_category',
  'rname' => 'name',
);
$dictionary["rc_topic"]["fields"]["rc_topic_rc_categoryrc_category_ida"] = array (
  'name' => 'rc_topic_rc_categoryrc_category_ida',
  'type' => 'link',
  'relationship' => 'rc_topic_rc_category',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_RC_TOPIC_RC_CATEGORY_FROM_RC_TOPIC_TITLE',
);


// created: 2016-07-10 01:35:48
$dictionary["rc_topic"]["fields"]["rc_topic_users"] = array (
  'name' => 'rc_topic_users',
  'type' => 'link',
  'relationship' => 'rc_topic_users',
  'source' => 'non-db',
  'module' => 'Users',
  'bean_name' => 'User',
  'vname' => 'LBL_RC_TOPIC_USERS_FROM_USERS_TITLE',
);


// created: 2016-09-10 18:19:34
$dictionary["rc_topic"]["fields"]["rc_topic_rc_image_1"] = array (
  'name' => 'rc_topic_rc_image_1',
  'type' => 'link',
  'relationship' => 'rc_topic_rc_image_1',
  'source' => 'non-db',
  'module' => 'rc_image',
  'bean_name' => 'rc_image',
  'side' => 'right',
  'vname' => 'LBL_RC_TOPIC_RC_IMAGE_1_FROM_RC_IMAGE_TITLE',
);



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