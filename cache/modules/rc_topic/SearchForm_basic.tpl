
<input type='hidden' id="orderByInput" name='orderBy' value=''/>
<input type='hidden' id="sortOrder" name='sortOrder' value=''/>
{if !isset($templateMeta.maxColumnsBasic)}
	{assign var="basicMaxColumns" value=$templateMeta.maxColumns}
{else}
    {assign var="basicMaxColumns" value=$templateMeta.maxColumnsBasic}
{/if}
<script>
{literal}
	$(function() {
	var $dialog = $('<div></div>')
		.html(SUGAR.language.get('app_strings', 'LBL_SEARCH_HELP_TEXT'))
		.dialog({
			autoOpen: false,
			title: SUGAR.language.get('app_strings', 'LBL_HELP'),
			width: 700
		});
		
		$('#filterHelp').click(function() {
		$dialog.dialog('open');
		// prevent the default action, e.g., following a link
	});
	
	});
{/literal}
</script>

<table width="100%" cellspacing="0" cellpadding="0" border="0">
<tr>
      
      
	{counter assign=index}
	{math equation="left % right"
   		  left=$index
          right=$basicMaxColumns
          assign=modVal
    }
	{if ($index % $basicMaxColumns == 1 && $index != 1)}
		</tr><tr>
	{/if}
	
	<td scope="row" nowrap="nowrap" width='1%' >
			<label for='name_basic'> {sugar_translate label='LBL_NAME' module='rc_topic'}
		</td>

	
	<td  nowrap="nowrap" width='1%'>
			
{if strlen($fields.name_basic.value) <= 0}
{assign var="value" value=$fields.name_basic.default_value }
{else}
{assign var="value" value=$fields.name_basic.value }
{/if}  
<input type='text' name='{$fields.name_basic.name}' 
    id='{$fields.name_basic.name}' size='30' 
    maxlength='255' 
    value='{$value}' title=''      accesskey='9'  >
   	   	</td>
    
      
	{counter assign=index}
	{math equation="left % right"
   		  left=$index
          right=$basicMaxColumns
          assign=modVal
    }
	{if ($index % $basicMaxColumns == 1 && $index != 1)}
		</tr><tr>
	{/if}
	
	<td scope="row" nowrap="nowrap" width='1%' >
		
		<label for='current_user_only_basic' >{sugar_translate label='LBL_CURRENT_USER_FILTER' module='rc_topic'}</label>
    	</td>

	
	<td  nowrap="nowrap" width='1%'>
			
{if strval($fields.current_user_only_basic.value) == "1" || strval($fields.current_user_only_basic.value) == "yes" || strval($fields.current_user_only_basic.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.current_user_only_basic.name}" value="0"> 
<input type="checkbox" id="{$fields.current_user_only_basic.name}" 
name="{$fields.current_user_only_basic.name}" 
value="1" title='' tabindex="" {$checked} >
   	   	</td>
    
      
	{counter assign=index}
	{math equation="left % right"
   		  left=$index
          right=$basicMaxColumns
          assign=modVal
    }
	{if ($index % $basicMaxColumns == 1 && $index != 1)}
		</tr><tr>
	{/if}
	
	<td scope="row" nowrap="nowrap" width='1%' >
		
		<label for='rc_topic_rc_category_name_basic' >{sugar_translate label='LBL_RC_TOPIC_RC_CATEGORY_FROM_RC_CATEGORY_TITLE' module='rc_topic'}</label>
    	</td>

	
	<td  nowrap="nowrap" width='1%'>
			
<input type="text" name="{$fields.rc_topic_rc_category_name_basic.name}"  class="sqsEnabled"   id="{$fields.rc_topic_rc_category_name_basic.name}" size="" value="{$fields.rc_topic_rc_category_name_basic.value}" title='' autocomplete="off"  >
<input type="hidden"  id="{$fields.rc_topic_rc_categoryrc_category_ida_basic.name}" value="{$fields.rc_topic_rc_categoryrc_category_ida_basic.value}">
<span class="id-ff multiple">
<button type="button" name="btn_{$fields.rc_topic_rc_category_name_basic.name}"   title="{$APP.LBL_SELECT_BUTTON_TITLE}" class="button firstChild" value="{$APP.LBL_SELECT_BUTTON_LABEL}" onclick='open_popup("{$fields.rc_topic_rc_category_name_basic.module}", 600, 400, "", true, false, {literal}{"call_back_function":"set_return","form_name":"search_form","field_to_name_array":{"id":"rc_topic_rc_categoryrc_category_ida_basic","name":"rc_topic_rc_category_name_basic"}}{/literal}, "single", true);'>{sugar_getimage alt=$app_strings.LBL_ID_FF_SELECT name="id-ff-select" ext=".png" other_attributes=''}</button><button type="button" name="btn_clr_{$fields.rc_topic_rc_category_name_basic.name}"   title="{$APP.LBL_CLEAR_BUTTON_TITLE}" class="button lastChild" onclick="this.form.{$fields.rc_topic_rc_category_name_basic.name}.value = ''; this.form.{$fields.rc_topic_rc_categoryrc_category_ida_basic.name}.value = '';" value="{$APP.LBL_CLEAR_BUTTON_LABEL}">{sugar_getimage name="id-ff-clear" alt=$app_strings.LBL_ID_FF_CLEAR ext=".png" other_attributes=''}</button>
</span>

   	   	</td>
    {if $formData|@count >= $basicMaxColumns+1}
    </tr>
    <tr>
	<td colspan="{$searchTableColumnCount}">
    {else}
	<td class="sumbitButtons">
    {/if}
        <input tabindex="2" title="{$APP.LBL_SEARCH_BUTTON_TITLE}" onclick="SUGAR.savedViews.setChooser();" class="button" type="submit" name="button" value="{$APP.LBL_SEARCH_BUTTON_LABEL}" id="search_form_submit"/>&nbsp;
	    <input tabindex='2' title='{$APP.LBL_CLEAR_BUTTON_TITLE}' onclick='SUGAR.searchForm.clear_form(this.form); return false;' class='button' type='button' name='clear' id='search_form_clear' value='{$APP.LBL_CLEAR_BUTTON_LABEL}'/>
        {if $HAS_ADVANCED_SEARCH}
	    &nbsp;&nbsp;<a id="advanced_search_link" href="javascript:void(0);" accesskey="{$APP.LBL_ADV_SEARCH_LNK_KEY}" >{$APP.LNK_ADVANCED_SEARCH}</a>
	    {/if}
    </td>
	<td class="helpIcon" width="*"><img alt="Help" border='0' id="filterHelp" src='{sugar_getimagepath file="help-dashlet.gif"}'></td>
	</tr>
</table>
<script>
	{literal}
	$(document).ready(function () {
		$( '#advanced_search_link' ).one( "click", function() {
			//alert( "This will be displayed only once." );
			SUGAR.searchForm.searchFormSelect('{/literal}{$module}{literal}|advanced_search','{/literal}{$module}{literal}|basic_search');
		});
	});
	{/literal}
</script>{literal}<script language="javascript">if(typeof sqs_objects == 'undefined'){var sqs_objects = new Array;}sqs_objects['search_form_modified_by_name_basic']={"form":"search_form","method":"get_user_array","field_list":["user_name","id"],"populate_list":["modified_by_name_basic","modified_user_id_basic"],"required_list":["modified_user_id"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};sqs_objects['search_form_created_by_name_basic']={"form":"search_form","method":"get_user_array","field_list":["user_name","id"],"populate_list":["created_by_name_basic","created_by_basic"],"required_list":["created_by"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};sqs_objects['search_form_assigned_user_name_basic']={"form":"search_form","method":"get_user_array","field_list":["user_name","id"],"populate_list":["assigned_user_name_basic","assigned_user_id_basic"],"required_list":["assigned_user_id"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};sqs_objects['search_form_rc_topic_rc_topic_name_basic']={"form":"search_form","method":"query","modules":["rc_topic"],"group":"or","field_list":["name","id"],"populate_list":["rc_topic_rc_topic_name_basic","rc_topic_rc_topicrc_topic_ida_basic"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects['search_form_rc_topic_rc_category_name_basic']={"form":"search_form","method":"query","modules":["rc_category"],"group":"or","field_list":["name","id"],"populate_list":["rc_topic_rc_category_name_basic","rc_topic_rc_categoryrc_category_ida_basic"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};</script>{/literal}