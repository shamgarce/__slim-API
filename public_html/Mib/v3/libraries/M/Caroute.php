<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Caroute
{
	//--
	private $route = array();
	private $db = null;
	public function __construct($params)
	{
		$this->params = $params;
		$this->db = Mysql::getInstance();
	}

	public function ini($sign)
	{
		//获得了

		echo 888;
		//对照映射表,寻找对应的处理文件
	}

}