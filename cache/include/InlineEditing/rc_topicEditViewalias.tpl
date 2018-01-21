
{if strlen($fields.alias.value) <= 0}
{assign var="value" value=$fields.alias.default_value }
{else}
{assign var="value" value=$fields.alias.value }
{/if}  
<input type='text' name='{$fields.alias.name}' 
    id='{$fields.alias.name}' size='30' 
     
    value='{$value}' title=''  tabindex='1'      >