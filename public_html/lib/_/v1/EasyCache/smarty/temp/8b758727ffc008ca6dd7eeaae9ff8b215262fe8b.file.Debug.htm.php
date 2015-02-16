<?php /* Smarty version Smarty-3.1.14, created on 2015-01-21 15:38:03
         compiled from "E:\www\s.so\M\Common\Debug.htm" */ ?>
<?php /*%%SmartyHeaderCode:1428854bf575b885df1-49179883%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8b758727ffc008ca6dd7eeaae9ff8b215262fe8b' => 
    array (
      0 => 'E:\\www\\s.so\\M\\Common\\Debug.htm',
      1 => 1414006302,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1428854bf575b885df1-49179883',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SysSet' => 0,
    '_TM' => 0,
    '_MEN' => 0,
    '_QC' => 0,
    'k' => 0,
    'i' => 0,
    '_DI' => 0,
    '_TABLE' => 0,
    '_FIELD' => 0,
    'ii' => 0,
    '__SysSet' => 0,
    '_CFG' => 0,
    '__rs' => 0,
    '_queryLog' => 0,
    '_SysModules' => 0,
    '_SysMenus' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_54bf575b8c2cf5_24656537',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54bf575b8c2cf5_24656537')) {function content_54bf575b8c2cf5_24656537($_smarty_tpl) {?><!-- debug -->
<?php if ($_smarty_tpl->tpl_vars['SysSet']->value['SetManageDebug_lib']==1){?>
<script type="text/javascript" src="/A/debug.js"> </script>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['SysSet']->value['SetManageDebug']==1){?>
<div style="position:fixed;bottom:0;right:0;z-index:9999;width:40px;cursor:pointer;margin:10px 20px 1px 0;">
<a class="bottomdebug" style="color:#999999"  data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-th-list"></span></a> 
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="z-index:999999;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">性能</h4> 
        时间 : <?php echo $_smarty_tpl->tpl_vars['_TM']->value;?>
 ms | 内存 : <?php echo $_smarty_tpl->tpl_vars['_MEN']->value;?>
 KB |  查询次数 :<?php echo $_smarty_tpl->tpl_vars['_QC']->value;?>
 次
      </div>
      <div class="modal-body">
        	<!-- 内容 -->
            <div class="panel panel-default" style="width:100%">
            <ul id="myTab" class="nav nav-tabs" role="tablist">
                <li class="active"><a data-toggle="tab" role="tab" href="#vd1">性能</a></li>
                <li><a data-toggle="tab" role="tab" href="#vd2">常量</a></li>
                <li><a data-toggle="tab" role="tab" href="#vd3">函数</a></li>
                <li><a data-toggle="tab" role="tab" href="#vd4">表</a></li>
                <li><a data-toggle="tab" role="tab" href="#vd5">后台界面变量</a></li>
                <li><a data-toggle="tab" role="tab" href="#vd6">全局$_W</a></li>
                <li><a data-toggle="tab" role="tab" href="#vd7">分页$this->rs</a></li>
                <li><a data-toggle="tab" role="tab" href="#vd9">数据库$this->db->_queryLog</a></li>
                <li><a data-toggle="tab" role="tab" href="#vd10">后台其他</a></li>
            </ul>  
            <div id="myTabContent" class="tab-content panel-body">
                <div id="vd1" class="tab-pane fade active in">
                
                
<p>黑盒系统</p>
$('.icon-remove').click(function(){<br />
confirms('确定要删除吗?',function(){<br />
alert(1)
		});
	})
<p>模式 : </p>
<p>1 : 登录和验证 <a href="?c=Admin.login">?c=Admin.login</a></p>
<table class="table table-hover table-striped table-condensed">
  <tr>
    <td>公用方法</td>
    <td>调用</td>
    <td>---</td>
    <td>-----</td>
  </tr>
  <tr>
    <td>-&gt;Headutf8()</td>
    <td>前置</td>
    <td>-&gt;E($msg='')</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>-&gt;login()</td>
    <td>前置</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>-&gt;logout()</td>
    <td>后置</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
<hr />

<table class="table table-hover table-striped table-condensed">
  <tr>
    <td>方法</td>
    <td>调用</td>
    <td>重写</td>
  </tr>
  <tr>
    <td>$instance-&gt;AppModuleRun();</td>
    <td>前置</td>
    <td>/M/App.class.php</td>
  </tr>
  <tr>
    <td>$instance-&gt;__IniRun();</td>
    <td>前置</td>
    <td>模块中</td>
  </tr>
  <tr>
    <td>$instance-&gt;ButtomDebug()</td>
    <td>后置</td>
    <td>/C/Fun/AppBase.class.php</td>
  </tr>
  <tr>
    <td>$instance-&gt;$action(); </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<hr />

_GET
<blockquote>
    <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_GET; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['foo']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
$_smarty_tpl->tpl_vars['i']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['i']->key;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['foo']['index']++;
?> 
    <?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['foo']['index']+1;?>
 : <?php echo $_smarty_tpl->tpl_vars['k']->value;?>
 = <?php echo $_smarty_tpl->tpl_vars['i']->value;?>
<br>
    <?php } ?>
</blockquote>
<hr />

_POST
<blockquote>
<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_POST; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['foo']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
$_smarty_tpl->tpl_vars['i']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['i']->key;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['foo']['index']++;
?> 
<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['foo']['index']+1;?>
 : <?php echo $_smarty_tpl->tpl_vars['k']->value;?>
 = <?php echo $_smarty_tpl->tpl_vars['i']->value;?>
<br>
<?php } ?>
</blockquote>
<hr />

_COOKIES
<blockquote>
<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_COOKIE; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['foo']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
$_smarty_tpl->tpl_vars['i']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['i']->key;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['foo']['index']++;
?> 
<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['foo']['index']+1;?>
 : <?php echo $_smarty_tpl->tpl_vars['k']->value;?>
 = <?php echo $_smarty_tpl->tpl_vars['i']->value;?>
<br>
<?php } ?>
</blockquote>
<hr />

_SESSION
<blockquote>
<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_SESSION; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['foo']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
$_smarty_tpl->tpl_vars['i']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['i']->key;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['foo']['index']++;
?> 
<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['foo']['index']+1;?>
 : <?php echo $_smarty_tpl->tpl_vars['k']->value;?>
 = <?php echo $_smarty_tpl->tpl_vars['i']->value;?>
<br>
<?php } ?>
</blockquote>


              </div>
              <div id="vd2" class="tab-pane fade">
_常量
<table class="table table-hover table-striped table-condensed">
<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['_DI']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['foo']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
$_smarty_tpl->tpl_vars['i']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['i']->key;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['foo']['index']++;
?> 
  <tr>
    <td><?php echo $_smarty_tpl->tpl_vars['k']->value;?>
</td>
    <td>= <?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</td>
  </tr>
<?php } ?>
</table>
              </div>
              <div id="vd3" class="tab-pane fade">
<table class="table table-hover table-condensed">
<tbody>
<tr>
<td colspan="3">Cr($file, $dir = '') / Cw($file, $array, $dir = '') / Cd($file, $dir = '')</td>
</tr>
<tr>
<td colspan="3">getarr($str,$flit='0',$bl = &quot;\r\n&quot;)  / getstr($arr,$flit='0',$bl = &quot;\r\n&quot;)</td>
</tr>
<tr>
<td colspan="3">saddslashes($string) / stripslashes</td>
</tr>
<tr>
<td colspan="3">Fr($filename) / Fs($fileName, $text) </td>
</tr>
<tr>
<td colspan="3">DIN($chr,$value='') / G($chr)</td>
</tr>
</tbody>
</table>
              </div>
              <div id="vd4" class="tab-pane fade">
_TABLE
<table class="table table-hover table-condensed">
<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['_TABLE']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['foo']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
$_smarty_tpl->tpl_vars['i']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['i']->key;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['foo']['index']++;
?> 
  <tr>
    <td><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</td>
    <td>
<?php  $_smarty_tpl->tpl_vars['ii'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ii']->_loop = false;
 $_smarty_tpl->tpl_vars['kk'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['_FIELD']->value[$_smarty_tpl->tpl_vars['i']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['foo']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['ii']->key => $_smarty_tpl->tpl_vars['ii']->value){
$_smarty_tpl->tpl_vars['ii']->_loop = true;
 $_smarty_tpl->tpl_vars['kk']->value = $_smarty_tpl->tpl_vars['ii']->key;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['foo']['index']++;
?> 
<?php echo $_smarty_tpl->tpl_vars['ii']->value['Field'];?>
 : <?php echo $_smarty_tpl->tpl_vars['ii']->value['Type'];?>
<br>
<?php } ?>
    </td>
  </tr>
<?php } ?>
</table>


                </div>
                
                <div id="vd5" class="tab-pane fade">
                
                    
                    __SysSet
                    <pre>
                    <?php echo $_smarty_tpl->tpl_vars['__SysSet']->value;?>

                    </pre>
                    
                    
                
                </div>
                
                <div id="vd6" class="tab-pane fade">
                    _W
                    <pre><?php echo $_smarty_tpl->tpl_vars['_CFG']->value;?>

                    </pre>
                </div>
                
                <div id="vd7" class="tab-pane fade">
                    __rs
                    <pre><?php echo $_smarty_tpl->tpl_vars['__rs']->value;?>

                    </pre>
                  
                    
                </div>
                <div id="vd9" class="tab-pane fade">
_queryLog
                    <pre><?php echo $_smarty_tpl->tpl_vars['_queryLog']->value;?>

                    </pre>
                    
                </div>
                
               <div id="vd10" class="tab-pane fade">
$SysModules
                    <pre><?php echo $_smarty_tpl->tpl_vars['_SysModules']->value;?>

                    </pre>
$SysMenus                 
                    
                    <pre><?php echo $_smarty_tpl->tpl_vars['_SysMenus']->value;?>

                    </pre>
                    
                </div>
                
                
                
                
            </div>  
            </div>
      </div>
      <div class="modal-footer">
       时间 : <?php echo $_smarty_tpl->tpl_vars['_TM']->value;?>
 ms<br>
内存 : <?php echo $_smarty_tpl->tpl_vars['_MEN']->value;?>
 KB<br>
 查询次数 :<?php echo $_smarty_tpl->tpl_vars['_QC']->value;?>
 次
      </div>
    </div>
  </div>
</div>
<?php }?>
<!-- /debug -->
<?php }} ?>