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
class Sham_Log{

    protected $errors = array();
    public $logid   = '';
    public $S       = null;
    public $loginfo  = array();

    public function __construct()
    {
        $this->S                = Seter::getInstance();
        $this->logid            = md5(Seter::T().rand(1,999999999));//.rnd();;
        $this->loginfo['logid'] = $this->logid;
        $this->loginfo['time']  = Seter::T();
    }

    /*
     * 系统
     * */
    public function logsys()
    {
        $this->loginfo['env']     = $this->S->env->env;
        $this->loginfo['get']     = $this->S->env->get;
        $this->loginfo['post']    = $this->S->env->post;
        $this->loginfo['cookies'] = $this->S->env->cookies;
    }

    public function loguser($code,$info,$loginfo)
    {
        $this->L($code,$info,$loginfo);        //保存数据
    }

    public function L($code,$info,$loginfo)
    {
        $loginfo['code'] = $code;        //code
        $loginfo['info'] = $info;        //info
        $loginfo['time']['timeen']  = Seter::T();      //log
        $this->S->db->mdb->insert('dy_log',$loginfo);
        return true;
    }


}// END class









