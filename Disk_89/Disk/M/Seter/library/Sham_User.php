<?php
/*
 * userAuth     -> 验证用户的用户名和密码是否正确
 * getuserinfo  -> 获得用户记录的数据
 * userLogout   -> 登出
 * getmenuinfo  -> 菜单信息
 * getpoinfo    -> 权限信息数组
 * ispo         -> 框架内是否有权限
 *  */
class Sham_User{

    public $userlogin;
    public $userislogin;
    public $islogin;
    public $menuinfo    = array();
    public $poinfo      = array();
    public $userinfo    = array();

    public function __construct()
    {
        //获取登录名
        $this->userlogin    = $_COOKIE['userlogin'];
        //is 登录？
        $this->userislogin  = $_COOKIE['userislogin'];
    }

    //
    /*登出
     * 登录状态退出
     * @param  string
     * @return true / false
     * */
    public function userLogout()
    {
    }


    /*
     * 验证用户名密码是否正确
     * @param  string $username string $userpass
     * @return true / false
     * */
    public function userAuth($username,$userpass)
    {
    }


    /*
    * 设置cookie 激励登录状态
    * @param  string $username string $userpass
    * @return true / false
    * */
    public function setCookies()
    {

    }




    /*
     * 获取用户的详细信息
     * 返回用户信息
     * */
    public function getUserinfo($uid)
    {
        $user['userip'] = Seter::GetIP();
        $ar = array(
            // 是否超级用户
            'Issuperadmin'  => 1,
            's'=>1
        );
        $user['userinfo']  = array_merge(static::getDefaultSettings(),$ar);
        //查询数据库获取用户信息返回【读库】
        return $user;
    }



    public function getDefaultSettings()
    {
        return array(
            // 是否超级用户
            'Issuperadmin'  => 0,
            // 是否管理员
            'Isadmin'       => 0,
            // 是否已经登录
            'Issignin'      => 0,
            //用户ip
            'userip'        => '127.0.0.1',
            //登录的用户名
            'userlogin'     => '',
            //用户昵称
            'usernickname'  => '',
            //用户详细数据
            'userinfo'      => array(),
            'usergroupinfo'      => array(),    //用户的组
            'userMenu'      => array(),         //菜单数组
            'userca'      => array(),           //权限数组
        );
    }



}

