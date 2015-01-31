<?php /* Smarty version Smarty-3.1.14, created on 2015-01-21 15:39:02
         compiled from "..\M\Common\CommonLogin.htm" */ ?>
<?php /*%%SmartyHeaderCode:2381554bf5796ae4872-50509671%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '38bb7ec95c383cb6e0451ca857f669448964eba5' => 
    array (
      0 => '..\\M\\Common\\CommonLogin.htm',
      1 => 1411983862,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2381554bf5796ae4872-50509671',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SysSet' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_54bf5796b21775_19640744',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54bf5796b21775_19640744')) {function content_54bf5796b21775_19640744($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta charset="GBK">
<title>后台登陆</title>
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="/A/CSS/normalize-min.css">
    <link rel="stylesheet" href="/A/bootstrap-3.2.0/css/bootstrap.css">
    <link rel="stylesheet" href="/A/bootstrap-3.2.0/css/bootstrap-theme.css">
	<script type="text/javascript" src="/A/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="/A/bootstrap-3.2.0/js/bootstrap.js"> </script>
    <script type="text/javascript" src="/A/artDialog4.1.7/artDialog.js?skin=default"></script>
    <script type="text/javascript" src="/A/CommonIni.js"> </script>
    <script type="text/javascript" src="/A/CK.js"> </script>
	<script type="text/javascript" src="/A/MD5.js"></script>
	<script type="text/javascript" src="/A/debug.js"></script>
    
</head>
<body>
<div class="container-fluid">
<div class="row">
  <div class="col-md-12">
  
     
<table width="400" align="center">  
<tr>
  <td width="400" height="200"></td>
  </tr>
<tr>  
<td>
<form class="form-horizontal" role="form">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
            <div class="col-sm-9">
            <input type="email" class="form-control" id="J-input-user" placeholder="Email">
            </div>
        </div>
      
      
        <div class="form-group">
        <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
        <div class="col-sm-9">
        <input type="password" class="form-control" id="J-input-pwd" placeholder="Password">
        </div>
        </div>
        
<?php if ($_smarty_tpl->tpl_vars['SysSet']->value['SetManageLogin']==1){?>
        <div class="form-group">
        <label for="inputPassword3" class="col-sm-3 control-label">验证码</label>
        <div class="col-sm-6">
        <input type="text" class="form-control" id="J-input-yzm" placeholder="验证码" size="10">
        </div>
        <div class="col-sm-3">
        <img  title="点击刷新" src="/C/Models/ValidateCode/captcha.php" align="absbottom" onclick="this.src='/C/Models/ValidateCode/captcha.php?'+Math.random();"></img>        
        </div>
<?php }?>
        
        </div>
      
      
      
        <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
        <label>
        <input type="checkbox"> Remember me
        </label>
        </div>
        </div>
        </div>
        <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
        <a type="submit" id="login_sub" class="btn btn-default">登录</a>
        </div>
        </div>
</form>
  
  
  </td>  
</tr>  
</table>     

  </div>
</div>
</div>



<script language="javascript">
$(document).ready(function(e) {
		
	function sb() {
		var username = $('#J-input-user').val();
		var userpass = $('#J-input-pwd').val();
		var useryzm = $('#J-input-yzm').val();
		
		if(userpass !='' && userpass != undefined){
		userpass = hex_md5(userpass);
		}
		
		datas = {
			username 	: username,
			userpass 	: userpass,
			useryzm 	: useryzm
			}
		$.post("Login.php?a=loginIO", datas,function (data, textStatus){        
			if(data.code>0){
				//跳转
				window.location.href="Sys.php?a=set";
			}else{
				alert(data.msg);
			}
			console.log(data.code);
		}, "json");
	}
	
	document.onkeydown=keyDownSearch;  

	function keyDownSearch(e) {    
		// 兼容FF和IE和Opera    
		var theEvent = e || window.event;    
		var code = theEvent.keyCode || theEvent.which || theEvent.charCode;    
		if (code == 13) {    
			//alert('回车');//具体处理函数    
			sb();
			return false;    
		}    
		return true;    
	}  	
	
	
	$('#login_sub').click(function(e){
		sb();
	});	

})
</script>



</body>
</html><?php }} ?>