<?php
/**
 *  管理 /T/mem.php   [admin / admin]
 * Memcache 操作类
 * 在config文件中 添加
     相应配置(可扩展为多memcache server)
    define('MEMCACHE_HOST', '10.35.52.33');
    define('MEMCACHE_PORT', 11211);
    define('MEMCACHE_EXPIRATION', 0);
    define('MEMCACHE_PREFIX', 'licai');
    define('MEMCACHE_COMPRESSION', FALSE);
/* Mcache beging */
/*-------------------------------------------------------------------------------

    //格式
    //==================================================================
//class     //class cu中
//params    //class cu中
//time [cutime / timebeg / endtime] //class cu cu log

//code      //方法e
//msg       //方法e
//get       //log中
//post      //log中
//mothod    //方法中
//sign      //方法中
    //==================================================================

------------------------------------------------------------------------------* /
 */

define(SHAMLOGSYSTEM,true);
define(SHAMLOGGET,true);
define(SHAMLOGPOST,true);
define(SHAMLOG,true);


class Logmon{
    protected $errors = array();
    public function __construct()
    {
        $this->CI =& get_instance();                //返回本类的实例 [引用]
    }

    //系统的开发日志
    public function L($code=0,$info='',$loginfo)
    {
        $loginfo['code'] = $code;        //code
        $loginfo['info'] = $info;        //info

        $loginfo= $this->inv($loginfo);     //获取信息
        $this->Write($loginfo);             //写数据
        return true;
    }

    //获取信息
    public function inv($loginfo)
    {
        !empty($_GET)   && $loginfo['_GET']   = $_GET;          //log
        !empty($_POST)  && $loginfo['_POST'] = $_POST;          //log
        $loginfo['time']['timeen']  = Seter::T();      //log
    }

    //保存数据
    public function Write($loginfo)
    {
        $this->CI->S->mdb->insert('dy_log',$loginfo);
        return true;
    }

    //格式
    //==================================================================
    //code
    //msg
    //time
    //input
    //==================================================================


}// END class









