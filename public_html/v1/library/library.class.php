<?php
defined('IS') or exit();
class library extends Api{
	//public function action_before(){}
	//public function action_after(){}
	public function books(){
		global $_W;
		$_W['json'] = 1;
		$_W['debug'] = 1;
		$this->JSON = $_W['json'];
	}

}
