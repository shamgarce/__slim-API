<?php /* Smarty version Smarty-3.1.14, created on 2015-01-21 15:47:59
         compiled from "E:\www\s.so\M\Common\NavHead.htm" */ ?>
<?php /*%%SmartyHeaderCode:1729754bf575b7cf0f2-53357103%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7362321eabfa93193cc7a7022c6eea8fb94158ed' => 
    array (
      0 => 'E:\\www\\s.so\\M\\Common\\NavHead.htm',
      1 => 1421826476,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1729754bf575b7cf0f2-53357103',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_54bf575b7cf0f6_44712265',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54bf575b7cf0f6_44712265')) {function content_54bf575b7cf0f6_44712265($_smarty_tpl) {?><div id="navbar_head" class="navbar navbar-inverse navbar_head" role="navigation" style="margin: 0 0 10px 0;">
  <div class="container-fluid">
    <div class="navbar-header">
        <a class="navbar-brand">EASY</a>
      <a class="navbar-brand scollleft"><span class="glyphicon glyphicon-th-list"></span></a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <!-- 左侧 -->  
        <ul class="nav navbar-nav"></ul>
        <!-- /左侧 -->  
    
        <!-- 右侧 -->
        <ul class="nav navbar-nav navbar-right">
        
      
        
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="glyphicon glyphicon-cog"></span> 我的信息 <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="?c=Sys.changepwd">我的账号</a></li>
                <li class="divider"></li>
                <li><a href="?a=logout"><span class="glyphicon glyphicon-log-out"></span> 退出</a></li>
            </ul>
        </li>
        
        <li><a href="?a=logout"><span class="glyphicon glyphicon-log-out"></span> 退出</a></li>


        </ul>
        <!-- /右侧 -->
    </div>
  </div>
</div>
<?php }} ?>