<?php /* Smarty version Smarty-3.1.14, created on 2015-01-21 15:38:03
         compiled from "E:\www\s.so\M\Common\Content_Notice.htm" */ ?>
<?php /*%%SmartyHeaderCode:199754bf575b848ef1-67553557%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6904868d9bc4265a02acf5db7257e8dfd880d744' => 
    array (
      0 => 'E:\\www\\s.so\\M\\Common\\Content_Notice.htm',
      1 => 1411444115,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '199754bf575b848ef1-67553557',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SysSet' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_54bf575b848ef5_45760518',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54bf575b848ef5_45760518')) {function content_54bf575b848ef5_45760518($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['SysSet']->value['SetManageNotice']==1){?>
<div class="alert alert-success">
<button type="button" class="close" data-dismiss="alert">×</button>
<strong>注意！</strong>请保管好您的个人信息，一点发生密码泄露请紧急联系管理员。
</div><?php }?>
<?php }} ?>