<?php
error_reporting(1); //抑制所有错误信息

include "Config.php";
include "Act.php";

@header("content-Type: text/html; charset=utf-8"); //语言强制
ob_start();
date_default_timezone_set('Asia/Shanghai');//此句用于消除时间差
$title = 'EASY PHP探针 [简体版]';
$version = "v0.1.1"; //版本号
define('HTTP_HOST', preg_replace('~^www\.~i', '', $_SERVER['HTTP_HOST']));
$time_start = microtime_float();

// 根据不同系统取得CPU相关信息
switch(PHP_OS)
{
	case "Linux":
		$sysReShow = (false !== ($sysInfo = sys_linux()))?"show":"none";
		break;
	case "FreeBSD":
		$sysReShow = (false !== ($sysInfo = sys_freebsd()))?"show":"none";
		break;
	case "WINNT":
		//$sysReShow = (false !== ($sysInfo = sys_windows()))?"show":"none";
		break;
	default:
		break;
}


//echo $sysReShow;


?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

	<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<title>雅黑PHP探针[简体版]v0.4.7</title>
		<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script language="JavaScript" type="text/javascript" src="/A/jquery-1.7.2.min.js"></script>
		<link href="css.css" rel="stylesheet">
		<!--<style type="text/css"></style>-->

		<script type="text/javascript">
			<!--
			$(document).ready(function(){
				function displayData(dataJSON){
				}
				$(".mysqlcheck").click(function(){
					alert(1);
				})
			});
			-->
		</script>

	</head>

	<body>
	<a name="w_top"></a>

	<div id="page">


		<table>
			<tr>
				<th class="w_logo">EASY PHP探针</th>
				<th class="w_top"><a href="#w_php">PHP参数</a></th>
				<th class="w_top"><a href="#w_module">组件支持</a></th>
				<th class="w_top"><a href="#w_module_other">第三方组件</a></th>
				<th class="w_top"><a href="#w_db">数据库支持</a></th>
				<th class="w_top"><a href="#w_MySQL">MySQL检测</a></th>
				<th class="w_top"><a href="#w_function">函数检测</a></th>
			</tr>
		</table>


<!-- 第三方 -->
<table width="100%" cellpadding="3" cellspacing="0" align="center">

			<tr>

				<th colspan="4">重要的信息</th>

			</tr>

			<tr>
			  <td colspan="4"></td>
    </tr>
			
			<tr>

				<td colspan="4">
<div style="width:100px;float:left;">扩展检测 : </div>

<div style="width:100px;float:left;"><a href="N.php?act=phpinfo" target="_blank">PHPINFO</a></div>

<div style="width:100px;float:left;"><a href="N.php?act=Function" target="_blank">函数</a></div>

<div style="width:100px;float:left;"><a href="N.php?act=disable_functions" target="_blank">被禁用的函数</a></div>


				</td>

			</tr>
<tr>
			  <td colspan="4">
              <div style="width:100px;float:left;">管理 : </div>
              <div style="width:100px;float:left;"><a href="APC/apc.php" target="_blank">APC</a></div>
              <div style="width:100px;float:left;"><a href="Mem/" target="_blank">MemCache</a></div>
              <div style="width:100px;float:left;"><a href="PM/" target="_blank">PhpMyadmin</a></div>
              </td>
    </tr>
		</table>







<!-- 版本 -->



<table>

			<tr>
			  <th colspan="4">版本</th></tr>

			<tr>

				<td width="13%">PHP</td>

				<td width="37%"><?php echo PHP_VERSION;?></td>

				<td width="13%">Apc</td>

				<td width="37%"><?php if((phpversion('APC'))!=''){echo phpversion('APC');}else{ echo "<font color=red>×</font>";} ?></td>

			</tr>

			<tr>

				<td>Mysql</td>

				<td>&nbsp;</td>

				<td>Zend</td>

				<td><?php $zend_version = zend_version();if(empty($zend_version)){echo '<font color=red>×</font>';}else{echo $zend_version;}?></td>

			</tr>

			<tr>

				<td>MongoDb</td>

				<td>&nbsp;</td>

				<td>&nbsp;</td>

				<td>&nbsp;</td>

			</tr>

			<tr>

				<td>MemCache</td>

				<td>&nbsp;</td>

				<td>Apache</td>

				<td><?php echo $_SERVER['SERVER_SOFTWARE'];?></td>

			</tr>

		</table>




		<!--服务器相关参数-->

		<table>

			<tr><th colspan="4">服务器参数</th></tr>

			<tr>

				<td>服务器域名/IP地址</td>

				<td colspan="3"><?php echo @get_current_user();?> - <?php echo $_SERVER['SERVER_NAME'];?>(<?php if('/'==DIRECTORY_SEPARATOR){echo $_SERVER['SERVER_ADDR'];}else{echo @gethostbyname($_SERVER['SERVER_NAME']);} ?>)&nbsp;&nbsp;你的IP地址是：<?php echo @$_SERVER['REMOTE_ADDR'];?></td>

			</tr>

			<tr>

				<td>服务器标识</td>

				<td colspan="3"><?php if($sysInfo['win_n'] != ''){echo $sysInfo['win_n'];}else{echo @php_uname();};?></td>

			</tr>

			<tr>

				<td width="13%">服务器操作系统</td>

				<td width="37%"><?php $os = explode(" ", php_uname()); echo $os[0];?> &nbsp;内核版本：<?php if('/'==DIRECTORY_SEPARATOR){echo $os[2];}else{echo $os[1];} ?></td>

				<td width="13%">服务器解译引擎</td>

				<td width="37%"><?php echo $_SERVER['SERVER_SOFTWARE'];?></td>

			</tr>

			<tr>

				<td>服务器语言</td>

				<td><?php echo getenv("HTTP_ACCEPT_LANGUAGE");?></td>

				<td>服务器端口</td>

				<td><?php echo $_SERVER['SERVER_PORT'];?></td>

			</tr>

			<tr>

				<td>服务器主机名</td>

				<td><?php if('/'==DIRECTORY_SEPARATOR ){echo $os[1];}else{echo $os[2];} ?></td>

				<td>绝对路径</td>

				<td><?php echo $_SERVER['DOCUMENT_ROOT']?str_replace('\\','/',$_SERVER['DOCUMENT_ROOT']):str_replace('\\','/',dirname(__FILE__));?></td>

			</tr>

			<tr>

				<td>管理员邮箱</td>

				<td><?php echo $_SERVER['SERVER_ADMIN'];?></td>

				<td>探针路径</td>

				<td><?php echo str_replace('\\','/',__FILE__)?str_replace('\\','/',__FILE__):$_SERVER['SCRIPT_FILENAME'];?></td>

			</tr>

		</table>

		<table width="100%" cellpadding="3" cellspacing="0" align="center">

			<tr>

				<th colspan="4">PHP已编译模块检测</th>

			</tr>

			<tr>

				<td colspan="4"><span class="w_small">

<?php
$able=get_loaded_extensions();
foreach ($able as $key=>$value) {
	echo "<div style='width: 100px;float: left;'>$value</div>";
}
?></span>

				</td>

			</tr>

		</table>

		<a name="w_php"></a>

		<table>

			<tr><th colspan="4">PHP相关参数</th></tr>

			<tr>

				<td width="32%">PHP信息（phpinfo）：</td>

				<td width="18%">

					<?php

					$phpSelf = $_SERVER[PHP_SELF] ? $_SERVER[PHP_SELF] : $_SERVER[SCRIPT_NAME];
					$disFuns=get_cfg_var("disable_functions");
					?>

					<?php //echo (false!==eregi("phpinfo",$disFuns))? '<font color="red">×</font>' :"<a href='$phpSelf?act=phpinfo' target='_blank'>PHPINFO</a>";?>
                    <?php echo (false!==eregi("phpinfo",$disFuns))? '<font color="red">×</font>' :"PHPINFO";?>

			  </td>

				<td width="32%">PHP版本（php_version）：</td>

				<td width="18%"><?php echo PHP_VERSION;?></td>

			</tr>

			<tr>

				<td>PHP运行方式：</td>

				<td><?php echo strtoupper(php_sapi_name());?></td>

				<td>脚本占用最大内存（memory_limit）：</td>

				<td><?php echo show("memory_limit");?></td>

			</tr>

			<tr>

				<td>PHP安全模式（safe_mode）：</td>

				<td><?php echo show("safe_mode");?></td>

				<td>POST方法提交最大限制（post_max_size）：</td>

				<td><?php echo show("post_max_size");?></td>

			</tr>

			<tr>

				<td>上传文件最大限制（upload_max_filesize）：</td>

				<td><?php echo show("upload_max_filesize");?></td>

				<td>浮点型数据显示的有效位数（precision）：</td>

				<td><?php echo show("precision");?></td>

			</tr>

			<tr>

				<td>脚本超时时间（max_execution_time）：</td>

				<td><?php echo show("max_execution_time");?>秒</td>

				<td>socket超时时间（default_socket_timeout）：</td>

				<td><?php echo show("default_socket_timeout");?>秒</td>

			</tr>

			<tr>

				<td>PHP页面根目录（doc_root）：</td>

				<td><?php echo show("doc_root");?></td>

				<td>用户根目录（user_dir）：</td>

				<td><?php echo show("user_dir");?></td>

			</tr>

			<tr>

				<td>dl()函数（enable_dl）：</td>

				<td><?php echo show("enable_dl");?></td>

				<td>指定包含文件目录（include_path）：</td>

				<td><?php echo show("include_path");?></td>

			</tr>

			<tr>

				<td>显示错误信息（display_errors）：</td>

				<td><?php echo show("display_errors");?></td>

				<td>自定义全局变量（register_globals）：</td>

				<td><?php echo show("register_globals");?></td>

			</tr>

			<tr>

				<td>数据反斜杠转义（magic_quotes_gpc）：</td>

				<td><?php echo show("magic_quotes_gpc");?></td>

				<td>"&lt;?...?&gt;"短标签（short_open_tag）：</td>

				<td><?php echo show("short_open_tag");?></td>

			</tr>

			<tr>

				<td>"&lt;% %&gt;"ASP风格标记（asp_tags）：</td>

				<td><?php echo show("asp_tags");?></td>

				<td>忽略重复错误信息（ignore_repeated_errors）：</td>

				<td><?php echo show("ignore_repeated_errors");?></td>

			</tr>

			<tr>

				<td>忽略重复的错误源（ignore_repeated_source）：</td>

				<td><?php echo show("ignore_repeated_source");?></td>

				<td>报告内存泄漏（report_memleaks）：</td>

				<td><?php echo show("report_memleaks");?></td>

			</tr>

			<tr>

				<td>自动字符串转义（magic_quotes_gpc）：</td>

				<td><?php echo show("magic_quotes_gpc");?></td>

				<td>外部字符串自动转义（magic_quotes_runtime）：</td>

				<td><?php echo show("magic_quotes_runtime");?></td>

			</tr>

			<tr>

				<td>打开远程文件（allow_url_fopen）：</td>

				<td><?php echo show("allow_url_fopen");?></td>

				<td>声明argv和argc变量（register_argc_argv）：</td>

				<td><?php echo show("register_argc_argv");?></td>

			</tr>
			<tr>
				<td>Cookie 支持：</td>
				<td><?php echo isset($_COOKIE)?'<font color="green">√</font>' : '<font color="red">×</font>';?></td>
				<td>拼写检查（ASpell Library）：</td>
				<td><?php echo isfun("aspell_check_raw");?></td>
			</tr>
			<tr>
				<td>高精度数学运算（BCMath）：</td>
				<td><?php echo isfun("bcadd");?></td>
				<td>PREL相容语法（PCRE）：</td>
				<td><?php echo isfun("preg_match");?></td>
			<tr>
				<td>PDF文档支持：</td>
				<td><?php echo isfun("pdf_close");?></td>
				<td>SNMP网络管理协议：</td>
				<td><?php echo isfun("snmpget");?></td>
			</tr>
			<tr>
				<td>VMailMgr邮件处理：</td>
				<td><?php echo isfun("vm_adduser");?></td>
				<td>Curl支持：</td>
				<td><?php echo isfun("curl_init");?></td>
			</tr>
			<tr>
				<td>SMTP支持：</td>
				<td><?php echo get_cfg_var("SMTP")?'<font color="green">√</font>' : '<font color="red">×</font>';?></td>
				<td>SMTP地址：</td>
				<td><?php echo get_cfg_var("SMTP")?get_cfg_var("SMTP"):'<font color="red">×</font>';?></td>
			</tr>

			<tr>
				<td>默认支持函数（enable_functions）：</td>
				<td colspan="3"><!-- a href='<?php echo $phpSelf;?>?act=Function' target='_blank' class='static'>请点这里查看详细！</a --></td>
			</tr>
			<tr>
				<td>被禁用的函数（disable_functions）：</td>
				<td colspan="3" class="word">
					<?php
					$disFuns=get_cfg_var("disable_functions");
					if(empty($disFuns))
					{
						echo '<font color=red>×</font>';
					}
					else
					{
						//echo $disFuns;
						$disFuns_array =  explode(',',$disFuns);
						foreach ($disFuns_array as $key=>$value)
						{
							if ($key!=0 && $key%5==0) {
								echo '<br />';
							}
							echo "$value&nbsp;&nbsp;";
						}
					}

					?>
				</td>
			</tr>

		</table>

		<a name="w_module"></a>

		<!--组件信息-->

		<table>

			<tr><th colspan="4" >组件支持</th></tr>

			<tr>

				<td width="32%">FTP支持：</td>

				<td width="18%"><?php echo isfun("ftp_login");?></td>

				<td width="32%">XML解析支持：</td>

				<td width="18%"><?php echo isfun("xml_set_object");?></td>

			</tr>

			<tr>

				<td>Session支持：</td>

				<td><?php echo isfun("session_start");?></td>

				<td>Socket支持：</td>

				<td><?php echo isfun("socket_accept");?></td>

			</tr>

			<tr>

				<td>Calendar支持</td>

				<td><?php echo isfun('cal_days_in_month');?>
				</td>

				<td>允许URL打开文件：</td>

				<td><?php echo show("allow_url_fopen");?></td>

			</tr>

			<tr>

				<td>GD库支持：</td>

				<td>

					<?php

					if(function_exists(gd_info)) {

						$gd_info = @gd_info();

						echo $gd_info["GD Version"];

					}else{echo '<font color="red">×</font>';}

					?></td>

				<td>压缩文件支持(Zlib)：</td>

				<td><?php echo isfun("gzclose");?></td>

			</tr>

			<tr>

				<td>IMAP电子邮件系统函数库：</td>

				<td><?php echo isfun("imap_close");?></td>

				<td>历法运算函数库：</td>

				<td><?php echo isfun("JDToGregorian");?></td>

			</tr>

			<tr>

				<td>正则表达式函数库：</td>

				<td><?php echo isfun("preg_match");?></td>

				<td>WDDX支持：</td>

				<td><?php echo isfun("wddx_add_vars");?></td>

			</tr>

			<tr>

				<td>Iconv编码转换：</td>

				<td><?php echo isfun("iconv");?></td>

				<td>mbstring：</td>

				<td><?php echo isfun("mb_eregi");?></td>

			</tr>

			<tr>

				<td>高精度数学运算：</td>

				<td><?php echo isfun("bcadd");?></td>

				<td>LDAP目录协议：</td>

				<td><?php echo isfun("ldap_close");?></td>

			</tr>

			<tr>

				<td>MCrypt加密处理：</td>

				<td><?php echo isfun("mcrypt_cbc");?></td>

				<td>哈稀计算：</td>

				<td><?php echo isfun("mhash_count");?></td>

			</tr>

		</table>

		<a name="w_module_other"></a>
		<!--第三方组件信息-->
		<table>
			<tr><th colspan="4" >第三方组件</th></tr>
			<tr>
				<td width="32%">Zend版本</td>
				<td width="18%"><?php $zend_version = zend_version();if(empty($zend_version)){echo '<font color=red>×</font>';}else{echo $zend_version;}?></td>
				<td width="32%">
					<?php
					$PHP_VERSION = PHP_VERSION;
					$PHP_VERSION = substr($PHP_VERSION,2,1);
					if($PHP_VERSION > 2)
					{
						echo "ZendGuardLoader[启用]";
					}
					else
					{
						echo "Zend Optimizer";
					}
					?>
				</td>
				<td width="18%"><?php if($PHP_VERSION > 2){echo (get_cfg_var("zend_loader.enable"))?'<font color=green>√</font>':'<font color=red>×</font>';} else{if(function_exists('zend_optimizer_version')){	echo zend_optimizer_version();}else{	echo (get_cfg_var("zend_optimizer.optimization_level")||get_cfg_var("zend_extension_manager.optimizer_ts")||get_cfg_var("zend.ze1_compatibility_mode")||get_cfg_var("zend_extension_ts"))?'<font color=green>√</font>':'<font color=red>×</font>';}}?></td>
			</tr>
			<tr>
				<td>eAccelerator</td>
				<td><?php if((phpversion('eAccelerator'))!=''){echo phpversion('eAccelerator');}else{ echo "<font color=red>×</font>";} ?></td>
				<td>ioncube</td>
				<td><?php if(extension_loaded('ionCube Loader')){   $ys = ioncube_loader_iversion();   $gm = ".".(int)substr($ys,3,2);   echo ionCube_Loader_version().$gm;}else{echo "<font color=red>×</font>";}?></td>
			</tr>
			<tr>
				<td>XCache</td>
				<td><?php if((phpversion('XCache'))!=''){echo phpversion('XCache');}else{ echo "<font color=red>×</font>";} ?></td>
				<td>APC</td>
				<td><?php if((phpversion('APC'))!=''){echo phpversion('APC');}else{ echo "<font color=red>×</font>";} ?></td>
			</tr>
		</table>

		<a name="w_db"></a>

		<!--数据库支持-->

		<table>

			<tr><th colspan="4">数据库支持</th></tr>

			<tr>

				<td width="32%">MySQL 数据库：</td>

				<td width="18%"><?php echo isfun("mysql_close");?>

					<?php
					if(function_exists("mysql_get_server_info")) {
//$s = @mysql_get_server_info();
//$s = $s ? '&nbsp; mysql_server 版本：'.$s : '';
//$c = '&nbsp; mysql_client 版本：'.@mysql_get_client_info();
//echo $s;
					}
					?>

				</td>

				<td width="32%">ODBC 数据库：</td>

				<td width="18%"><?php echo isfun("odbc_close");?></td>

			</tr>

			<tr>

				<td>Oracle 数据库：</td>

				<td><?php echo isfun("ora_close");?></td>

				<td>SQL Server 数据库：</td>

				<td><?php echo isfun("mssql_close");?></td>

			</tr>

			<tr>

				<td>dBASE 数据库：</td>

				<td><?php echo isfun("dbase_close");?></td>

				<td>mSQL 数据库：</td>

				<td><?php echo isfun("msql_close");?></td>

			</tr>

			<tr>

				<td>SQLite 数据库：</td>

				<td><?php if(extension_loaded('sqlite3')) {$sqliteVer = SQLite3::version();echo '<font color=green>√</font>　';echo "SQLite3　Ver ";echo $sqliteVer[versionString];}else {echo isfun("sqlite_close");if(isfun("sqlite_close") == '<font color="green">√</font>') {echo "&nbsp; 版本： ".@sqlite_libversion();}}?></td>

				<td>Hyperwave 数据库：</td>

				<td><?php echo isfun("hw_close");?></td>

			</tr>

			<tr>

				<td>Postgre SQL 数据库：</td>

				<td><?php echo isfun("pg_close"); ?></td>

				<td>Informix 数据库：</td>

				<td><?php echo isfun("ifx_close");?></td>

			</tr>
			<tr>
				<td>DBA 数据库：</td>
				<td><?php echo isfun("dba_close");?></td>
				<td>DBM 数据库：</td>
				<td><?php echo isfun("dbmclose");?></td>
			</tr>
			<tr>
				<td>FilePro 数据库：</td>
				<td><?php echo isfun("filepro_fieldcount");?></td>
				<td>SyBase 数据库：</td>
				<td><?php echo isfun("sybase_close");?></td>
			</tr>

		</table>

		<a name="w_performance"></a><a name="bottom"></a>

		<form action="T_.php#bottom" method="post">


			<a name="w_networkspeed"></a>
			<!--网络速度测试--><a name="w_MySQL"></a>

			<!--MySQL数据库连接检测-->

			<table>

				<tr><th colspan="3">MySQL数据库连接检测</th></tr>

				<tr>

					<td width="15%"></td>

					<td width="60%">

						地址：<input type="text" name="host" value="localhost" size="10" />

						端口：<input type="text" name="port" value="3306" size="10" />

						用户名：<input name="login" type="text" value="root" size="10" />


						密码：<input name="password" type="password" value="123" size="10" />

					</td>

					<td width="25%">

						<input class="btn mysqlcheck" type="submit" name="act" value="MySQL检测" />

					</td>

				</tr>

			</table>


			<a name="w_function"></a>

			<!--函数检测-->

			<table>
				<tr><th colspan="3">函数检测</th></tr>
				<tr>
					<td width="15%"></td>
					<td width="60%">
						请输入您要检测的函数：
						<input type="text" name="funName" size="50" />
					</td>
					<td width="25%">
						<input class="btn" type="submit" name="act" align="right" value="函数检测" />
					</td>
				</tr>
			</table>
		</form>
		<table>
			<tr>
				<td class="w_foot"><?php echo $title." ".$version;?></td>
				<td class="w_foot"><?php $run_time = sprintf('%0.4f', microtime_float() - $time_start);?> Processed in <?php echo $run_time?> seconds. <?php echo memory_usage();?> memory usage.</td>
				<td class="w_foot"><a href="#w_top">返回顶部</a></td>
			</tr>
		</table>
	</div>
	</body>
	</html>

