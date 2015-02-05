<?php /* Smarty version Smarty-3.1.14, created on 2015-01-21 15:51:43
         compiled from "..\M\Sys\group_edit.htm" */ ?>
<?php /*%%SmartyHeaderCode:1048354bf5a8fa524c3-30579784%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '725e18b353cda5569113b6bff8ab0d4f9689d9f9' => 
    array (
      0 => '..\\M\\Sys\\group_edit.htm',
      1 => 1414652846,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1048354bf5a8fa524c3-30579784',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'row' => 0,
    'SysModulesfp' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_54bf5a8facc2c9_72936189',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54bf5a8facc2c9_72936189')) {function content_54bf5a8facc2c9_72936189($_smarty_tpl) {?><ul class="nav nav-tabs">
<li class="active">
<a data-toggle="tab" href="#home">编辑账号组资料</a>
</li>
</ul>
<div class="panel panel-default">
  <div class="panel-body">
<table class="table table-striped table-hover table-condensed">
<tr>
  <td align="right">账号组名称 :</td>
  <td><input name="groupname" type="text" class="form-control quicknote_edit_groupname" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['groupname'];?>
"></td>
</tr>
<tr>
  <td align="right"> 描述 : </td>
  <td><textarea name="groupdis" class="form-control quicknote_edit_groupdis"><?php echo $_smarty_tpl->tpl_vars['row']->value['groupdis'];?>
</textarea>
   <input class="quicknote_edit_id" type="hidden" name="qeditid" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['group_id'];?>
">
  </td>
</tr>

<tr>
  <td align="right">&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td align="right">功能 : </td>
  <td>

<table class="table table-hover table-condensed">

<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['SysModulesfp']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
<?php if ($_smarty_tpl->tpl_vars['item']->value['modules_type']=='Common'||$_smarty_tpl->tpl_vars['item']->value['modules_type']=='Man'){?>
<tr bgcolor="#efefef"> 
<td><?php echo $_smarty_tpl->tpl_vars['item']->value['modules_type'];?>
</td>
<td><input name="____" type="checkbox" checked disabled="disabled"/></td>
<td><?php echo $_smarty_tpl->tpl_vars['item']->value['modules_name'];?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['item']->value['modules_dis'];?>
</td>
</tr>
<?php }?>
<?php } ?>


<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['SysModulesfp']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
<?php if ($_smarty_tpl->tpl_vars['item']->value['modules_type']=='Single'||$_smarty_tpl->tpl_vars['item']->value['modules_type']=='Sub'){?>
<tr>
<td><?php echo $_smarty_tpl->tpl_vars['item']->value['modules_type'];?>
</td>
<td><input name="module_po" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['modules_id'];?>
"  <?php if (in_array($_smarty_tpl->tpl_vars['item']->value['modules_id'],$_smarty_tpl->tpl_vars['row']->value['modules_po'])){?>checked<?php }?>/></td>
<td><?php echo $_smarty_tpl->tpl_vars['item']->value['modules_name'];?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['item']->value['modules_dis'];?>
</td>
</tr>
<?php }?>
<?php } ?>

</table>

    
  </td>
</tr>
</table>
  </div>
</div>
<script type="text/dialog">


this.opt = {				//确定按钮的点击
	ok:function(){

var po_value =[]; 
$('input[name="module_po"]:checked').each(function(){
po_value.push($(this).val());
}); 

			var res = $.ajax({
			url : 'Sys.php?a=group_edit_ext',
			type: 'post',
			data: {
				group_id : $('.quicknote_edit_id').val(),
				groupname : $('.quicknote_edit_groupname').val(),
				groupdis : $('.quicknote_edit_groupdis').val(),
				
				modules_po : po_value
				},
			dataType: "json",
			async:false,
			cache:false
		}).responseJSON;
		//==========================1
		if(res.code<0){
			alert(res.msg);
			return false;
		}else{
			location.reload();
			return true;
		}	
		return true;
	},
	cancel:function(){},						//点击cancel按钮
	close:function(){},							//关闭对话框 不是回调
}

</script>

<?php }} ?>