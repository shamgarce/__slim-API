<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class R
{
	//--
	private $route = array();
	private $db = null;
	private $params = array();
	public function __construct($params)
	{
		$this->params = $params;
		$CI =& get_instance();
		$CI->load->library('Db');
	}

	public function __call($name,$arguments) {
		$CI =& get_instance();
		//在这里
		$id = $arguments[0]['dbid'];
		$sql = "select response from userapi where id = $id";
		$rs = $CI->db->getone($sql);
		if(empty($rs['response']))$rs['response'] = '{"code":200,"msg":"操作完成r/s"}';
		$r = json_decode($rs);
		$r->timestamp = time();
		$r->debugpath = 'r/s';
		$r->flagc = 'action do';
		echo json_encode($r);
		exit;
		//查看在数据库中的映射,并且判断是否返回调试数据
	}

}