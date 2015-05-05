<?php

/*本用户的信息
 * */
class Sham_User{

    public function __construct()
    {

        $user['userip'] = Seter::GetIP();
        $user['userinfo'] = $this->getUserinfo();

        //$this->container['settings'] = array_merge(static::getDefaultSettings(), $userSettings);
    }

    /*
     *获取用户的详细信息
     * */
    public function getUserinfo()
    {
        //查询数据库获取用户信息返回
        return array();
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

