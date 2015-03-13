<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Enter
{
    private $tmp = array();
    private $params = array();
    private $CI = null;
    private $de = array();
    private $log = array();
//log格式
//==================================================================
//class
//aa
//code
//msg
//time [cutime / timebeg / endtime]
//get
//post
//sign
//params
    public function __construct($params)    //$params 是路由参数
    {
        $this->CI =& get_instance();
        $this->vdb = new V1db();                    //数据逻辑层
        $this->params = $params;                    //路由参数
        $this->tmp['timestamp_'] = Set::T();        //$sign //参数是签名
        //======================================================================
        !empty($params) && $this->log['params']    = $params;              //log
        $this->log['time']['timecu'] = time();;        //log
        $this->log['time']['timebe'] = $this->tmp['timestamp_'];        //log
        $this->log['class']     = __class__;        //log
        //======================================================================
        //print_r($this->log);
    }

    /*
     * 1 : 接口   /   注册用户    //接口 [adduser]
     * 输入
     * {
       "username":"ASDASDFASDF",
       "password":"wangjun1"
       }
    返回
    {
    "code":"200",
    "msg":"succeed",
    }
    */
    public function adduser($sign = array())
    {
        !empty($sign) && $this->log['sign']    = $sign;        //方法中截取
        $this->log['mothod']    = __METHOD__;        //方法中截取

        /*
         * 1 : 用户名是否已经存在
         * 2 : 长度
         * */
        $username = $this->CI->input->post('username');
        $password = $this->CI->input->post('password');
        //====================================================
        $_march = '/[^A-Za-z0-9]/';             //如果发现字母数字意外的字符 报错
        if(preg_match($_march, $username)) {
            $this->J(-200, '用户名非法，请重新输入正确的用户名');
        }
        if(preg_match($_march, $password)) {
            $this->J(-200, '密码非法，请重新输入正确的密码');
        }
        $ulen = strlen($username);
        $upwd = strlen($password);
        if($ulen<4 || $ulen >16){
            $this->J(-200, '用户名长度非法');
        }
        if($upwd<4){
            $this->J(-200, '密码长度非法');
        }

        $se['user_login'] = $username;
        $row= $this->mdb->findOne("dy_user", $se);


        if($row){
            $this->J(-200, '该用户已经存在');
        }

        //===============================================================
        //添加用户操作
        $mc['user_login']   = $username;
        //$mc['user_password']= MD5($password.$sign['salt']);
        $mc['user_password']= $password;
        $mc['open_id']      = substr(MD5($username.'_'.$sign['salt'].'_'.Set::T()),8,16);                //计算生成一个  唯一
        $mc['enable']       = 1;
        $mc['f_regtime']    = time();

        $this->mdb->insert('dy_user',array_merge(V1db::table_dy_user(), $mc));               //添加数据
        $this->J(200, 'succeed');
    }

    /*
        *  罚单app登录 [login]
    模块 :登录模块
    说明 :本接口能够实现登录功能
    参数 :"username":用户名，"password":密码
    成功 :登陆成功"code"的返回值为"200"
    失败 :返回值待定     *
         *
    提交 :
    {
    "username":"zhangbo",
    "password":"zhangbo"
    }
    返回 :
    {
    "code":"200",
    "msg":"succeed",
    }     *
    * */
    public function login($sign = array())
    {
        !empty($sign) && $this->log['sign']    = $sign;        //方法中截取
        $this->log['mothod']    = __METHOD__;        //方法中截取

        $username = $this->CI->input->post('username');
        $password = $this->CI->input->post('password');

        $_march = '/[^A-Za-z0-9]/';             //如果发现字母数字意外的字符 报错
        if(preg_match($_march, $username)) {
            $this->J(-200, '用户名非法，请重新输入正确的用户名');
        }


        //$sql = "select * from dy_user where user_login = '$username'";
        //$row = $this->CI->db->getrow($sql);

        $se['user_login'] = $username;
        $row= $this->mdb->findOne("dy_user", $se);

        if(empty($row)){
            $this->J(-200, '该用户不存在');
        }
        if($row['enable'] ==0){
            $this->J(-200, '不是有效用户');
        }
//        if($row['user_password'] != MD5($password.$sign['salt'])){
//            $this->J(-200, '密码错误');
//        }
        if($row['user_password'] != $password){
            $this->J(-200, '密码错误');
        }

        //================================================================
        //$mc['f_logintime'] = $this->CI->T();

        $row['f_logintime'] = time();
        $row['f_loginip'] = '123';

        //变更数据
       $this->mdb->update("dy_user", $se,$row);

        $this->J(200, 'succeed');
    }


    /*
     * 接口 : 上传抽样单    [enter/uploading]
     * 录入模块中的上传模块，将抽样单中的所有信息通过json串上传，
     * 上传成功后code返回200，上传失败返回505。
     * 提交 数据
     *返回    { "code":"200","msg":"succeed","data":{"name":"name"}}
     * */
    public function uploading($sign = array())
    {
        !empty($sign) && $this->log['sign']    = $sign;        //方法中截取
        $this->log['mothod']    = __METHOD__;        //方法中截取

        $phaForm = $_POST['phaForm']['pharmaceuticalForm'];
        $phaForm = json_decode($phaForm);

        $phaForm['SampleFormNumber'] = (int)($phaForm['SampleFormNumber']);

       // print_r($phaForm);

        $odd_id = $phaForm['SampleFormNumber'];

        //首先检查抽样id的合法性
        //============================================================
        $cond['odd_id'] = $odd_id;
        $this->get($phaForm);
        $row = $this->mdb->findOne("dy_typeoddid",$cond);
        if(empty($row)){
            $this->J(-201, '无效的预定单号');
        }

        if($row['used'] ==0){
            $this->J(-202, '非有效');
        }
        if($row['up'] ==1){
            $this->J(-203, '过期的单号');
        }

        //============================================================
        $simpleConditionList    =$phaForm['sampleCondition']['sampleConditionList'];
        $simpleDepartmentList   =$phaForm['sampleDepartment']['sampleDepartmentList'];

        unset($phaForm['sampleCondition']['sampleConditionList']);
        unset($phaForm['sampleDepartment']['sampleDepartmentList']);

        $this->mdb->insert('dy_SampleForm',$phaForm);        //主记录

        foreach($simpleConditionList as $key=>$value){
            unset($me);
            $me['odd_id'] = $odd_id;
            $me = array_merge($me,$value);
            $this->mdb->insert('dy_SampleCondition',$me);
        }

        foreach($simpleDepartmentList as $key=>$value){
            unset($me);
            $me['odd_id'] = $odd_id;
            $me = array_merge($me,$value);
            $this->mdb->insert('dy_SampleDepartment',$me);
        }

        //上传完毕,更改状态
       // print_r($row);
//        $this->mdb->update("test_table", array("id"=>1),array("id"=>1,"title"=>"bbb"));
        $row['up'] =1;
        $this->mdb->update("dy_typeoddid", array("odd_id"=>$row['odd_id']),$row);

        $this->J(200, 'succeed');
    }

    /*
     *  上传预定 [enter/book/]
     *  模块 : 抽样单号管理
        说明 : 本接口为上传预定的接口;
        参数 : 为要预定的抽样单号的数量;
        成功 : code返回200并且在data数组中返回所预定的抽样单号号码
        失败 : 预定失败则返回506.
     * ========================================================
     * 输入
     *{
        "count":2
        }
     * ========================================================
     * 输出
     * {
        "code":"200",
        "msg":"succeed",
        "data":["1222121","3543434"]
        }
     */
    public function book($sign = array())
    {
        !empty($sign) && $this->log['sign']    = $sign;        //方法中截取
        $this->log['mothod']    = __METHOD__;        //方法中截取

        $count = intval($_POST['count']);
        $mc= array();

        $rc = $this->mdb->find("dy_typeoddid", array(),array("sort"=>array("odd_id"=>-1),"limit"=>1));
        $max = $rc[0]['odd_id'];
        //最大的

        // ========================================================
        $nd = $this->mdb->find("dy_typeoddid", array("enable"=>1,"up"=>0,"used"=>0),array("sort"=>array("odd_id"=>1),"limit"=>$count));
        $j = 0;
        $nw = array();
        foreach($nd as $key=>$value){
            if($j<$count){
                $nw[] = $value['odd_id'];
                $me = $value;
                $me['openid']   = $sign['openid'];
                $me['used']     = 1;
                $me['up']       = 0;
                $this->mdb->update("dy_typeoddid", array("odd_id"=>$value['odd_id']),$me);
            }
            $j++;
        }
//        // ========================================================
        //新的单号
        for($i=0;$i<$count-$j;$i++){
            $nw[]   =  $max+$i+1;
//            $md['type_id']  = 1;
            $md['odd_id']   = $max+$i+1;
            $md['openid']   = $sign['openid'];
            $md['used']     = 1;
            $md['up']       = 0;
            $md['enable']   = 1 ;
//            $this->CI->db->autoexecute('dy_typeoddid',$md,'INSERT');
            $this->mdb->insert('dy_typeoddid',array_merge(V1db::table_dy_typeoddid(), $md));
        }

//        //占用,而且没上传的单号
//        $sql = "SELECT odd_id FROM `dy_typeoddid` where used = 1 and up=0";
//        $dt = $this->CI->db->getcol($sql);
        //echo $sign['openid'];

        $rc = $this->mdb->find("dy_typeoddid", array("enable"=>1,"up"=>0,"used"=>1,"openid"=>"{$sign['openid']}"));
        foreach($rc as $key=>$value){
            $dt[] = $value["odd_id"];
        }



//print_r($dt);
        $dt = array_diff($dt,$nw);
        $dt = array_values($dt);
        $this->data($nw);
        $this->data2($dt);
        $this->J(200, 'succeed');
    }

    /*
    *  返回本地剩余的抽样单号 [enter/chexiao]
     *
       模块 :录入
       说明 :录入模块中的撤销功能，此功能会把手机端数据库中没有用过的抽样单号返回给数据库。
       参数 :SimpleNumber
       成功 :"code"的值为200
       失败 :“code”的值为507
     * 提交 :
       {
           "SimpleNumber":[]
       }
     * 返回 :
       {
       "code":"200",
       "data":[],
       "msg":"succeed"
       }
     */
    public function chexiao($sign = array())
    {
        !empty($sign) && $this->log['sign']    = $sign;        //方法中截取
        $this->log['mothod']    = __METHOD__;        //方法中截取

        $SimpleNumber = $_POST['SimpleNumber'];
        $SimpleNumber = json_decode($SimpleNumber);
        $this->get($SimpleNumber);
        //============================================================
        if(empty($SimpleNumber))$SimpleNumber = array();
        foreach($SimpleNumber as $value){
            $row = $this->mdb->findone("dy_typeoddid", array("odd_id"=>intval($value)));
            $row['used'] = 0;
            $this->mdb->update("dy_typeoddid", array("odd_id"=>intval($value)),$row);
        }
        $this->J(200, 'succeed');
    }


    /*
    *  抽样号检索 [search/simplenumber]
        模块 :检索模块中的抽样单号检索
        说明 :此接口用于实现在服务器上根据抽样单号
        参数 :"phaSimpleNumber":要查询的抽样单号
        成功 :查询成功"code"返回200，同时"data"中带有查询到的抽样单表的信息
        失败 :查询失败"code"返回508
     * 输入
     * {
        "phaSimpleNumber":"1312122"
        }
     * 输出
    */
    public function simplenumber($sign = array())
    {
        !empty($sign) && $this->log['sign']    = $sign;        //方法中截取
        $this->log['mothod']    = __METHOD__;        //方法中截取

        $oddid =  intval($_POST['phaSimpleNumber']);

        $row = $this->mdb->findone("dy_SampleForm", array("SampleFormNumber"=>$oddid));
if(empty($row)) $this->J(508, 'error');
        $row['sampleCondition']['sampleConditionList']     = $this->mdb->find("dy_SampleCondition", array("odd_id"=>$oddid));
        $row['sampleDepartment']['sampleDepartmentList']   = $this->mdb->find("dy_SampleDepartment", array("odd_id"=>$oddid));
        $this->data($row);
        $this->J(200, 'succeed');
    }


    /*
    *  当天被抽样单位检索 [search/todaysearch]
     *
        模块 :检索模块中的当天被抽样单位检索
        说明 :此接口用于实现检索模块中的当天被抽样单位检索功能
        参数 :"simpledepartment":被抽样单位，"simpledate":抽样日期
        成功 :查询成功，"code"的值返回"200",同时"data"数组中携带查询到的抽样单表信息
        失败 :查询失败，"code"的值返回"509"。
         *
提交 :
{
"simpledepartment":"tianjinchouyang",
"simpledate":"2015-02-12"
}
    */
    public function todaysearch($sign = array())
    {
        !empty($sign) && $this->log['sign']    = $sign;        //方法中截取
        $this->log['mothod']    = __METHOD__;        //方法中截取


    }

    /*
    *  抽样单位检索 [search/simpledepartment]
模块 :检索模块中的抽样单位检索
说明 :本接口能够实现检索模块中的抽样单位检索功能
参数 :"startDate":开始日期,"endDate":终止日期,"simpleName":检品名称
成功 :查询成功，"code"的返回值为200，并且在"data"数组中有返回的抽样单表信息
失败 :查询失败，"code"的返回值为510。     *
     *
提交 :

{
"startDate":"2015-01-11",
"endDate":"2015-02-28",
"simpleName":"wahaha"
}
    */

    /**********************************************************************
    /**********************************************************************
    /**********************************************************************
    /**********************************************************************
    /**********************************************************************
    /**********************************************************************
    /**********************************************************************
    /**********************************************************************
    /**********************************************************************
    /**********************************************************************
    /**********************************************************************
    /**********************************************************************
    /**********************************************************************
     *
     * */
    private function data($data)
    {
        $this->de['data'] = $data;
    }
    private function data2($data)
    {
        $this->de['data2'] = $data;
    }
    private function msg($msg = '')
    {
        $this->de['msg'] = $msg;
    }
    private function get($msg = '')
    {
        $this->de['get'] = $msg;
    }
    private function code($code = '')
    {
        $code = intval($code);
        $this->de['code'] = $code;
    }
    public function D($code = 0, $data)
    {
        $code = intval($code);
        if (!empty($code)) $this->de['code'] = $code;
        $this->de['data'] = $data;

        //$this->de['timestamp_'] = $this->tmp['timestamp_'];
        //$this->de['timestamp'] = Set::T();
        $this->de['ExecuteTime'] = Set::T() - $this->tmp['timestamp_'];
        $this->de['ExecuteModel'] = 'Enter';
        $this->logmon->L($code,$this->de['msg'],$this->log);
        echo json_encode($this->de);
        exit;
    }

    public function J($code=0,$msg='')
    {
        $code = intval($code);
        if(!empty($code))  $this->de['code'] = $code;
        if(!empty($msg))   $this->de['msg']  = $msg;

        //$this->de['timestamp_'] = $this->tmp['timestamp_'];
        //$this->de['timestamp']  = Set::T();
        $this->de['ExecuteTime'] = Set::T() - $this->tmp['timestamp_'];
        $this->de['ExecuteModel']  = 'Enter';
        //print_r($this->de);
        $this->logmon->L($code,$msg,$this->log);
        echo json_encode($this->de);
        exit;
    }

    public function test($sign=array())
    {
        $this->log['sign']    = $sign;        //方法中截取

        $m["12"] = "[\"1\",\"2\"]";

        echo json_encode($m);
exit;
        //该用户已经存在
       //// $sql = "select count(*) from dy_user where user_login = '$username'";
       //// $count = $this->CI->S->Db->getone($sql);
//        $user['name'] = 'yangjun';
//        $user['pwd'] = 'yangjun';
//        //$this->CI->S->Mongodb->insert("table_user", $user);
//echo 'test2';
//        $params = $sign['params'];
//        print_r($params);
//array_shift($params);
//array_pop()
//array_push()
//array_unshift()
//array_shift()
        $this->ver = '123456789';
        echo($this->CI->S->ver);
        exit;
    }

    //魔术
    public function __call($name,$arguments) {
        echo $name;
        print_r($arguments);
        echo 'miss';
        exit;
    }

    //资源重定向到ci->s下
    public function __get($key)
    {
        return $this->CI->S->$key;
    }

    public function __set($key, $value)
    {
        return $this->CI->S->$key = $value;
    }

    public function __isset($key)
    {
        return isset($this->CI->S->$key);
    }

    public function __unset($key)
    {
        unset($this->CI->S->$key);
    }

}