<?php /* Smarty version Smarty-3.1.14, created on 2015-01-21 15:38:03
         compiled from "E:\www\s.so\M\Common\Sidebar.htm" */ ?>
<?php /*%%SmartyHeaderCode:895054bf575b7cf0f5-94301168%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3b8cfe4f44886bd764c4610619b5c7b210783413' => 
    array (
      0 => 'E:\\www\\s.so\\M\\Common\\Sidebar.htm',
      1 => 1411886592,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '895054bf575b7cf0f5-94301168',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SysModules' => 0,
    'item' => 0,
    'Sysc' => 0,
    'Sysa' => 0,
    'SysMenus_belong' => 0,
    'SysMenus' => 0,
    'i' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_54bf575b80bff3_62122435',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54bf575b80bff3_62122435')) {function content_54bf575b80bff3_62122435($_smarty_tpl) {?><div id="sidebar-nav" class="sidebar-nav" style="background:#fff">
  <div class="panel-group" id="accordion">
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['SysModules']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $_smarty_tpl->tpl_vars['item']->value['modules_id'];?>
">
            <?php echo $_smarty_tpl->tpl_vars['item']->value['modules_name'];?>

            </a><b class="caret"></b>
        </div>
        <ul class="list-group collapse <?php if ($_smarty_tpl->tpl_vars['SysMenus_belong']->value[$_smarty_tpl->tpl_vars['Sysc']->value][$_smarty_tpl->tpl_vars['Sysa']->value]['menus_module']==$_smarty_tpl->tpl_vars['item']->value['modules_id']){?>in<?php }?>" id="collapse<?php echo $_smarty_tpl->tpl_vars['item']->value['modules_id'];?>
">
        
        <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['SysMenus']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
$_smarty_tpl->tpl_vars['i']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
        	<?php if ($_smarty_tpl->tpl_vars['i']->value['menus_module']==$_smarty_tpl->tpl_vars['item']->value['modules_id']){?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['i']->value['menus_url'];?>
" class="list-group-item <?php if ($_smarty_tpl->tpl_vars['i']->value['menuc']==$_smarty_tpl->tpl_vars['Sysc']->value&&$_smarty_tpl->tpl_vars['i']->value['menua']==$_smarty_tpl->tpl_vars['Sysa']->value){?>active<?php }?>"><?php echo $_smarty_tpl->tpl_vars['i']->value['menus_name'];?>
</a>
        	<?php }?>
		<?php } ?>
            
        </ul>
    </div>
<?php } ?>
  </div>
</div><?php }} ?>