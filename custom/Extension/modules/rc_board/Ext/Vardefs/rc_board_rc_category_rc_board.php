<?php
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
