<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Te extends CI_Controller
{
	private $salt = 'ccab8f440ff0825e';
	private $db = NULL;

	function __construct()
	{
		parent::__construct();
//		//连接数据库================================================
//		!defined('MBASE') && define('MBASE', dirname(__FILE__) . "\\" . 'lib');    //v31 EASY的绝对路径
//		include(MBASE . '\Mysql.class.php');
//		$this->db = Mysql::getInstance();
		//连接数据库================================================
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

	public function index()
	{
		echo 1;
		//模块加载演示
//		$params = array('a'=>'1');
//		$this->load->library('Myte', $params);
//		$this->myte->run();

//		$CI =& get_instance();
//		$CI->load->helper('url');
//		$CI->load->library('encrypt');			//http://codeigniter.org.cn/user_guide/libraries/encryption.html
		//$CI->config->item('base_url');
//		echo 1;
	}


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

