<?php /* Smarty version 2.6.29, created on 2017-12-25 17:08:53
         compiled from cache/include/InlineEditing/rc_topicEditViewhasad.tpl */ ?>

<?php if (strval ( $this->_tpl_vars['fields']['hasad']['value'] ) == '1' || strval ( $this->_tpl_vars['fields']['hasad']['value'] ) == 'yes' || strval ( $this->_tpl_vars['fields']['hasad']['value'] ) == 'on'): ?> 
<?php $this->assign('checked', 'checked="checked"'); ?>
<?php else: ?>
<?php $this->assign('checked', ""); ?>
<?php endif; ?>
<input type="hidden" name="<?php echo $this->_tpl_vars['fields']['hasad']['name']; ?>
" value="0"> 
<input type="checkbox" id="<?php echo $this->_tpl_vars['fields']['hasad']['name']; ?>
" 
name="<?php echo $this->_tpl_vars['fields']['hasad']['name']; ?>
" 
value="1" title='Bool Field Help Text' tabindex="1" <?php echo $this->_tpl_vars['checked']; ?>
 >