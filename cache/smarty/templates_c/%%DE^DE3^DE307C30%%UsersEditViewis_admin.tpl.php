<?php /* Smarty version 2.6.29, created on 2017-12-28 04:05:38
         compiled from cache/include/InlineEditing/UsersEditViewis_admin.tpl */ ?>

<?php if (strval ( $this->_tpl_vars['fields']['is_admin']['value'] ) == '1' || strval ( $this->_tpl_vars['fields']['is_admin']['value'] ) == 'yes' || strval ( $this->_tpl_vars['fields']['is_admin']['value'] ) == 'on'): ?> 
<?php $this->assign('checked', 'checked="checked"'); ?>
<?php else: ?>
<?php $this->assign('checked', ""); ?>
<?php endif; ?>
<input type="hidden" name="<?php echo $this->_tpl_vars['fields']['is_admin']['name']; ?>
" value="0"> 
<input type="checkbox" id="<?php echo $this->_tpl_vars['fields']['is_admin']['name']; ?>
" 
name="<?php echo $this->_tpl_vars['fields']['is_admin']['name']; ?>
" 
value="1" title='' tabindex="1" <?php echo $this->_tpl_vars['checked']; ?>
 >