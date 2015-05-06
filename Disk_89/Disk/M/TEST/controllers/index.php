<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class index extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('cookie');
		$this->S = Seter::getInstance();

		//获取环境信息
		$this->get 		= $this->S->env->get;
		$this->post 	= $this->S->env->post;
		$this->env 		= $this->S->env->env;
		$this->cookies 	= $this->S->env->cookies;

		//用户相关信息获取
		$islogin 	= $this->S->user->islogin;
		$userlogin 	= $this->S->user->islogin;

		$this->islogin 		=  $this->S->user->userislogin;	//是否已经登录
		$this->userlogin 	=  $this->S->user->userlogin;	//登陆的用户名
		$this->userinfo 	= $this->S->user->getUserinfo();	//获取 用户信息
		$this->menuinfo 	= $this->S->user->getUserinfo();	//获取菜单信息
		$this->poinfo 		= $this->S->user->getUserinfo();	//获取权限信息

//		$this->S->log->L($code,$info,$loginfo);			//日志记录
	}

	public function index()
	{


		//默认首页
		$this->SS = Seter::getInstance();

		$data['msg'] = 'welcome';
		//$this->load->view('welcome_message',$data);
	}

	public function go()
	{
		//获取参数

		//预处理参数

		//逻辑运算

		//后置处理

		//执行输出

	}





	public function env_demo()
	{

//		show_error();
//		show_404();

		$md = $this->S->user->getUserinfo($uid);			//获取用户信息
print_r($md);
		//$this->S->log->test();
echo 1;
		//$rc = $this->S->env->env;

		//print_r($this->S->env->headers);
	}


	/*
	 * mysql 测试
	 * */
	public function mysql_demo()
	{

		//echo Seter::T();
		$rc = $this->S->log->logsys();
//		$sql = "select * from dy_user";
//		$rc = $this->S->db->getall($sql);
//		echo '<pre>';
		echo 2;

		print_r($rc);
	}



	/*
	 * mysql 测试
	 * */
	public function de()
	{
		//$this->SS = Seter::getInstance();
		$this->SS = Sham_Db::getInstance();
		$sql = "select * from dy_user";
		$rc = $this->SS->db->getall($sql);


		echo '<pre>';
		print_r($rc);
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */