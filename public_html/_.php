<?php



/*缓存
数据缓存

这里所说的数据缓存是指数据库查询缓存，每次访问页面的时候,都会先检测相应的缓存数据是否存在，如果不存在，就连接数据库，得到数据，并把查询结 果序列化后保存到文件
中，以后同样的查询结果就直接从缓存文件中获得。


页面缓存

每次访问页面的时候，都会先检测相应的缓存页面文件是否存在，如果不存在，就连接数据库，得到数据，显示页面并同时生成缓存页面文件，这样下次访问 的时候页面文件就发挥作用了。(模板引擎和网上常见的一些缓存类通常有此功能)


内存缓存

Memcached是高性能的，分布式的内存对象缓存系统，用于在动态应用中减少数据库负载，提升访问速度。
dbcached 是一款基于 Memcached 和 NMDB 的分布式 key-value 数据库内存缓存系统。

以上的缓存技术虽然能很好的解决频繁查询数据库的问题，但其缺点在在于数据无时效性，下面我给出我在项目中常用的方法：


时间触发缓存

检查文件是否存在并且时间戳小于设置的过期时间,如果文件修改的时间戳比当前时间戳减去过期时间戳大，那么就用缓存，否则更新缓存。
设定时间内不去判断数据是否要更新，过了设定时间再更新缓存。以上只适合对时效性要求不高的情况下使用，否则请看下面。


内容触发缓存

当插入数据或更新数据时，强制更新缓存。

在这里我们可以看到，当有大量数据频繁需要更新时，最后都要涉及磁盘读写操作。怎么解决呢？我在日常项目中，通常并不缓存所有内容，而是缓存一部分 不经常变的内容来解决。但在大负荷的情况下，最好要用共享内存做缓存系统。

到这里PHP缓存也许有点解决方案了，但其缺点是，因为每次请求仍然要经过PHP解析，在大负荷的情况下效率问题还是比效严重，在这种情况下，也许 会用到静态缓存。


静态缓存

这里所说的静态缓存是指HTML缓存，HTML缓存一般是无需判断数据是否要更新的，因为通常在使用HTML的场合一般是不经常变动内容的页面。数 据更新的时候把HTML也强制更新一下就可以了















//              ""、0、"0"、NULL、FALSE、array()、var $var;
//
//phpinfo();
//$arr = ["key" => "value", "key2" => "value2"];
//print_r($arr);












//$mems->set('keys2','40',1500);				//设置




















//=============================================
//$mems->get('keys2');						//获取
//$mems->set('keys2','40',1500);				//设置
//$mems->add('keys2','4--03235',1500);		//新增[已经有了会出错,还没有的就正常]
//$mems->replace('keys2','4--03235',1500);	//替换
//$mems->inc('keys2',1);						//数值 +1
//$mems->des('keys2',2);						//数值 -1
//$mems->del('keys');							//删除
//$mems->clear();								//清除所有
//$mems->close();								//关闭



exit;


$ms =  array();

if($ms){
    echo 'something';
}else{
    echo 'two';
}

exit;






















/*
 * 弃用的Register Globals
 *php.ini 中的一个选项(register_globals)
 * Magic Quotes
 * magic_quotes_gpc
 *
类型约束
通过类型约束可以限制参数的类型，不过这一机制并不完善，目前仅适用于类和 callable(可执行类型) 以及 array(数组), 不适用于 string 和 int.

// 限制第一个参数为 MyClass, 第二个参数为可执行类型，第三个参数为数组
function MyFunction(MyClass $a, callable $b, array $c)
{
    // ...
}
 *
 *
 * magic_quotes_gpc 5.3被弃用
 * Safe Mode 弃用
 * /
//重要的代码标注
闭包
$func = function($arg)
{
    print $arg;
};
$func("Hello World");

匿名函数还可以用 use 关键字来捕捉外部变量：
function arrayPlus($array, $num)
{
    array_walk($array, function(&$v) use($num){
        $v += $num;
    });
}
魔术方法：__invoke(), __callStatic()

后期静态绑定
static::funcXXOO();

1 : 三元操作符
$b=(a>c)?a:c;


//======================================================================
PHP 5.4
//写成
    echo $a ? $a : "No Value";
可简写成
    echo $a ?: "No Value";


//======================================================================
PHP 5.4
// 原来的数组写法
$arr = array("key" => "value", "key2" => "value2");
// 简写形式
$arr = ["key" => "value", "key2" => "value2"];


//======================================================================
PHP 5.4
// Traits不能被单独实例化，只能被类所包含
trait SayWorld
{
    public function sayHello()
    {
        echo 'World!';
    }
}
class MyHelloWorld
{
    // 将SayWorld中的成员包含进来
    use SayWorld;
}
$xxoo = new MyHelloWorld();
// sayHello() 函数是来自 SayWorld 构件的
$xxoo->sayHello();

//======================================================================

在这里集中讲一下有关 PHP 起止标签的问题。即：
< ?php
// Code...
? >
复制代码
通常就是上面的形式，除此之外还有一种简写形式：
< ? /* Code... * / ? >
复制代码
还可以把
< ?php echo $xxoo; ? >
复制代码
简写成：
< ?= $xxoo;? >

对于纯 PHP 文件(如类实现文件), PHP 官方建议顶格写起始标记，同时 省略 结束标记。
这样可以确保整个 PHP 文件都是 PHP 代码，没有任何输出，否则当你包含该文件后，设置 Header 和 Cookie 时会遇到一些麻烦 [注].
注：Header 和 Cookie 必须在输出任何内容之前被发送。

内置 Web 服务器
PHP从5.4开始内置一个轻量级的Web服务器，不支持并发，定位是用于开发和调试环境。
在开发环境使用它的确非常方便。
    php -S localhost:8000
复制代码
这样就在当前目录建立起了一个Web服务器，你可以通过 http://localhost:8000/ 来访问。
其中localhost是监听的ip，8000是监听的端口，可以自行修改。
很多应用中，都会进行URL重写，所以PHP提供了一个设置路由脚本的功能:
    php -S localhost:8000 index.php
复制代码
这样一来，所有的请求都会由index.php来处理。
*/









function ver(){
    return true;
}




if($i=ver()){
    echo 'ok';
}else{
    echo 'false';
}

exit;









/**
 * Memcache 操作类
 *
 * 在config文件中 添加
相应配置(可扩展为多memcache server)
define('MEMCACHE_HOST', '10.35.52.33');
define('MEMCACHE_PORT', 11211);
define('MEMCACHE_EXPIRATION', 0);
define('MEMCACHE_PREFIX', 'licai');
define('MEMCACHE_COMPRESSION', FALSE);
demo:
$cacheObj = new framework_base_memcached();
$cacheObj -> set('keyName','this is value');
$cacheObj -> get('keyName');
exit;
 * @access  public
 * @return  object
 * @date    2012-07-02
 */

define('MEMCACHE_HOST', '10.35.52.33');
define('MEMCACHE_PORT', 11211);
define('MEMCACHE_EXPIRATION', 0);
define('MEMCACHE_PREFIX', 'licai');
define('MEMCACHE_COMPRESSION', FALSE);

class framework_base_memcached{


    private $local_cache = array();
    private $m;
    private $client_type;
    protected $errors = array();


    public function __construct()
    {
        $this->client_type = class_exists('Memcache') ? "Memcache" : (class_exists('Memcached') ? "Memcached" : FALSE);

        if($this->client_type)
        {
            // 判断引入类型
            switch($this->client_type)
            {
                case 'Memcached':
                    $this->m = new Memcached();
                    break;
                case 'Memcache':
                    $this->m = new Memcache();
                    // if (auto_compress_tresh){
                    // $this->setcompressthreshold(auto_compress_tresh, auto_compress_savings);
                    // }
                    break;
            }
            $this->auto_connect();
        }
        else
        {
            echo 'ERROR: Failed to load Memcached or Memcache Class (∩_∩)';
            exit;
        }
    }

    /**
     * @Name: auto_connect
     * @param:none
     * @todu 连接memcache server
     * @return : none
     * add by cheng.yafei
     **/
    private function auto_connect()
    {
        $configServer = array(
            'host' => MEMCACHE_HOST,
            'port' => MEMCACHE_PORT,
            'weight' => 1,
        );
        if(!$this->add_server($configServer)){
            echo 'ERROR: Could not connect to the server named '.MEMCACHE_HOST;
        }else{
            //echo 'SUCCESS:Successfully connect to the server named '.MEMCACHE_HOST;
        }
    }

    /**
     * @Name: add_server
     * @param:none
     * @todu 连接memcache server
     * @return : TRUE or FALSE
     * add by cheng.yafei
     **/
    public function add_server($server){
        extract($server);
        return $this->m->addServer($host, $port, $weight);
    }

    /**
     * @Name: add_server
     * @todu 添加
     * @param:$key key
     * @param:$value 值
     * @param:$expiration 过期时间
     * @return : TRUE or FALSE
     * add by cheng.yafei
     **/
    public function add($key = NULL, $value = NULL, $expiration = 0)
    {
        if(is_null($expiration)){
            $expiration = MEMCACHE_EXPIRATION;
        }
        if(is_array($key))
        {
            foreach($key as $multi){
                if(!isset($multi['expiration']) || $multi['expiration'] == ''){
                    $multi['expiration'] = MEMCACHE_EXPIRATION;
                }
                $this->add($this->key_name($multi['key']), $multi['value'], $multi['expiration']);
            }
        }else{
            $this->local_cache[$this->key_name($key)] = $value;
            switch($this->client_type){
                case 'Memcache':
                    $add_status = $this->m->add($this->key_name($key), $value, MEMCACHE_COMPRESSION, $expiration);
                    break;

                default:
                case 'Memcached':
                    $add_status = $this->m->add($this->key_name($key), $value, $expiration);
                    break;
            }

            return $add_status;
        }
    }

    /**
     * @Name   与add类似,但服务器有此键值时仍可写入替换
     * @param  $key //key
     * @param  $value //值
     * @param  $expiration  //过期时间
     * @return TRUE or FALSE
     * add by cheng.yafei
     **/
    public function set($key = NULL, $value = NULL, $expiration = NULL)
    {
        if(is_null($expiration)){
            $expiration = MEMCACHE_EXPIRATION;
        }
        if(is_array($key))
        {
            foreach($key as $multi){
                if(!isset($multi['expiration']) || $multi['expiration'] == ''){
                    $multi['expiration'] = $this->config['config']['expiration'];
                }
                $this->set($this->key_name($multi['key']), $multi['value'], $multi['expiration']);
            }
        }else{
            $this->local_cache[$this->key_name($key)] = $value;
            switch($this->client_type){
                case 'Memcache':
                    $add_status = $this->m->set($this->key_name($key), $value, MEMCACHE_COMPRESSION, $expiration);
                    break;
                case 'Memcached':
                    $add_status = $this->m->set($this->key_name($key), $value, $expiration);
                    break;
            }
            return $add_status;
        }
    }

    /**
     * @Name   get 根据键名获取值
     * @param  $key key
     * @return array OR json object OR string...
     * add by cheng.yafei
     **/
    public function get($key = NULL)
    {
        if($this->m)
        {
            if(isset($this->local_cache[$this->key_name($key)]))
            {
                return $this->local_cache[$this->key_name($key)];
            }
            if(is_null($key)){
                $this->errors[] = 'The key value cannot be NULL';
                return FALSE;
            }

            if(is_array($key)){
                foreach($key as $n=>$k){
                    $key[$n] = $this->key_name($k);
                }
                return $this->m->getMulti($key);
            }else{
                return $this->m->get($this->key_name($key));
            }
        }else{
            return FALSE;
        }
    }

    /**
     * @Name   delete
     * @param  $key //key
     * @param  $expiration //服务端等待删除该元素的总时间
     * @return true OR false
     * add by cheng.yafei
     **/
    public function delete($key, $expiration = NULL)
    {
        if(is_null($key))
        {
            $this->errors[] = 'The key value cannot be NULL';
            return FALSE;
        }

        if(is_null($expiration))
        {
            $expiration = MEMCACHE_EXPIRATION;
        }

        if(is_array($key))
        {
            foreach($key as $multi)
            {
                $this->delete($multi, $expiration);
            }
        }
        else
        {
            unset($this->local_cache[$this->key_name($key)]);
            return $this->m->delete($this->key_name($key), $expiration);
        }
    }

    /**
     * @Name   replace
     * @param  $key //要替换的key
     * @param  $value //要替换的value
     * @param  $expiration //到期时间
     * @return //none
     * add by cheng.yafei
     **/
    public function replace($key = NULL, $value = NULL, $expiration = NULL)
    {
        if(is_null($expiration)){
            $expiration = MEMCACHE_EXPIRATION;
        }
        if(is_array($key)){
            foreach($key as $multi) {
                if(!isset($multi['expiration']) || $multi['expiration'] == ''){
                    $multi['expiration'] = $this->config['config']['expiration'];
                }
                $this->replace($multi['key'], $multi['value'], $multi['expiration']);
            }
        }else{
            $this->local_cache[$this->key_name($key)] = $value;

            switch($this->client_type){
                case 'Memcache':
                    $replace_status = $this->m->replace($this->key_name($key), $value, MEMCACHE_COMPRESSION, $expiration);
                    break;
                case 'Memcached':
                    $replace_status = $this->m->replace($this->key_name($key), $value, $expiration);
                    break;
            }

            return $replace_status;
        }
    }

    /**
     * @Name   replace 清空所有缓存
     * @return none
     * add by cheng.yafei
     **/
    public function flush()
    {
        return $this->m->flush();
    }

    /**
     * @Name   获取服务器池中所有服务器的版本信息
     **/
    public function getversion()
    {
        return $this->m->getVersion();
    }


    /**
     * @Name   获取服务器池的统计信息
     **/
    public function getstats($type="items")
    {
        switch($this->client_type)
        {
            case 'Memcache':
                $stats = $this->m->getStats($type);
                break;

            default:
            case 'Memcached':
                $stats = $this->m->getStats();
                break;
        }
        return $stats;
    }

    /**
     * @Name: 开启大值自动压缩
     * @param:$tresh 控制多大值进行自动压缩的阈值。
     * @param:$savings 指定经过压缩实际存储的值的压缩率，值必须在0和1之间。默认值0.2表示20%压缩率。
     * @return : true OR false
     * add by cheng.yafei
     **/
    public function setcompressthreshold($tresh, $savings=0.2)
    {
        switch($this->client_type)
        {
            case 'Memcache':
                $setcompressthreshold_status = $this->m->setCompressThreshold($tresh, $savings=0.2);
                break;

            default:
                $setcompressthreshold_status = TRUE;
                break;
        }
        return $setcompressthreshold_status;
    }

    /**
     * @Name: 生成md5加密后的唯一键值
     * @param:$key key
     * @return : md5 string
     * add by cheng.yafei
     **/
    private function key_name($key)
    {
        return md5(strtolower(MEMCACHE_PREFIX.$key));
    }

    /**
     * @Name: 向已存在元素后追加数据
     * @param:$key key
     * @param:$value value
     * @return : true OR false
     * add by cheng.yafei
     **/
    public function append($key = NULL, $value = NULL)
    {


//      if(is_array($key))
//      {
//          foreach($key as $multi)
//          {
//
//              $this->append($multi['key'], $multi['value']);
//          }
//      }
//      else
//      {
        $this->local_cache[$this->key_name($key)] = $value;

        switch($this->client_type)
        {
            case 'Memcache':
                $append_status = $this->m->append($this->key_name($key), $value);
                break;

            default:
            case 'Memcached':
                $append_status = $this->m->append($this->key_name($key), $value);
                break;
        }

        return $append_status;
//      }
    }//END append


}// END class






phpinfo();





exit;
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
