<?php /* Smarty version Smarty-3.1.14, created on 2015-01-21 15:38:03
         compiled from "E:\www\s.so\M\Common\Content_NavHead.htm" */ ?>
<?php /*%%SmartyHeaderCode:178354bf575b80bff5-67516388%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a1be1985c207a3ab09763ac7d189b9b6e0ca255f' => 
    array (
      0 => 'E:\\www\\s.so\\M\\Common\\Content_NavHead.htm',
      1 => 1411887147,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '178354bf575b80bff5-67516388',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SysSet' => 0,
    'Sysc' => 0,
    'Sysa' => 0,
    'SysMenus_belong' => 0,
    'SysModules' => 0,
    'SysMenus' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_54bf575b80bff4_82194412',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54bf575b80bff4_82194412')) {function content_54bf575b80bff4_82194412($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['SysSet']->value['SetManageNav']==1){?>
<ul class="breadcrumb" style="margin: 1px 0;">
<!-- li><a href="http://t5.so/panel/index.php"> 控制面板</a> <span class="divider"></span></li -->
<li class="active">
<?php echo $_smarty_tpl->tpl_vars['SysModules']->value[$_smarty_tpl->tpl_vars['SysMenus_belong']->value[$_smarty_tpl->tpl_vars['Sysc']->value][$_smarty_tpl->tpl_vars['Sysa']->value]['menus_module']]['modules_name'];?>
</li>

<?php if ($_smarty_tpl->tpl_vars['SysMenus_belong']->value[$_smarty_tpl->tpl_vars['Sysc']->value][$_smarty_tpl->tpl_vars['Sysa']->value]['menus_menu']!=0){?><li>
<a href="<?php echo $_smarty_tpl->tpl_vars['SysMenus']->value[$_smarty_tpl->tpl_vars['SysMenus_belong']->value[$_smarty_tpl->tpl_vars['Sysc']->value][$_smarty_tpl->tpl_vars['Sysa']->value]['menus_menu']]['menus_url'];?>
"><?php echo $_smarty_tpl->tpl_vars['SysMenus']->value[$_smarty_tpl->tpl_vars['SysMenus_belong']->value[$_smarty_tpl->tpl_vars['Sysc']->value][$_smarty_tpl->tpl_vars['Sysa']->value]['menus_menu']]['menus_name'];?>
</a></li>
<?php }?>

<li><?php echo $_smarty_tpl->tpl_vars['SysMenus_belong']->value[$_smarty_tpl->tpl_vars['Sysc']->value][$_smarty_tpl->tpl_vars['Sysa']->value]['menus_name'];?>
</li>
</ul>	
<?php }?>	
<?php }} ?>