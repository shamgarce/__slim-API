<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class index extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//连接数据库================================================两种方式都可以
		$this->load->helper('cookie');        //
		//$this->load->library('session');
		$this->S = Seter::getInstance();
	}

	public function index()
	{
		//默认首页
		$this->SS = Seter::getInstance();

		$data['msg'] = 'welcome';
		//$this->load->view('welcome_message',$data);
	}

	public function env_demo()
	{

		$this->S->log->test();
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