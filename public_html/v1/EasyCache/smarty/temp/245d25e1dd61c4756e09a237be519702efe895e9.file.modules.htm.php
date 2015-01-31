<?php /* Smarty version Smarty-3.1.14, created on 2015-01-21 15:38:08
         compiled from "..\M\Sys\modules.htm" */ ?>
<?php /*%%SmartyHeaderCode:2547754bf5760d29682-17064408%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '245d25e1dd61c4756e09a237be519702efe895e9' => 
    array (
      0 => '..\\M\\Sys\\modules.htm',
      1 => 1414652241,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2547754bf5760d29682-17064408',
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
  'unifunc' => 'content_54bf5760d66589_83811100',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54bf5760d66589_83811100')) {function content_54bf5760d66589_83811100($_smarty_tpl) {?><!doctype html>
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
<!-- 添加 -->
<!--顶部添加按钮 -->
<a data-toggle="collapse" data-parent="#accordion3" href="#collapses3" class="btn btn-primary">
<span class="glyphicon glyphicon-plus"></span> 添加</a>
<br><br>
<div id="collapses3" class="panel-collapse collapse">
            <ul class="nav nav-tabs">
            <li class="active">
            <a data-toggle="tab" href="#home">添加菜单模块</a>
            </li>
            </ul>
            <div class="panel panel-default">
            <div class="panel-body">
                
               <table class="table table-hover table-condensed">
                  <tr>
                    <td align="right">模块名称</td>
                    <td><input name="modules_name" type="text" class="form-control" id="inputSuccess4"></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="right">链接</td>
                    <td><input name="modules_link" type="text" class="form-control" id="inputSuccess" value="/panel/index.php"></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="right">图标</td>
                    <td>
                    <i class="selecticon_preview glyphicon glyphicon-asterisk"></i>
                    <input name="modules_icon" type="text" class="form-control chanicon" id="inputSuccess2" value="glyphicon-asterisk"></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td width="100" align="right">排序: </td>
                    <td width="300"><input name="modules_sort" type="text" class="form-control" id="inputSuccess3" value="1"></td>
                    <td>&nbsp;</td>
                  </tr>
                  
                  <tr>
                    <td align="right">描述: </td>
                    <td><textarea name="modules_dis" class="form-control" id="inputSuccess5"></textarea></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="3">
                    <input class="btn btn-primary modulesadd" type="submit" name="button" id="button" value="提交">
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
<td width="60" height="34">id</td>
<td width="150">模块名</td>
<td width="250">模块链接</td>
<td width="100">排序</td>
<td width="100">是否在线</td>
<td>描述</td>
<td width="80">type</td>
<td width="40">C</td>
<td width="50">图标</td>
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
  <td><?php echo $_smarty_tpl->tpl_vars['item']->value['modules_id'];?>
</td>
  <td><?php echo $_smarty_tpl->tpl_vars['item']->value['modules_name'];?>
</td>
  <td><?php echo $_smarty_tpl->tpl_vars['item']->value['modules_link'];?>
</td>
  <td><?php echo $_smarty_tpl->tpl_vars['item']->value['modules_sort'];?>
</td>
  <td>
  <?php if ($_smarty_tpl->tpl_vars['item']->value['modules_online']==1){?>是<?php }else{ ?>否<?php }?>
  </td>
  <td><?php echo $_smarty_tpl->tpl_vars['item']->value['modules_dis'];?>
</td>
  <td><?php echo $_smarty_tpl->tpl_vars['item']->value['modules_type'];?>
</td>
  <td><?php echo $_smarty_tpl->tpl_vars['item']->value['modules_c'];?>
</td>
  <td>
    <i class="glyphicon <?php echo $_smarty_tpl->tpl_vars['item']->value['modules_icon'];?>
"></i>
    
  </td>
  <td>
  &nbsp;      <a href="Sys.php?a=menus&sx=<?php echo $_smarty_tpl->tpl_vars['item']->value['modules_id'];?>
"><span class="glyphicon glyphicon-list-alt"></span></a>
&nbsp;      <a modules_id="<?php echo $_smarty_tpl->tpl_vars['item']->value['modules_id'];?>
" class="modules_edit"><span class="glyphicon glyphicon-pencil"></span></a>
&nbsp;      <a modules_id="<?php echo $_smarty_tpl->tpl_vars['item']->value['modules_id'];?>
" class="modules_del"><span class="glyphicon glyphicon-remove"></span></a> 

</td>
</tr>
<?php } ?>
</table>
<br>如果是超级用户模块,无需任何设定,只有超级用户才能进行访问
<br>如果是管理员模块,无需任何设定,只有部门主管角色才可以访问
<br>如果是single 只需要指定模块权限就可以访问

<br>公用 / 功能模块,需要遵循设定原则 才可以访问里面的细节内容

<br>账号组设定,只设定到模块,具体功能设定,需要指定到用户


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
	
	$('.modules_edit').click(function(){
		$.CK({
			rel:'selecticon',
			url:'Sys.php?a=modules_edit&modules_id='+$(this).attr("modules_id"),
			_this:$(this),
			buttonok	: true,
            buttoncancel: true,
			});
				
		console.log($(this).attr("group_id"));
	});
	
	
	$('.modules_del').click(function(){
		var res = $.ajax({
			url : 'Sys.php?a=modules_delete_ext',
			type: 'post',
			data: {
				modules_id : $(this).attr("modules_id"),
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
	
	$('.modulesadd').click(function(){
		var res = $.ajax({
			url : 'Sys.php?a=modules_add_ext',
			type: 'post',
			data: {
				modules_name 	: $("input[name=modules_name]").val(),
				modules_link 	: $("input[name=modules_link]").val(),
				modules_sort 	: $("input[name=modules_sort]").val(),
				modules_dis 	: $("input[name=modules_dis]").val(),
				modules_icon 	: $("input[name=modules_icon]").val()
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

	
 	$('.chanicon').click(function(){ 
		$.CK({
			rel:'selecticon',
			_this:$(this)
			}); 
	});					
	
	
});  



</script>
</body>
</html><?php }} ?>