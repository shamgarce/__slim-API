<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Te extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->S = new Set();
		$this->S->singleton('Db', function ($c) {
			return new Db();
		});
	}


//	public function getInstance($class){
//		!($this->$class) && $this->$class = new $class();
//	}

	public function index()
	{
		$sql = "select * from dy_user";
		$rc = $this->S->Db->getall($sql);
		$rc = $this->S->Db->getall($sql);
		$rc = $this->S->Db->getall($sql);
	}
















	//=============================================================
	//参数接收
	//测试 http://192.168.1.200/Te/go/123
	/*
	public function go($id)
	{
		echo $id;
	}
	//测试 http://192.168.1.200/Te/doo/123/wer
	public function doo($id=0,$num=0)
	{
		echo $id.'<br>'.$num;
	}
	//=============================================================*/

/*
 *	类加载 			http://codeigniter.org.cn/user_guide/general/creating_libraries.html
 *  路由配置		http://codeigniter.org.cn/user_guide/general/routing.html
	公共函数位于 	system/core/Common.php 文件中，大家可以在这里定义自己的公共函数
	路由类			http://codeigniter.org.cn/user_guide/libraries/uri.html
	错误处理		http://codeigniter.org.cn/user_guide/general/errors.html
	模板引擎		http://codeigniter.org.cn/user_guide/libraries/parser.html
 * application/config/routes.php
 * */



	//=============================================================
	/*
	 * Doc
	 * Man
	 * 这两个模块没有启用
	 * */
//	//正常情况下不起用这个
//	public function _remap($method, $params = array())
//	{
//		echo 1;
//	}
	//=============================================================


}


















