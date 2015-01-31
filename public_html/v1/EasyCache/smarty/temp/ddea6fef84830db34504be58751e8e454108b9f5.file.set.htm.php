<?php /* Smarty version Smarty-3.1.14, created on 2015-01-21 15:38:09
         compiled from "..\M\Sys\set.htm" */ ?>
<?php /*%%SmartyHeaderCode:559454bf576139da91-45544326%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ddea6fef84830db34504be58751e8e454108b9f5' => 
    array (
      0 => '..\\M\\Sys\\set.htm',
      1 => 1411444497,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '559454bf576139da91-45544326',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'set' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_54bf57613da991_83960732',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54bf57613da991_83960732')) {function content_54bf57613da991_83960732($_smarty_tpl) {?><!doctype html>
<html>
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>EASY平台</title>
    <link rel="stylesheet" href="/A/CSS/normalize-min.css">
    <link rel="stylesheet" href="/A/bootstrap-3.2.0/css/bootstrap.css">
    <link rel="stylesheet" href="/A/bootstrap-3.2.0/css/bootstrap-theme.css">
	<script type="text/javascript" src="/A/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="/A/CommonIni.js"> </script>
    <script type="text/javascript" src="/A/bootstrap-3.2.0/js/bootstrap.js"> </script>
    <script type="text/javascript" src="/A/bootbox.min.js"> </script>

    <link rel="stylesheet" href="/A/bootstrap-switch3/css/bootstrap3/bootstrap-switch.min.css">
    <script type="text/javascript" src="/A/bootstrap-switch3/js/bootstrap-switch.js"> </script>
    
    
    <link rel="stylesheet" href="/A/bootstrap-iCheck/skins/square/blue.css">
    <script type="text/javascript" src="/A/bootstrap-iCheck/icheck.min.js"> </script>


    <script type="text/javascript" src="/A/artDialog4.1.7/artDialog.js?skin=default"></script>
    <script type="text/javascript" src="/A/CK.js"> </script>
    
    

<?php echo $_smarty_tpl->getSubTemplate ("../Common/JsIni.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</head>
<body>


<!-- navbar_head -->
<?php echo $_smarty_tpl->getSubTemplate ("../Common/NavHead.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 
<!-- /navbar_head -->
<!--- sidebar-nav --->
<?php echo $_smarty_tpl->getSubTemplate ("../Common/Sidebar.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 
<!--- /sidebar-nav --->

<!--- 以上为右侧菜单栏 side right --->
<div id="content" class="content">

    <!-- Content_NavHead -->
    <?php echo $_smarty_tpl->getSubTemplate ("../Common/Content_NavHead.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 
    <!-- /Content_NavHead -->
    
    <!-- Content_Title -->
    <?php echo $_smarty_tpl->getSubTemplate ("../Common/Content_Title.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 
    <!-- /Content_Title -->

<div class="container-fluid">
<div class="row-fluid">
    <div class="panel panel-default">
        <div class="panel-heading">
            <a data-toggle="collapse" data-parent="#accordion2" href="#collapses2">PANCLE</a>
        </div>
        <div id="collapses2" class="panel-collapse collapse in">
            <!-- 内容 -->        <!-- body -->
            <div class="block-body" id="block-body">
<table class="table table-striped table-hover table-condensed">  
<tr>
  <td colspan="5">全局参数设定</td>
  </tr>
<!-- tr>
  <td width="60">group</td>
  <td width="150">quick notice</td>
  <td width="200">
    
    1<input type="radio" name="mycheckbox" id="radio" value="radio">
    1<input name="mycheckbox" type="radio" id="radio" value="radio" checked>
    1<input type="radio" name="mycheckbox" id="radio" value="radio">
    
    <input type="checkbox" name="mycheckbox" id="checkbox">
    
    
    <label for="baz[1]">Bar</label></td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr -->
<tr>
  <td width="150">界面</td>
  <td width="150">面包屑</td>
  <td width="150"><input type="checkbox" class="bswitch" name="SetManageNav" <?php if ($_smarty_tpl->tpl_vars['set']->value['SetManageNav']==1){?>checked<?php }?>/></td>
  <td width="200"><small>顶部面包屑是否显示</small> </td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td>登录验证码</td>
  <td><input type="checkbox" class="bswitch" name="SetManageLogin" <?php if ($_smarty_tpl->tpl_vars['set']->value['SetManageLogin']==1){?>checked<?php }?>/></td>
  <td><small>登录验证码</small></td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td>title</td>
  <td>
    <input type="checkbox" class="bswitch" name="SetManageTitle" <?php if ($_smarty_tpl->tpl_vars['set']->value['SetManageTitle']==1){?>checked<?php }?>/></td>
  <td><small>顶部标题是否显示</small></td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td>notice</td>
  <td><input type="checkbox" class="bswitch" name="SetManageNotice" <?php if ($_smarty_tpl->tpl_vars['set']->value['SetManageNotice']==1){?>checked<?php }?>/></td>
  <td><small>界面notice信息是否显示</small></td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td>foot</td>
  <td><input type="checkbox" class="bswitch" name="SetManageFoot" <?php if ($_smarty_tpl->tpl_vars['set']->value['SetManageFoot']==1){?>checked<?php }?>/>
    <br></td>
  <td><small>foot信息是否显示</small></td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td>debug</td>
  <td><input type="checkbox" class="bswitch" name="SetManageDebug" <?php if ($_smarty_tpl->tpl_vars['set']->value['SetManageDebug']==1){?>checked<?php }?>/></td>
  <td><small>debug工具条是否显示</small></td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td>debug_lib</td>
  <td><input type="checkbox" class="bswitch" name="SetManageDebug_lib" <?php if ($_smarty_tpl->tpl_vars['set']->value['SetManageDebug_lib']==1){?>checked<?php }?>/></td>
  <td><small>debug知识库</small></td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
</table>
            </div> 
            <!-- 内容 -->        <!-- body -->
        </div>
    <!--- bottom --->
    <?php echo $_smarty_tpl->getSubTemplate ("../Common/Content_Notice.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 
    <!--- /bottom --->
    </div> 
</div>

<!-- Content_Title -->
<?php echo $_smarty_tpl->getSubTemplate ("../Common/Content_Foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 
<!-- /Content_Title -->
 
</div>
</div>
<!--- 以上为右侧菜单栏 side right --->

<!--- bottom --->
<?php echo $_smarty_tpl->getSubTemplate ("../Common/Bottom.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 
<!--- /bottom --->
<script language="javascript">
$(document).ready(function(){
	$(".bswitch").bootstrapSwitch();
		
	$(".bswitch").on('switchChange.bootstrapSwitch', function (e, data) {
		
		var data = {
			name : $(this).attr("name")
			};
		$.post("Sys.php?a=IoSetSwitch",data);
	});
	
		
	$("[name='mycheckbox']").iCheck({
		checkboxClass: 'icheckbox_square-blue',
		radioClass: 'iradio_square-blue',
		increaseArea: '20%' // optional
	});
	
	
	
	
});  
</script>
</body>
</html><?php }} ?>