<?php

//kint 调试
//require_once('kint-0.9/Kint.class.php');
//Kint::dump($GLOBALS, $_SERVER);


//testXdebug();
//function testXdebug() {
//    requireFile();
//}
//function requireFile() {
//    require_once('abc.php');
//}
//
///**
// * Simple function to replicate PHP 5 behaviour
// */
//function microtime_float()
//{
//    list($usec, $sec) = explode(" ", microtime());
//    return ((float)$usec + (float)$sec);
//}
//$time_start = microtime_float();
//// Sleep for a while
//usleep(100);
//$time_end = microtime_float();
//$time = $time_end - $time_start;
//echo "Did nothing in $time seconds\n";
//
phpinfo();
//
//if (file_exists('test.xml'))
//{
//    $xml = simplexml_load_file('test.xml');
//    var_dump($xml);
//}else
//{
//    exit('Error.');
//}
//echo $xml->to;
//exit;

class Apc{
    /**
        * Apc缓存-设置缓存
        * 设置缓存key，value和缓存时间
        * @param  string $key   KEY值
        * @param  string $value 值
        * @param  string $time  缓存时间
        */// 脚本学堂 http://www.jbxue.com
    public function set_cache($key, $value, $time = 0) {
        if ($time == 0) $time = null; //null情况下永久缓存
        return apc_store($key, $value, $time);;
    }

    /**
     * Apc缓存-获取缓存
     * 通过KEY获取缓存数据
     * @param  string $key   KEY值
     */
    public function get_cache($key) {
        return apc_fetch($key);
    }
    /**
     * Apc缓存-清除一个缓存
     * 从memcache中删除一条缓存
     * @param  string $key   KEY值
     */
    public function clear($key) {
        return apc_delete($key);
    }
    /**
     * Apc缓存-清空所有缓存
     * 不建议使用该功能
     * @return
     */
    public function clear_all() {
        apc_clear_cache('user'); //清除用户缓存
        return apc_clear_cache(); //清楚缓存
    }
    /**
     * 检查APC缓存是否存在
     * @param  string $key   KEY值
     */
    public function exists($key) {
        return apc_exists($key);
    }
    /**
     * 字段自增-用于记数
     * @param string $key  KEY值
     * @param int    $step 新增的step值
     */
    public function inc($key, $step) {
        return apc_inc($key, (int) $step);
    }
    /**
     * 字段自减-用于记数
     * @param string $key  KEY值
     * @param int    $step 新增的step值
     */
    public function dec($key, $step) {
        return apc_dec($key, (int) $step);
    }
    /**
     * 返回APC缓存信息
     */
    public function info() {
        return apc_cache_info();
    }
}


//$s = $a->info();

//=================================================
//示例代码
$a = new Apc();
if ($quote = $a->get_cache('starwars')) {
    echo $quote;
    echo " [cached]";
} else {
    $quote = "Do, or do not. There is no try. -- Yoda, Star Wars";
    echo $quote;
    $a->set_cache('starwars', $quote, 5);
}
//示例代码
//=================================================


//
//require 'Easy/Easy.php';
//\Easy\Easy::registerAutoloader();
//$app = new \Easy\Easy();
//
//
//
//
//$app->run();






