<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M extends CI_Controller
{


	function __construct()
	{
		parent::__construct();
		//连接数据库================================================两种方式都可以
//		include(FCPATH.APPPATH.'libraries\Db.php');
//		$this->db = Db::getInstance();
		//连接数据库================================================
		$this->load->library('Db');			//数据库
	}


	//主要的管理界面
	public function index($ver = 0,$mm=0)
	{

		$this->load->view('M/M_index',$data);
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */