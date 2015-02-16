<?php
defined('IS') or exit();
class gt extends Api{

    public function ver(){
        //验证用户名和密码是否正确
        //验证这两个值能否通过
        global $_GW;
        $salt = '123456789';
        //print_r($_GET);
        //$_GW['upwd'] = md5(md5($_GW['upwd'].$salt).$salt);
        //print_r($_GW);
        $sql = "select * from dy_user where user_login ='{$_GW['ulogin']}' and user_password ='{$_GW['upwd']}'";
        $this->db = $this->getdb();
        $row = $this->db->getrow($sql);
        if(!empty($row)){
            $this->E(200,'pass');
        }else{
            $this->E(500,'not pass');
        }
    }

    public function ver2(){
        //验证用户名和密码是否正确
        //验证这两个值能否通过
        global $_GW;
        $salt = '123456789';
        //print_r($_GET);
        //$_GW['upwd'] = md5(md5($_GW['upwd'].$salt).$salt);
        //print_r($_GW);
        $sql = "select * from dy_user";
        $this->db = $this->getdb();
        $rc = $this->db->getall($sql);

        $this->E(200,'pass',$rc);
    }

    //------------------------------------------------------------
    //------------------------------------------------------------
    //------------------------------------------------------------
    //------------------------------------------------------------
    //------------------------------------------------------------
    public function E($code,$msg='',$data=array())
    {
        global $_W;
        $_W['json']['code'] = $code;
        $_W['json']['msg']  = $msg;
        $_W['json']['data'] = $data;
        $this->JSON = $_W['json'];
        $this->jsonout();
        exit;
    }

    public function getdb()
    {
        $config['dbhost'] = '127.0.0.1';
        $config['dbuser'] = 'root';
        $config['dbpw'] = '123';
        $config['dbname'] = 'ns';
        $config['charset'] = 'utf8';
        $config['pconnect'] = 0;
        $config['quiet'] =0;
        $db = Mysql::getInstance($config);
        return $db;
    }

}