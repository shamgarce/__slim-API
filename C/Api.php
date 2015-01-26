<?php
defined('IS') or exit();
DEBUG_TRACER && $_W['_Files'][] 		= __FILE__;

require 'Config.C.php';
require '../C/Fun/Common.inc.php';

/*
监测数据是否合法，不合法，退出；
*/
class ApiBase {

	private static $_args	= array();		//原数据 
	
	private static $ver 	= '' ; 		//版本
	private static $instance= '' ; 		//实例
	private static $action 	= '' ; 		//方法
	private static $args	= array(); 	//参数
	
	private static $code	= 0; 
	private static $msg	= ''; 
	private static $data	= array(); 
	
	private static $mpath	= ''; 			//处理类路径
	
	/***********************************************************************************************
	* 函数名 : RUN
	* 函数功能描述 : 	//主程序入口入口 经过slim路由之后，到这个程序进行逻辑运算，本地路由，最后根据$_W输出json数据
	* 函数参数 : $args 格式 $args['v'] / $args['instance'] / $args['action'] / $args['args'] 分别是 版本 模块 方法 参数
	* 函数返回值 : 最终output函数根据$_W值输出json
	* Cr by : shampeak
	***********************************************************************************************/
	static function run($args){
		global $_W;

		$_W['_args'] 	= $args;			//源数据 -各项参数
		$_W['_args']['v'] == 'debug' &&	$_W['_args']['debug'] = 1;
		//---------------------------------------------------------
		//检查版本是否正确
		if(in_array($_W['_args']['v'],$_W['verlib'])){			//判断合法的版本号
			$_W['_args']['debug'] == 1 && $_W['_args']['v'] ==  $_W['verlib'][0];
		}else{
			$_W['json']['code'] = -555;
			$_W['json']['msg'] = '错误的版本号';
		}
		//---------------------------------------------------------
		if($_W['json']['code'] != -555 && !$_W['_args']['debug']) self::fileini($_W['_args']);					//判断文件是否存在，并且初始化
			
		include MP.$_W['_args']['v'].'/EasyConf/Config.inc.php';	//加载主配置文件
		include MP.$_W['_args']['v'].'/EasyConf/Fun.inc.php';	//加载主配置文件
		include MP.$_W['_args']['v'].'/M.php';	//加载主配置文件
		
		$instanceconfig = MP.$_W['_args']['v'].'/'.$_W['_args']['instance']."/Config.inc.php";
		file_exists($instanceconfig)	&&	include  $instanceconfig;
		$instancefile = MP.$_W['_args']['v'].'/'.$_W['_args']['instance']."/".$_W['_args']['instance'].".class.php";
		if(!file_exists($instancefile)) die('err');;
		include  $instancefile;
		
		$class = $_W['_args']['instance'];
		$action =$_W['_args']['action'];

		//===========================================================
		!class_exists($class) && die("class $class not fond"); 

		$instance = new $class($_W);
		$instance->$action();
		$instance->jsonout();
	}
	
	static function fileini($_args){
		$instancefile = MP.$_args['v'].'/'.$_args['instance'].'/'.$_args['instance'].'.class.php';
		$dir = MP.$_args['v'].'/'.$_args['instance'].'/';
		!is_dir($dir) && mkdir($dir);
		if(!file_exists($instancefile)){		//	文件是否存在,不存在,.创建
			$instance 	= $_args['instance'];
			$action 	= $_args['action'];
			$txt  = "<?php
defined('IS') or exit();
class $instance extends Api{
public function $action(){global \$_W;\$this->JSON = \$_W['json'];}
}
";
			Fs($instancefile,$txt);
		}
		//===================================
	}
}
