<?php /* Smarty version Smarty-3.1.14, created on 2015-01-21 15:52:56
         compiled from "..\M\Sys\modules_edit.htm" */ ?>
<?php /*%%SmartyHeaderCode:1067254bf5aa60f4032-20726524%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1a9e6afba9be1b7911f850ebd8c70bb7e71dd0e7' => 
    array (
      0 => '..\\M\\Sys\\modules_edit.htm',
      1 => 1421826772,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1067254bf5aa60f4032-20726524',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_54bf5aa6130f39_89764307',
  'variables' => 
  array (
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54bf5aa6130f39_89764307')) {function content_54bf5aa6130f39_89764307($_smarty_tpl) {?><ul class="nav nav-tabs">
<li class="active">
<a data-toggle="tab" href="#home">编辑模块资料</a>
</li>
</ul>
<div class="panel panel-default">
  <div class="panel-body">
    <table class="table table-hover table-condensed">
      <tr>
        <td align="right">模块名称 : </td>
        <td><input type="text" class="modules_edit_modules_name form-control" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['modules_name'];?>
"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="right">链接 : </td>
        <td><input type="text" class="modules_edit_modules_link form-control" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['modules_link'];?>
"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="right">图标 : </td>
        <td><i class="selecticon_preview glyphicon <?php echo $_smarty_tpl->tpl_vars['row']->value['modules_icon'];?>
"></i>
          <input type="text" class="modules_edit_modules_icon form-control chanicon231" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['modules_icon'];?>
"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="100" align="right">排序 : </td>
        <td width="300"><input type="text" class="modules_edit_modules_sort form-control" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['modules_sort'];?>
"></td>
        <td>&nbsp;</td>
      </tr>
      
      <tr>
        <td align="right">描述 : </td>
        <td><textarea name="textarea" class="modules_edit_modules_dis form-control"><?php echo $_smarty_tpl->tpl_vars['row']->value['modules_dis'];?>
</textarea></td>
        <td>&nbsp;</td>
      </tr>

      <tr>
        <td align="right">是否在线 : </td>
        <td><select class="form-control modules_edit_modules_online" name="menus_module">
          <option value="1" <?php if ($_smarty_tpl->tpl_vars['row']->value['modules_online']==1){?>selected="selected"<?php }?>>是</option>
          <option value="0" <?php if ($_smarty_tpl->tpl_vars['row']->value['modules_online']==0){?>selected="selected"<?php }?>>否</option>
        </select> 
        
        
        <input class="modules_edit_id" type="hidden" name="qeditid" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['modules_id'];?>
">        
        </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="right">C : </td>
        <td><input type="text" class="modules_edit_modules_c form-control" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['modules_c'];?>
" /></td>
        <td>&nbsp;</td>
      </tr>

      <tr>
        <td align="right">模块类型 : </td>
        <td>
         
      <select class="form-control modules_edit_modules_type">
            <option value="Man" <?php if ($_smarty_tpl->tpl_vars['row']->value['modules_type']=='Man'){?>selected="selected"<?php }?>>管理员模块</option>
            <option value="Sub" <?php if ($_smarty_tpl->tpl_vars['row']->value['modules_type']=='Sub'){?>selected="selected"<?php }?>>功能模块</option>
        </select>
        
        </td>
        <td>&nbsp;</td>
      </tr>
      
      <tr>
        <td colspan="2">超级用户模块 只有超级用户能用<br />
          功能模块需要 指定明细给用户<br />
          管理模块需要 只有部门主管能用<br />
          公用模块不需要指定所有用户都可以用<br />
          独立模块指定给部门 
          用户可以购买,并且记时或不记时<br />          
        <br /></td>
        <td>&nbsp;</td>
      </tr>      
            <!-- tr>
        <td align="right">是否在线 : </td>
        <td><input name="inputSuccess" type="text" class="form-control" id="inputSuccess6"/></td>
        <td>&nbsp;</td>
      </tr -->
    </table>
  </div>
</div>
<script type="text/dialog">


this.opt = {				//确定按钮的点击
	ok:function(){
			var res = $.ajax({
			url : 'Sys.php?a=modules_edit_ext',
			type: 'post',
			data: {
				modules_id : $('.modules_edit_id').val(),
				modules_name : $('.modules_edit_modules_name').val(),
				modules_link : $('.modules_edit_modules_link').val(),
				modules_icon : $('.modules_edit_modules_icon').val(),
				modules_sort : $('.modules_edit_modules_sort').val(),
				modules_dis : $('.modules_edit_modules_dis').val(),
				modules_online : $('.modules_edit_modules_online').val(),
				modules_c : $('.modules_edit_modules_c').val(),
				modules_type : $('.modules_edit_modules_type').val()
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








 	$('.chanicon231').click(function(){ 
		$.CK({
			rel:'selecticon',
			_this:$(this)
			}); 
	});	
</script><?php }} ?>