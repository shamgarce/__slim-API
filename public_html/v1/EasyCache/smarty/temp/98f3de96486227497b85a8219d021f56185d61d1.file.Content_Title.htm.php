<?php /* Smarty version Smarty-3.1.14, created on 2015-01-21 15:38:03
         compiled from "E:\www\s.so\M\Common\Content_Title.htm" */ ?>
<?php /*%%SmartyHeaderCode:2698054bf575b848ef3-29770534%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '98f3de96486227497b85a8219d021f56185d61d1' => 
    array (
      0 => 'E:\\www\\s.so\\M\\Common\\Content_Title.htm',
      1 => 1411886664,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2698054bf575b848ef3-29770534',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SysSet' => 0,
    'Sysc' => 0,
    'Sysa' => 0,
    'SysMenus_belong' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_54bf575b848ef9_63972216',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54bf575b848ef9_63972216')) {function content_54bf575b848ef9_63972216($_smarty_tpl) {?><div class="header">
<?php if ($_smarty_tpl->tpl_vars['SysSet']->value['SetManageTitle']==1){?>
<h1 class="page-header"><?php echo $_smarty_tpl->tpl_vars['SysMenus_belong']->value[$_smarty_tpl->tpl_vars['Sysc']->value][$_smarty_tpl->tpl_vars['Sysa']->value]['menus_name'];?>
 <small><?php echo $_smarty_tpl->tpl_vars['SysMenus_belong']->value[$_smarty_tpl->tpl_vars['Sysc']->value][$_smarty_tpl->tpl_vars['Sysa']->value]['menus_dis'];?>
</small> 
<?php }else{ ?>
<hr>
<?php }?>
</div><?php }} ?>