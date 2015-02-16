<?php
define('___KV', dirname(__FILE__).'/');	//配置程序,加载拒绝数组和系统拒绝参数
!defined('KV_PATH') && define('KV_PATH', ___KV.'Kv');		//临时存储文件路径
require(dirname(__FILE__) . '/Kvt.class.php');
require(dirname(__FILE__) . '/Kv.class.php');
$kv = new Kv();

if($kv->isvk('m.r')){
echo 'o.'.$kv->get('m.r');
}else{
echo 'o.';
$kv->set('m.r',123,3);
}
/*
最后实现的功能
1 : kv->set(ak,value,3600);
2 : kv->get(ak);


*/



//

?>