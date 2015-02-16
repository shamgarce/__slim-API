<?php /* Smarty version Smarty-3.1.14, created on 2015-01-21 15:38:07
         compiled from "..\M\Sys\group.htm" */ ?>
<?php /*%%SmartyHeaderCode:2404754bf575fde6774-25126203%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd059905cb23c5076fc4a0fc53f39ba2402a1be48' => 
    array (
      0 => '..\\M\\Sys\\group.htm',
      1 => 1411869821,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2404754bf575fde6774-25126203',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'rc' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_54bf575fe23673_80644505',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54bf575fe23673_80644505')) {function content_54bf575fe23673_80644505($_smarty_tpl) {?><!doctype html>
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
            <a data-toggle="collapse" data-parent="#accordion2" href="#collapses2">操作面板</a>
        </div>
        <div id="collapses2" class="panel-collapse collapse in">
            <!-- 内容 -->        <!-- body -->
            <div class="block-body" id="block-body">
<!--顶部添加按钮 -->
<a data-toggle="collapse" data-parent="#accordion3" href="#collapses3" class="btn btn-primary">
<span class="glyphicon glyphicon-plus"></span> 添加</a>
<br><br>
<div id="collapses3" class="panel-collapse collapse">
            <ul class="nav nav-tabs">
            <li class="active">
            <a data-toggle="tab" href="#home">添加账号组</a>
            </li>
            </ul>
            <div class="panel panel-default">
            <div class="panel-body">
               <table class="table table-hover table-condensed">
                  <tr>
                    <td width="100" align="right">账号组名称 : </td>
                    <td width="300"><input name="groupname" type="text" class="form-control" id="inputSuccess4"></td>
                    <td>&nbsp;</td>
                  </tr>
                  
                  <tr>
                    <td align="right">描述 : </td>
                    <td><input name="groupdis" type="text" class="form-control" id="inputSuccess"></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="3">
                    <input class="btn btn-primary groupadd" type="submit" name="button" id="button" value="提交">
                    </td>
                    </tr>
                </table>
            </div>
            </div>
</div>
<table class="table table-striped table-hover table-condensed">  
<thead>
<tr class="b_black white">
<td width="150" height="34">id</td>
<td width="150">组名</td>
<td>描述</td>
<td width="120">操作</td>
</tr>
</thead>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['rc']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
<tr>
    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['group_id'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['groupname'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['groupdis'];?>
</td>
    <td>
      <!-- a><span class="glyphicon glyphicon-list-alt"></span></a --> 
&nbsp;      <a href="?a=&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['group_id'];?>
"><span class="glyphicon glyphicon-list-alt"></span></a>
&nbsp;      <a group_id="<?php echo $_smarty_tpl->tpl_vars['item']->value['group_id'];?>
" class="group_edit"><span class="glyphicon glyphicon-pencil"></span></a>
&nbsp;      <a group_id="<?php echo $_smarty_tpl->tpl_vars['item']->value['group_id'];?>
" class="group_del"><span class="glyphicon glyphicon-remove"></span></a> 


</td>
    </tr>
<?php } ?>
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
	
	$('.group_edit').click(function(){
		$.CK({
			rel:'selecticon',
			url:'Sys.php?a=group_edit&group_id='+$(this).attr("group_id"),
			_this:$(this),
			buttonok	: true,
            buttoncancel: true,
			});
	});
	
	$('.group_del').click(function(){
		var res = $.ajax({
			url : 'Sys.php?a=group_delete_ext',
			type: 'post',
			data: {
				group_id : $(this).attr("group_id"),
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
	});

	$('.groupadd').click(function(){
		var res = $.ajax({
			url : 'Sys.php?a=group_add_ext',
			type: 'post',
			data: {
				groupname : $("input[name=groupname]").val(),
				groupdis : $("input[name=groupdis]").val(),
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
	})
});  
</script>
</body>
</html><?php }} ?>