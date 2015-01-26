<?php /* Smarty version Smarty-3.1.14, created on 2015-01-21 15:53:05
         compiled from "..\M\Sys\menus_edit.htm" */ ?>
<?php /*%%SmartyHeaderCode:401454bf5ae1169992-98646286%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '991d7e7b85ce27752f7f9ee006ba9b8bda6b1d40' => 
    array (
      0 => '..\\M\\Sys\\menus_edit.htm',
      1 => 1414602880,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '401454bf5ae1169992-98646286',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'row' => 0,
    'module' => 0,
    'key' => 0,
    'item' => 0,
    'menus' => 0,
    'i' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_54bf5ae11a6893_98759068',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54bf5ae11a6893_98759068')) {function content_54bf5ae11a6893_98759068($_smarty_tpl) {?><ul class="nav nav-tabs">
<li class="active">
<a data-toggle="tab" href="#home">编辑功能资料</a>
</li>
</ul>
<div class="panel panel-default">
  <div class="panel-body">
    <table class="table table-hover table-condensed">
      <tr>
        <td width="160" align="right">名称 : </td>
        <td><input type="text" class="menus_edit_menus_name form-control" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['menus_name'];?>
"/></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="right">c : </td>
        <td><input type="text" class="menus_edit_menuc form-control"  value="<?php echo $_smarty_tpl->tpl_vars['row']->value['menuc'];?>
"/></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="right">a : </td>
        <td><input type="text" class="menus_edit_menua form-control"  value="<?php echo $_smarty_tpl->tpl_vars['row']->value['menua'];?>
"/></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="right">链接 : </td>
        <td><input type="text" class="menus_edit_menus_url form-control"  value="<?php echo $_smarty_tpl->tpl_vars['row']->value['menus_url'];?>
"/></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="right">所属模块 : </td>
        <td>
        
<select class="menus_edit_menus_module form-control">
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['module']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
<option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['row']->value['menus_module']==$_smarty_tpl->tpl_vars['key']->value){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</option>
<?php } ?>
</select>

</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="right">左侧菜单栏显示 : </td>
        <td>
<select class="menus_edit_menus_menu_left form-control">
    <option value="0" <?php if ($_smarty_tpl->tpl_vars['row']->value['menus_menu_left']==0){?>selected="selected"<?php }?>>否</option>
    <option value="1" <?php if ($_smarty_tpl->tpl_vars['row']->value['menus_menu_left']==1){?>selected="selected"<?php }?>>是</option>
</select>
        </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="right">所属菜单 : </td>
        <td><select class="menus_edit_menus_menu form-control">
          <option class="input-xlarge option" value="0">无</option>
          <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['module']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
          <optgroup label="<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
">
            <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['menus']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
$_smarty_tpl->tpl_vars['i']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
            <?php if ($_smarty_tpl->tpl_vars['key']->value==$_smarty_tpl->tpl_vars['i']->value['menus_module']){?>
            <option class="input-xlarge option" value="<?php echo $_smarty_tpl->tpl_vars['i']->value['menus_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['row']->value['menus_menu']==$_smarty_tpl->tpl_vars['i']->value['menus_id']){?>selected="selected"<?php }?>>
              <?php echo $_smarty_tpl->tpl_vars['i']->value['menus_name'];?>

            </option>
            <?php }?>
            <?php } ?>
            </optgroup>
          <?php } ?>
        </select></td>
        <td>&nbsp;</td>
      </tr>
      <!--tr>
                    <td align="right">是否允许快捷菜单 : </td>
                    <td><select name="select" class="form-control">
                      <option value="1">是</option>
                      <option value="0">否</option>
                    </select></td>
                    <td>&nbsp;</td>
                  </tr -->
      
      <tr>
        <td align="right">描述 : </td>
        <td width="300"><textarea class="menus_edit_menus_dis form-control" id="menus_dis"><?php echo $_smarty_tpl->tpl_vars['row']->value['menus_dis'];?>
</textarea>
        
         <input class="menus_edit_dia_id" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['menus_id'];?>
">
        </td>
        <td>&nbsp;</td>
      </tr><tr>
        <td align="right">是否在线 : </td>
        <td><select class="form-control menus_edit_menus_online" name="menus_module">
          <option value="1" <?php if ($_smarty_tpl->tpl_vars['row']->value['menus_online']==1){?>selected="selected"<?php }?>>是</option>
          <option value="0" <?php if ($_smarty_tpl->tpl_vars['row']->value['menus_online']==0){?>selected="selected"<?php }?>>否</option>
        </select></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="right">权限 : </td>
        <td><select class="form-control menus_edit_menus_po" name="menus_po">
        <option value="0" <?php if ($_smarty_tpl->tpl_vars['row']->value['menus_po']==0){?>selected="selected"<?php }?>>允许</option>
        <option value="1" <?php if ($_smarty_tpl->tpl_vars['row']->value['menus_po']==1){?>selected="selected"<?php }?>>禁止</option>
        <option value="2" <?php if ($_smarty_tpl->tpl_vars['row']->value['menus_po']==2){?>selected="selected"<?php }?>>分配</option>
        </select></td>
        <td>&nbsp;</td>
    </tr>
      <tr>
        <td align="right">排序 : </td>
        <td><input type="text" class="menus_edit_menus_sort form-control"  value="<?php echo $_smarty_tpl->tpl_vars['row']->value['menus_sort'];?>
"/></td>
        <td>&nbsp;</td>
      </tr>

    </table>
    
  </div>
</div>
<script type="text/dialog">

this.opt = {				//确定按钮的点击
	ok:function(){
			var res = $.ajax({
			url : 'Sys.php?a=menus_edit_ext',
			type: 'post',
			data: {
				menus_id : $('.menus_edit_dia_id').val(),
				menus_name : $('.menus_edit_menus_name').val(),
				menuc : $('.menus_edit_menuc').val(),
				menua : $('.menus_edit_menua').val(),
				menus_url : $('.menus_edit_menus_url').val(),
				menus_module : $('.menus_edit_menus_module').val(),
				menus_menu_left : $('.menus_edit_menus_menu_left').val(),
				menus_menu : $('.menus_edit_menus_menu').val(),
				menus_dis : $('.menus_edit_menus_dis').val(),
				menus_online : $('.menus_edit_menus_online').val(),
				menus_po : $('.menus_edit_menus_po').val(),

				menus_sort : $('.menus_edit_menus_sort').val(),
				
				
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

</script><?php }} ?>