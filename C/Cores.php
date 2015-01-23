<?php
//=======================================================
defined('IS') or exit();

$_W['_file'][] 	= __FILE__;
$_W['timestamp']=  microtime(TRUE);
$_W['charset'] 	=  'UTF-8';
$_W['timezone'] =  'Asia/Chongqing';
$_W['clientip'] =  $_SERVER["REMOTE_ADDR"];
$_W['script_name'] =  $_SERVER["SCRIPT_NAME"];
$_W['salt'] 	=  '5561889';			//更改会造成整体掉线

$_WW['____样本'] =  'uid.
    [_isfounder] => 1    //------------------------ 是否站点创建人
    [_uniacid] => 181    //------------------------ 当前统一公号
    [_account] => Array     //--------------------- 当前公号信息
    (
        [_uniacid] => 181
        [_groupid] => -1
        [_name] => 南方经典装饰
        [_description] => 南方经典装饰
    )
    [_role] => founder     //---------------------- 当前用户角色
    [_template] => default    //------------------- 当前公号使用模板
    [_fans] => Array
    (
        [_from_user] =>   //----------------------- 当前粉丝用户
    )
    [_weid] => 181      //------------------------- 兼容 0.5x 的公众号 ID
';


//=======================================================
defined('DEBUG') 			or define('DEBUG',false);
defined('DEBUG_TRACER') 	or define('DEBUG_TRACER',false);
defined('DEBUG_ERROR_REPORT') or define('DEBUG_ERROR_REPORT',false);
defined('FILE_CREATE') 		or define('FILE_CREATE',false);
//=======================================================
define('MEMORY_LIMIT_ON',function_exists('memory_get_usage'));
if(MEMORY_LIMIT_ON) $_W['_StartUseMems'] = memory_get_usage();
define('EASY_VERSION', 	'3.1');
define('__CHAR', 		'UTF-8');						// 定义字符编码

defined('CH') or define('CH', dirname(__FILE__)."\\");	//EASY的路径
define('CF',    CH.'Fun/'); 	
define('CL',    CH.'Lib/'); 
define('CM',   	CH.'Models/');
//===============================================================
include CH.'Fun/Common.inc.php';			//核心函数
include CH.'Models/Curl/Curl.php';		//对 c a 进行初始化
include CH.'Models/View.class.php';
include CH.'Models/Mysql.class.php';
//===============================================================
isset($_GET['c']) && $_W['c'] = $_GET['c'];
isset($_GET['a']) && $_W['a'] = $_GET['a'];
isset($_GET['m']) && $_W['m'] = $_GET['m'];

//===============================================================
//运算1
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.2.0 !');			//  版本信息
define('MAGIC_QUOTES_GPC',True);
if (function_exists('date_default_timezone_set'))	date_default_timezone_set($_W['timezone']);	//设置时间
//===============================================================
//运算2
$magic_quote = get_magic_quotes_gpc(); //$magic_quote = 0
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
	if (isset($_SERVER['QUERY_STRING']))
		$_SERVER['REQUEST_URI'] .= '?' . $_SERVER['QUERY_STRING'];
}
if ($_SERVER['REQUEST_URI']) {
	$temp = urldecode($_SERVER['REQUEST_URI']);
	if (strexists($temp, '<') || strexists($temp, '"')) {
		$_GET = shtmlspecialchars($_GET); //XSS
	}
}
unset($temp);
unset($_REQUEST);		//run之前有执行
//============================================================
if(FILE_CREATE)	include CF.'FileCreate.php';		//创建基础文件
//============================================================
?>