<?php /* Smarty version Smarty-3.1.14, created on 2015-01-21 15:51:30
         compiled from "..\M\Sys\menus.htm" */ ?>
<?php /*%%SmartyHeaderCode:25254bf576067f278-14913628%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '60d3fa49cb5e85f6554ab6c2956943b2f4eba6da' => 
    array (
      0 => '..\\M\\Sys\\menus.htm',
      1 => 1421826689,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25254bf576067f278-14913628',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_54bf5760735f81_84237041',
  'variables' => 
  array (
    'item' => 0,
    'sysmodulessss' => 0,
    'module' => 0,
    'key' => 0,
    'menus' => 0,
    'i' => 0,
    'rc' => 0,
    'rs' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54bf5760735f81_84237041')) {function content_54bf5760735f81_84237041($_smarty_tpl) {?><!doctype html>
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
<?php echo $_smarty_tpl->tpl_vars['item']->value['menus_id'];?>

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
<table class="table table-hover table-condensed">
<tr>
<td width="150">模块筛选  : </td>
<td><a class="btn btn-primary" href="?a=menus">全部</a>

<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['sysmodulessss']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
	<a class="btn btn-primary" href="?a=menus&sx=<?php echo $_smarty_tpl->tpl_vars['item']->value['modules_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['modules_name'];?>
</a>
<?php } ?>
</td>
<td></td>
</tr>




</table><!--顶部添加按钮 -->
<a data-toggle="collapse" data-parent="#accordion3" href="#collapses3" class="btn btn-primary">
<span class="glyphicon glyphicon-plus"></span> 添加</a>权限分配尽在功能模块有效<br><br>

<div id="collapses3" class="panel-collapse collapse">
            <ul class="nav nav-tabs">
            <li class="active">
            <a data-toggle="tab" href="#home">添加功能</a>
            </li>
            </ul>
            <div class="panel panel-default">
            <div class="panel-body">
                
               <table class="table table-hover table-condensed">
                  <tr>
                    <td width="160" align="right">名称 : </td>
                    <td><input name="menus_name" type="text" class="form-control" id="inputSuccess"></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="right">c</td>
                    <td><input name="menuc" type="text" class="form-control" id="inputSuccess3"></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="right">a</td>
                    <td><input name="menua" type="text" class="form-control" id="inputSuccess5"></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="right">链接</td>
                    <td><input name="menus_url" type="text" class="form-control" id="inputSuccess2" value="/panel/"></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="right">所属模块 : </td>
                    <td>
                    
                    
<select class="form-control menus_module" name="menus_module">
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['module']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
                    <td align="right">是否左侧菜单栏显示 : </td>
                    <td><select name="menus_menu_left" class="form-control menus_menu_left">
                      <option value="1">是</option>
                      <option value="0">否</option>
                    </select></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="right">所属菜单 : </td>
                    <td>
<select name="menus_menu" class="form-control menus_menu">
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
"><?php echo $_smarty_tpl->tpl_vars['i']->value['menus_name'];?>
</option>
        <?php }?>
        <?php } ?>
    </optgroup>                    
    <?php } ?>
</select>
                    
                    
                    </td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="right">描述 : </td>
                    <td width="300"><textarea name="menus_dis" class="form-control menus_dis" id="inputSuccess4"></textarea></td>
                    <td>&nbsp;</td>
                  </tr>

                  <tr>
                    <td align="right">权限 : </td>
                    <td><select name="menus_po" class="form-control menus_po">
                      <option value="0" selected>允许</option>
                      <option value="1">禁止</option>
                      <option value="2">分配</option>
                    </select></td>
                    <td>&nbsp;</td>
                  </tr>
                  
                  <tr>
                    <td colspan="3">
                      <input class="btn btn-primary menusadd" type="submit" name="button" id="button" value="提交">
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
<td height="34">id</td>
<td width="140">模块名</td>
<td width="30">c</td>
<td width="30">a</td>
<td>左侧菜单</td>
<td>模块链接</td>
<td>模块</td>
<td>权限</td>
<td>描述图标</td>
<td>排序</td>
<td width="40">有效</td>
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
  <td>&nbsp;</td>
  <td><?php echo $_smarty_tpl->tpl_vars['item']->value['menus_name'];?>
</td>
  <td><?php echo $_smarty_tpl->tpl_vars['item']->value['menuc'];?>
</td>
  <td><?php echo $_smarty_tpl->tpl_vars['item']->value['menua'];?>
</td>
  <td><?php if ($_smarty_tpl->tpl_vars['item']->value['menus_menu_left']==1){?>是<?php }else{ ?>否<?php }?></td>
  <td><?php echo $_smarty_tpl->tpl_vars['item']->value['menus_url'];?>
</td>
  <td><?php echo $_smarty_tpl->tpl_vars['module']->value[$_smarty_tpl->tpl_vars['item']->value['menus_module']];?>
</td>
  <td>
  <?php if ($_smarty_tpl->tpl_vars['item']->value['menus_po']==0){?>允许<?php }elseif($_smarty_tpl->tpl_vars['item']->value['menus_po']==1){?>禁止<?php }else{ ?>分配<?php }?>
  
  </td>

  <td><?php echo $_smarty_tpl->tpl_vars['item']->value['menus_dis'];?>
</td>
  <td><?php echo $_smarty_tpl->tpl_vars['item']->value['menus_sort'];?>
</td>
  <td>
    <?php if ($_smarty_tpl->tpl_vars['item']->value['menus_online']==1){?>是<?php }else{ ?>否<?php }?>
  </td>
  <td>
    &nbsp;      <a href="?a=&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['modules_id'];?>
"><span class="glyphicon glyphicon-list-alt"></span></a>
  &nbsp;      <a menus_id="<?php echo $_smarty_tpl->tpl_vars['item']->value['menus_id'];?>
" class="menus_edit"><span class="glyphicon glyphicon-pencil"></span></a>
  &nbsp;      <a menus_id="<?php echo $_smarty_tpl->tpl_vars['item']->value['menus_id'];?>
" class="menus_del"><span class="glyphicon glyphicon-remove"></span></a> 
    
</td>
</tr>
<?php } ?>
<tr>
  <td colspan="11">
  <?php echo $_smarty_tpl->tpl_vars['rs']->value['pager'];?>

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
<script language="javascript">
$(document).ready(function(){
	
	
	$('.menus_edit').click(function(){
		$.CK({
			rel:'selecticon',
			url:'Sys.php?a=menus_edit&menus_id='+$(this).attr("menus_id"),
			_this:$(this),
			buttonok	: true,
            buttoncancel: true,
			});
	});
	
	$('.menus_del').click(function(){
		var res = $.ajax({
			url : 'Sys.php?a=menus_delete_ext',
			type: 'post',
			data: {
				menus_id : $(this).attr("menus_id"),
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
	
	
	$('.menusadd').click(function(){
		var res = $.ajax({
			url : 'Sys.php?a=menus_add_ext',
			type: 'post',
			data: {
				menus_name		: $("input[name=menus_name]").val(),
				menuc			: $("input[name=menuc]").val(),
				menua			: $("input[name=menua]").val(),
				menus_url		: $("input[name=menus_url]").val(),
				menus_module	: $(".menus_module").val(),
				menus_menu_left	: $(".menus_menu_left").val(),
				menus_menu		: $(".menus_menu").val(),
				menus_po		: $(".menus_po").val(),
				menus_dis		: $(".menus_dis").val()
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