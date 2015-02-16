<?php
DEBUG_TRACER && $_W['_Files'][] 		= __FILE__;


//$_W['_file'][] = __FILE__ .'	配置		by APP [加载 无执行] ';
////$denyc = array('__construct','__ini','getdb','__Pagecheck','__Pagecache','assign','display','isCached','fetch','meth');
////框架层去除的方法		不分配权限,全部deny
////======================================================
////数据库配置
////调用				print_r($_W['pdo']['system']);
////======================================================
//global $_W;
//$_W['pdo']['system'] = array(
//	'HOST'		=> '127.0.0.1:3306',//mysql主机 
//	'USER'		=> 'root',			//mysql用户 
//	'PWD'		=> '123',			//mysql密码 
//	'NAME'		=> 'ns',		//使用的数据库 
//	'CHAR'		=> 'utf8',			//字符集
//	'pconnect'		=> 0,			//还没有启用
//	'tablepre'		=> 'mspre_',	//还没有启用
//);
//
//---------------------------------------------------------
//DIN('_denyc',$denyc);						//对c的拒绝
//echo 'config';