<?php
defined('IS') or exit();
class test extends Api{
	//public function action_before(){}
	//public function action_after(){}
	
	public function getsucceed(){
		global $_W;
		$_W['json']['code'] = '200';
		$_W['json']['msg'] = 'getsucceed模板：：成功get一组数据';
		$_W['json']['data'] = array("name"=>"莫言");
		$_W['debug'] = $_W['_args']['debug'];
		$this->JSON = $_W['json'];
	}

	public function getfail(){
		global $_W;
		$_W['json']['code'] = '404';
		$_W['json']['msg'] = 'getfail模板：：get一组数据失败了';
		$_W['json']['data'] = array("name"=>"莫言");
		$_W['debug'] = $_W['_args']['debug'];
		$this->JSON = $_W['json'];
	}
	
	public function postsucceed(){
		global $_W;
		$_W['json']['code'] = '200';
		$_W['json']['msg'] = 'postsucceed模板：：成功post一组数据';
		$_W['json']['data'] = array("name"=>"莫言");
		$_W['debug'] = $_W['_args']['debug'];
		$this->JSON = $_W['json'];
	}
	
	public function postfail(){
		global $_W;

		$_W['json']['code'] = '404';
		$_W['json']['msg'] = 'postfail模板：：post一组数据失败了';
		$_W['json']['data'] = array("name"=>"莫言");
		$_W['debug'] = $_W['_args']['debug'];
		$this->JSON = $_W['json'];
	}

}
