<?php
DEBUG_TRACER && $_W['_Files'][] 		= __FILE__;

defined('MBASE') 		or define('MBASE', dirname(__FILE__)."\\");	//m的路径


//---------------------------------------------------
//定义系统include_path
//---------------------------------------------------
//define('INCLUDE_PATH',dirname(__FILE__)."\\Easylib\\");
define('INCLUDE_PATH','E:\www\slim-API\public_html\v1\Easylib');
set_include_path(INCLUDE_PATH.';'.get_include_path());      //设置include_path

//---------------------------------------------------
//自动加载类文件  //静态方法 --自动加载类文件
//---------------------------------------------------
class LOAD
{
    static function loadClass($classname)
    {
        require_once $classname.'.class.php';
    }
}
spl_autoload_register(array('LOAD', 'loadClass'));

include 'Api.class.php';			//app抽象类



