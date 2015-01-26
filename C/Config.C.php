<?php
/*
请设置request_order为GP（Get and Post）
本代码不对request进行安全过滤
ADD BY shampeak
*/
unset($_REQUEST);
defined('IS') or exit();
$_W['_Files'][] 		= __FILE__;



define('EASY_VERSION', 	'3.1');
define('__CHAR', 		'UTF-8');						// 定义字符编码
define('MAGIC_QUOTES_GPC',True);
defined('DEBUG') 				or define('DEBUG',false);
defined('DEBUG_TRACER') 		or define('DEBUG_TRACER',false);
defined('DEBUG_ERROR_REPORT') 	or define('DEBUG_ERROR_REPORT',false);

defined('CP') 		or define('CP', dirname(__FILE__)."\\");	//C的路径

//=======================================================
$_W['Timestamp']	=  microtime(TRUE);
$_W['Charset'] 		=  'UTF-8';
$_W['Timezone'] 	=  'Asia/Chongqing';
$_W['ClientIp'] 	=  $_SERVER["REMOTE_ADDR"];
$_W['ScriptName'] 	=  $_SERVER["SCRIPT_NAME"];
$_W['Salt'] 		=  '5e5er6t1y8u8i9asd4-o5o7op8';			//更改会造成整体掉线,16-32位的字符
$_W['Hash'] 		=  md5(md5($_W['Salt']));					//加密形成的明文hash
$_W['QueryCount'] 	=  0;

//=======================================================
define('MEMORY_LIMIT_ON',function_exists('memory_get_usage'));
if(MEMORY_LIMIT_ON) DEBUG && $_W['_StartUseMems'] = memory_get_usage();
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.2.0 !');						//版本信息最低要求 闭包支持要求
if (function_exists('date_default_timezone_set'))	date_default_timezone_set($_W['Timezone']);	//设置时间
ini_set("display_errors",DEBUG_ERROR_REPORT);					//设置错误显示
//===============================================================
function saddslashes($string) {				//防止注入函数
	if (is_array($string)) {
		foreach ($string as $key => $val) {
			$string[$key] = saddslashes($val);
		}
	} else {
		$string = addslashes($string);
	}
	return $string;
}
function shtmlspecialchars($string) {		//XXS函数
	if (is_array($string)) {
		foreach ($string as $key => $val) {
			$string[$key] = shtmlspecialchars($val);
		}
	} else {
		$string = htmlspecialchars(strip_sql($string), ENT_QUOTES);
	}
	return $string;
}
$magic_quote = get_magic_quotes_gpc(); 		//$magic_quote = 0
if (empty($magic_quote)) {
	$_GET 		= saddslashes($_GET);
	$_POST 		= saddslashes($_POST);
	$_COOKIE 	= saddslashes($_COOKIE);
}
$_GET 		= shtmlspecialchars($_GET);
$_POST 		= shtmlspecialchars($_POST);
$_COOKIE 	= shtmlspecialchars($_COOKIE);
//===============================================================
//运算3
if (!isset($_SERVER['REQUEST_URI'])) {
	$_SERVER['REQUEST_URI'] = $_SERVER['PHP_SELF'];
	if (isset($_SERVER['QUERY_STRING']))$_SERVER['REQUEST_URI'] .= '?' . $_SERVER['QUERY_STRING'];
}
if($_SERVER['REQUEST_URI']) {
	$temp = urldecode($_SERVER['REQUEST_URI']);
	if(!(strpos($temp, '<') === FALSE) || !(strpos($temp, '<') === FALSE)) $_GET = shtmlspecialchars($_GET); //XSS
}
