
{if strval($fields.is_admin.value) == "1" || strval($fields.is_admin.value) == "yes" || strval($fields.is_admin.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.is_admin.name}" value="0"> 
<input type="checkbox" id="{$fields.is_admin.name}" 
name="{$fields.is_admin.name}" 
value="1" title='' tabindex="1" {$checked} >