<?php
/*
日志类rlog
*/
class Log{
	var $switch		= true;
	var	$tablename 	= 'sy_log'; //biao 
	var $uid;
	var $code;
	var $cookies;
	var $sessions;
	var $gets;
	var $posts;
	var $msg;
	var $tm;
	var $url;
	var $db = null;

	//-------------------------------------------------
	function go($code = '999',$msg='',$sql='',$nr = ''){
		if(!$this->switch)return false;				//是否开启
		$nr = $this->nr($code,$msg,$sql,$nr);

		$this->recsql($nr);				//数据库存储日志
		return true;
	}
	
	//-------------------------------------------------

	function recsql($rc){
		$this->db->autoExecute($this->tablename,$rc);
	}
	
	//返回日志数据
	function nr($code,$msg,$sql,$nr){
		//type根据code进行运算
		$rc['code'] 	= $code;
		$rc['type'] 	= floor($code/100);
		
		$rc['sqlstr'] 	= saddslashes($sql);
		$rc['msg'] 		= saddslashes($msg);
		$rc['nr'] 		= saddslashes(serialize($nr));
		
		$rc['uid'] 		= $_COOKIE['uid'];		//有的不一定有
		 
		$rc['c'] 		= $_GET['c'];
		$rc['a'] 		= $_GET['a'];
		
		$rc['cookies'] 	= saddslashes(serialize($_COOKIE));
		$rc['sessions'] = saddslashes(serialize($_SESSION));
		$rc['gets'] 	= saddslashes(serialize($_GET));
		$rc['posts'] 	= saddslashes(serialize($_POST));

		$rc['tm'] 		= time();
		$rc['url'] 		= 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
		$rc['PHP_SELF'] 	= $_SERVER['PHP_SELF'] ;		//文件地址
		$rc['QUERY_STRING'] = $_SERVER['QUERY_STRING'] ;	//query_string
		$rc['HTTP_HOST'] 	= $_SERVER['HTTP_HOST'] ;		//域名
		$rc['HTTP_REFERER'] = $_SERVER['HTTP_REFERER'] ;	//来路
		$rc['REMOTE_ADDR'] 	= $_SERVER['REMOTE_ADDR'] ;		//ip		
		$rc['state'] 	= 0;
		return $rc;
	}

}
?>