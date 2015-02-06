<?php
namespace Easy;
/*
 *单例模式,构建基础环境类
 * 外部运行示例
 *
 *\Easy\Environment\Environment::registerAutoloader();          //注册自动加载文件
 * */

class Environment implements \ArrayAccess, \Countable, \IteratorAggregate{
    /**
     * 版本
     */
    const VERSION = '2.4.2';
    protected $data = array();
    /**
     * 容器
     */
    //public $container;

    /*
     * 属性   //
     * */
//    protected $properties;
//    /**
//     * @var array[\Slim]
//     */
//    protected static $apps = array();
//
//    /**
//     * @var string
//     */
//    protected $name;


    /*
     * 实例化的对象
     * */
    public static $instance;

    /*
     * 不允许被克隆
     * */
    private function __clone(){}

    public static function getInstance($config = array()){
        !(self::$instance instanceof self)&&self::$instance = new Environment();
        return self::$instance;
    }

    private function __construct(){
        //====================================================
        //do something
        //====================================================
    }

    //==========================================================
    public function all()
    {
        return $this->properties;
    }

    /**
     * Normalize data key
     */
    protected function normalizeKey($key)
    {
        return $key;
    }

    /**
     * Set data key to value
     * @param string $key   The data key
     * @param mixed  $value The data value
     */
    public function set($key, $value)
    {
        $this->data[$this->normalizeKey($key)] = $value;
    }

    /**
     * Get data value with key
     * @param  string $key     The data key
     * @param  mixed  $default The value to return if data key does not exist
     * @return mixed           The data value, or the default value
     */
    public function get($key, $default = null)
    {
        if ($this->has($key)) {
            $isInvokable = is_object($this->data[$this->normalizeKey($key)]) && method_exists($this->data[$this->normalizeKey($key)], '__invoke');
            return $isInvokable ? $this->data[$this->normalizeKey($key)]($this) : $this->data[$this->normalizeKey($key)];
        }
        return $default;
    }

    /**
     * Does this set contain a key?
     * @param  string  $key The data key
     * @return boolean
     */
    public function has($key)
    {
        return array_key_exists($this->normalizeKey($key), $this->data);
    }

    /**
     * Remove value with key from this set
     * @param  string $key The data key
     */
    public function remove($key)
    {
        unset($this->data[$this->normalizeKey($key)]);
    }

    /**
     * Property Overloading
     */
    public function __get($key)
    {
        return $this->get($key);
    }
    public function __set($key, $value)
    {
        $this->set($key, $value);
    }
    public function __isset($key)
    {
        return $this->has($key);
    }
    public function __unset($key)
    {
        return $this->remove($key);
    }

    /**
     * Clear all values
     */
    public function clear()
    {
        $this->data = array();
    }

    /**
     * Array Access
     */
    public function offsetExists($offset)
    {
        return $this->has($offset);
    }

    public function offsetGet($offset)
    {
        return $this->get($offset);
    }

    public function offsetSet($offset, $value)
    {
        $this->set($offset, $value);
    }

    public function offsetUnset($offset)
    {
        $this->remove($offset);
    }

    /**
     * Countable
     */
    public function count()
    {
        return count($this->data);
    }

    /**
     * IteratorAggregate
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->data);
    }

}

$Env = \Easy\Environment::getInstance();





//==========================================================
//示例代码
//$Env['vter1'] = 1;
//$Env['vter2'] = 2;
//echo isset($Env['vter4']);
//unset($Env['vter3']);
//print_r(count($Env));
//foreach($Env as $key => $value) {
//    var_dump($key, $value);
//    echo "\n";
//}
//==========================================================

































//
//// custom handler code
//function myHandler($code, $msg, $file, $line,$error_context)
//{
//    $code_d[2] 	= 'E_WARNING';
//    $code_d[8] 	= 'E_NOTICE';
//    $code_d[256] 	= 'E_USER_ERROR';
//    $code_d[512] 	= 'E_USER_WARNING';
//    $code_d[1024] = 'E_USER_NOTICE';
//    $code_d[4096] = 'E_RECOVERABLE_ERROR';
//    $code_d[8191] = 'E_ALL';
//    //--------------------------------------------------------
//    $htmol_ = print_r($error_context,true);
//    $html = <<<eof
//<!DOCTYPE html>
//<html lang="zh">
//<head>
//<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
//<title>Error</title>
//<style type="text/css">
//::selection{ background-color: #E13300; color: white; }
//::moz-selection{ background-color: #E13300; color: white; }
//::webkit-selection{ background-color: #E13300; color: white; }
//body {	background-color: #fff;	margin: 40px;	font: 13px/20px normal Helvetica, Arial, sans-serif;	color: #4F5155;}
//a {	color: #003399;	background-color: transparent;	font-weight: normal;}
//h1 {	color: #444;	background-color: transparent;	border-bottom: 1px solid #D0D0D0;	font-size: 19px;	font-weight: normal;	margin: 0 0 14px 0;	padding: 14px 15px 10px 15px;}
//code {	font-family: Consolas, Monaco, Courier New, Courier, monospace;	font-size: 12px;	background-color: #f9f9f9;	border: 1px solid #D0D0D0;	color: #002166;	display: block;	margin: 14px 0 14px 0;	padding: 12px 10px 12px 10px;}
//#container {	margin: 10px;	border: 1px solid #D0D0D0;	-webkit-box-shadow: 0 0 8px #D0D0D0;}
//p {	margin: 12px 15px 12px 15px;}
//</style></head><body>	<div id="container">
//<h1>代码 : {$code_d[$code]} </h1>
//<p>错误 : $msg</p>
//<p>文件 : $file - $line 行</p>
//<hr>
//<p>详细</p>
//<p><pre>$htmol_</pre></p>
//</div></body></html>
//eof;
//    echo $html;
//    die();
//}
// generate a notice
//throw new Exception("Value must be 1 or below");
// define custom handler
//set_error_handler('myHandler');
//
//
//echo vers();

/**
 * 系统函数gzdecode
 *
 * @param unknown_type $data
 * @return unknown
 */
//if (!function_exists('gzdecode')) {
//    function gzdecode ($data) {
//        $flags = ord(substr($data, 3, 1));
//        $headerlen = 10;
//        $extralen = 0;
//        $filenamelen = 0;
//        if ($flags & 4) {
//            $extralen = unpack('v' ,substr($data, 10, 2));
//            $extralen = $extralen[1];
//            $headerlen += 2 + $extralen;
//        }
//        if ($flags & 8) // Filename
//            $headerlen = strpos($data, chr(0), $headerlen) + 1;
//        if ($flags & 16) // Comment
//            $headerlen = strpos($data, chr(0), $headerlen) + 1;
//        if ($flags & 2) // CRC at end of file
//            $headerlen += 2;
//        $unpacked = @gzinflate(substr($data, $headerlen));
//        if ($unpacked === FALSE)
//            $unpacked = $data;
//        return $unpacked;
//    }
//}


////---------------------------------------------------
////全局配置核心加载
//class Config{
//    public static $config = array();                //定义各项参数
//    public static $config_file_load = array();      //定义自动加载文件的路径
//    public static $config_map_autoload = array();   //定义不规则自动加载的文件映射
//}
//
//Config::$config_file_load[] = __FILE__;
////---------------------------------------------------
////自动类文件
//function __autoload($classname) {
////	if (isset(Config::$config_map_autoload[$classname])) {
////        require_once Config::$config_map_autoload[$classname];
////    }else{
//    require_once $classname.'.class.php';
////    }
//}
//---------------------------------------------------

