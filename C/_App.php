<?php
defined('IS') or exit();

$_W['_file'][] = __FILE__;

ini_set("display_errors",DEBUG_ERROR_REPORT);				//设置错误显示
//============================================================
define('RHAPP', APP.$_W['c'].'/');
define('RHAPPCACHE', APP.'EasyCache/');	
include EASY.'Fun/AppBase.class.php';	//app基础抽象类

//============================================================
include APP.'EasyConf/Config.inc.php';	//加载主配置文件
include APP.'EasyConf/Fun.inc.php';	
include APP.'App.class.php';			//app抽象类
include APP.'App.CommonAction.php';		//app抽象类
file_exists(RHAPP."Config.inc.php")		&&		include  RHAPP."Config.inc.php";
//===========================================================
//根据用户输入,调用用户需要执行的方法
$control	= $_W['c']; 
$action		= $_W['a'];

//===========================================================
$class = $control;
!class_exists($class) && die('未定义的控制器类' . $class); 
$instance = new $class();
!method_exists($instance, $action) && die('不存在的方法' . $action); 
//=============================================================
$instance->AppModuleRun();
$instance->__IniRun();
$instance->$action();
//=============================================================
?>