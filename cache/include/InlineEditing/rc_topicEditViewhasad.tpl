
{if strval($fields.hasad.value) == "1" || strval($fields.hasad.value) == "yes" || strval($fields.hasad.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.hasad.name}" value="0"> 
<input type="checkbox" id="{$fields.hasad.name}" 
name="{$fields.hasad.name}" 
value="1" title='Bool Field Help Text' tabindex="1" {$checked} >