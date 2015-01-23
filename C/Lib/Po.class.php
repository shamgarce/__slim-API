<?php
/*
* 名称：CheckLogin Class
* 描述：PHP用于登录的类，基于MySQL
* 作者：shampeak 976107540@qq.com
* 日期：2014-07-14
*/
class Po{													//用户验证
	public 	$db 		= NULL; 		//数据缓存
	var $appname = "login"; //网站名称
	var $username; //用户名
	var $userpass; //密码
	var $uid; //密码

	var $use_cookie = true; //使用cookie保存sessionid
	var $cookiepath = '/'; //cookie路径
	var $cookietime = 43200; //cookie有效时间
	var $err_mysql = "mysql error"; //mysql出错提示
	var $err_auth = "用户或密码错误"; //用户名无效提示
	var $err_user = "用户被禁止登录"; //用户无效提示(被封禁)
	var $err; //出错提示
	var $error_report = false; //显示错误

	//-------------------------------------------------
	//add by sham
	var $myinfo 		= array(); //用户字段

	var $authtable 		= "sy_user"; //验证用数据表

	var $col_userlogin 	= "user_login"; //登录名字段
	var $col_password 	= "user_password"; //用户密码字段
	var $col_banned 	= "user_delete"; //是否被禁止字段		 0正常 1锁定
	var $col_uid		= "user_id";				//id的字段
	var $col_username 	= "user_name"; 		//登录名字段
	var $col_department	= "user_department";	//部门字段
	var $col_lead		= "user_lead";		//是否主管
	//-------------------------------------------------

	function re(){		//记录登录信息
		$ip = $_SERVER['REMOTE_ADDR'];
		$tm = time();		//
		$sql = "update $this->authtable set last_logtm = $tm,last_logip='$ip' where {$this->col_uid} = {$this->userinfo[$this->col_uid]}";
		$this->db->query($sql);
	}
	
	public function userLogout(){
		setcookie('uid','',time()-3600,$this->cookiepath);
		setcookie('ulogin','',time()-3600,$this->cookiepath);
		setcookie('uname','',time()-3600,$this->cookiepath);
		setcookie('udepartment','',time()-3600,$this->cookiepath);
		setcookie('uislead','',time()-3600,$this->cookiepath);
		setcookie('hash','',time()-3600,$this->cookiepath);
		return true;
	}
	
	function setCookies(){
		global $_W;
		$hash = md5($this->userinfo[$this->col_uid].$this->userinfo[$this->col_userlogin].$_W['salt']);
		setcookie('uid',	$this->userinfo[$this->col_uid],time()+$this->cookietime,$this->cookiepath);
		setcookie('ulogin',	$this->userinfo[$this->col_userlogin],time()+$this->cookietime,$this->cookiepath);
		setcookie('uname',	$this->userinfo[$this->col_username],time()+$this->cookietime,$this->cookiepath);
		setcookie('udepartment',$this->userinfo[$this->col_department],time()+$this->cookietime,$this->cookiepath);
		setcookie('uislead',$this->userinfo[$this->col_lead],time()+$this->cookietime,$this->cookiepath);
		setcookie('hash',	$hash,time()+$this->cookietime,$this->cookiepath);
	}
	
	//判断是否登录
	public function isLoggedin(){
		global $_W;
		$hash_ = md5($_COOKIE['uid'].$_COOKIE['ulogin'].$_W['salt']);
		if($_COOKIE['hash'] == $hash_){
			global $_W;
			$sql = "select * from ".$this->authtable." where ".$this->col_uid."='{$_COOKIE['uid']}';";;
			$row = $this->db->getrow($sql);
			unset($row[$this->col_password]);
			$_W['user'] = $row;
			$_W['uid']		= $row[$this->col_uid];
			$_W['uhash']		= $row['user_hash'];
			$_W['uname']	= $row[$this->col_username];
			$_W['ugroupid']	= $row[$this->col_department];
			$_W['uislead']	= $row[$this->col_lead];
			return true;
		}else{
			return false;
		}
	}

	public function userAuth($username,$userpass){ 			//用户认证
		$this->username=$username;
		$this->userpass=$userpass;
		$sql 	= "select * from ".$this->authtable." where ".$this->col_userlogin."='$username';";;
		$rc 	= $this->db->getall($sql);
		if(count($rc) == 1){		//找到用户
			$row = $rc[0];
			if($row[$this->col_banned]==1){					 //此用户被封禁
				$this->errReport($this->err_user);
				$this->err=$this->err_user;
				return false;
			}elseif($userpass==$row[$this->col_password]){				 //密码匹配
				$this->userinfo=$row;
				return true;
			}else{			 		//密码不匹配
				$this->errReport($this->err_auth);
				$this->err=$this->err_auth;
				return false;
			}			
		}else{						//没找到用户
			$this->errReport($this->err_auth);
			$this->err=$this->err_auth;
			return false;
		}
	}	
	
	function errReport($str){
		if($this->error_report)	echo "ERROR: $str";
	} //报错

}
?>