<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Caroute
{
	//--
	private $route = array();
	private $db = null;
	public function __construct($params)
	{
		echo 'Caroute!';
//		$this->params = $params;
//		$this->db = Mysql::getInstance();
	}

	public function run($params)
	{
		echo 'Caroute!run';
//		$this->params = $params;
//		$this->db = Mysql::getInstance();
	}



}