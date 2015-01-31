<?php
define('IS',true);
$_W['_Files'][] = __FILE__;
$_W['verlib'] 	= array('v1','debug');

define('DEBUG',true);
/*影响 _Files */
define('DEBUG_TRACER',true);
/*影响 _StartUseMems------------------------------------------------------------*/
define('DEBUG_ERROR_REPORT',true);		//baocuo
//define('CP','');		//baocuo
//define('CPCACHE','');		//baocuo
//defined('CP') 		or define('CP', dirname(__FILE__)."\\");	//C的路径
//defined('CPCACHE') 	or define('CPCACHE',CP.'Cache/');			//缓存的根路径
/*------------------------------------------------------------*/
define('MP','./');		//defined('CPCACHE') 	or define('CPCACHE',CP.'Cache/');	//mp跟版本号密切相关 这里只定义根路径
define("EASY","./C/");	//定义core目录



require 'API.php';


$easy->run();

echo '<br>test.php';

