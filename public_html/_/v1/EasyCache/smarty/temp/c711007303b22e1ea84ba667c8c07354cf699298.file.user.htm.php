<?php /* Smarty version Smarty-3.1.14, created on 2015-01-21 15:38:03
         compiled from "..\M\Sys\user.htm" */ ?>
<?php /*%%SmartyHeaderCode:1743554bf575b7183f5-40454882%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c711007303b22e1ea84ba667c8c07354cf699298' => 
    array (
      0 => '..\\M\\Sys\\user.htm',
      1 => 1414685311,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1743554bf575b7183f5-40454882',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'bm' => 0,
    'key' => 0,
    'item' => 0,
    'rc' => 0,
    'rs' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_54bf575b7921f3_86233226',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54bf575b7921f3_86233226')) {function content_54bf575b7921f3_86233226($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'E:\\www\\s.so\\C\\Models\\Smarty\\plugins\\modifier.date_format.php';
?><!doctype html>
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

    <script type="text/javascript" src="/A/DatePicker/WdatePicker.js"> </script>

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
<!-- 添加 -->
<!--顶部添加按钮 -->
<a data-toggle="collapse" data-parent="#accordion3" href="#collapses3" class="btn btn-primary">
<span class="glyphicon glyphicon-plus"></span> 添加</a>
<br><br>
<div id="collapses3" class="panel-collapse collapse">
            <ul class="nav nav-tabs">
            <li class="active">
            <a data-toggle="tab" href="#home">添加用户</a>
            </li>
            </ul>
            <div class="panel panel-default">
            <div class="panel-body">
                
               <table class="table table-hover table-condensed">
                  <tr>
                    <td width="160" align="right">登录名 : </td>
                    <td width="300"><input type="text" class="form-control user_login" placeholder="登录名"></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="right">密码 : </td>
                    <td><input type="password" class="form-control user_password"></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="right">确认密码 : </td>
                    <td><input type="password" class="form-control user_password2"></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="right">姓名 : </td>
                    <td><input type="text" class="form-control user_name"></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="right">电话 : </td>
                    <td><input type="text" class="form-control user_tel"></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="right">部门 : </td>
                    <td>
<select class="form-control user_department">
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['bm']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
<option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</option>
<?php } ?>
</select>
					</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="right">是否主管 : </td>
                    <td><input type="radio" value="0" name="user_lead">
否
<input type="radio" value="1" name="user_lead">
                      是</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="3">
                      <input class="btn btn-primary useradd" type="submit" name="button" value="提交">
                      </td>
                  </tr>
                </table>
                  
            </div>
            </div>
</div>
<!-- /添加 -->  
            
<table class="table table-striped table-hover table-condensed">  
<thead>
<tr class="b_black white">
<td width="50" height="34">id</td>
<td width="120">账号</td>
<td width="120">姓名</td>
<td width="120">电话</td>
<td width="100">部门</td>
<td width="150">登录时间</td>
<td>登录IP</td>
<td width="80">是否主管</td>
<td width="80">有效</td>
<td width="100">操作</td>
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
    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['user_id'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['user_login'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['user_name'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['user_tel'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['bm']->value[$_smarty_tpl->tpl_vars['item']->value['user_department']];?>
</td>
    <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['last_logtm'],'%Y-%m-%d %H:%M:%S');?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['last_logip'];?>
</td>
    <td>
    <?php if ($_smarty_tpl->tpl_vars['item']->value['user_lead']==1){?>
    <span class="white b_red">是</span>
    <?php }else{ ?>
    否
    <?php }?>
    </td>
    <td>
    
    <?php if ($_smarty_tpl->tpl_vars['item']->value['user_delete']==1){?>
    <span class="white b_red">无效</span>
    <?php }else{ ?>
    有效
    <?php }?>
    </td>
    <td>
      
&nbsp;      <a user_hash="<?php echo $_smarty_tpl->tpl_vars['item']->value['user_hash'];?>
" class="user_poedit"><span class="glyphicon glyphicon-th-large"></span></a>
&nbsp;      <a user_id="<?php echo $_smarty_tpl->tpl_vars['item']->value['user_id'];?>
" class="user_edit"><span class="glyphicon glyphicon-pencil"></span></a>
&nbsp;      <a user_id="<?php echo $_smarty_tpl->tpl_vars['item']->value['user_id'];?>
" class="user_del"><span class="glyphicon glyphicon-remove"></span></a>       
      
      
</td>
    </tr>
<?php } ?>
<tr>
  <td colspan="10"><?php echo $_smarty_tpl->tpl_vars['rs']->value['pager'];?>
</td>
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
<script>
$(document).ready(function(){


	$('.user_poedit').click(function(){
		$.CK({
			rel:'user_poedit',
			url:'Sys.php?a=user_poedit&user_hash='+$(this).attr("user_hash"),
			_this:$(this),
			buttonok	: true,
            buttoncancel: true,
			});
	});

	$('.user_edit').click(function(){
		$.CK({
			rel:'edituser',
			url:'Sys.php?a=user_edit&user_id='+$(this).attr("user_id"),
			_this:$(this),
			buttonok	: true,
            buttoncancel: true,
			});
	});

	$('.useradd').click(function(){
		var res = $.ajax({
			url : 'Sys.php?a=user_add_ext',
			type: 'post',
			data: {
				user_login		: $(".user_login").val(),
				user_password	: $(".user_password").val(),
				user_password2	: $(".user_password2").val(),
				user_name		: $(".user_name").val(),
				user_tel		: $(".user_tel").val(),
				user_department	: $(".user_department").val(),
				user_lead		: $("input[name=user_lead]:checked").val(),
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

	$('.user_del').click(function(){
		var res = $.ajax({
			url : 'Sys.php?a=user_delete_ext',
			type: 'post',
			data: {
				user_id : $(this).attr("user_id"),
				},
			dataType: "json",
			async:false,
			cache:false
		}).responseJSON;
//		//==========================1
		if(res.code<0){
			alert(res.msg);
			return false;
		}else{
			location.reload();
			return true;
		}	
	});	
	
	
});  
</script>
</body>
</html><?php }} ?>