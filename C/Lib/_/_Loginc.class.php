<?php
/*
* 名称：CnkknDPHPLogin Class
* 描述：PHP用于登录的类，基于MySQL
* 作者：Daniel King，cnkknd@msn.com
* 日期：Start@2003/8/25，Update@2004/4/16
*/
class Loginc{
	var $appname = "login"; //网站名称
	var $username; //用户名
	var $userpass; //密码
	var $authtable = "sy_user"; //验证用数据表
	var $col_username = "u_login"; //用户名字段
	var $col_password = "u_password"; //用户密码字段
	var $col_banned = "u_delete"; //是否被禁止字段
	var $use_cookie = true; //使用cookie保存sessionid
	var $cookiepath = '/'; //cookie路径
	var $cookietime = 43200; //cookie有效时间
	var $err_mysql = "mysql error"; //mysql出错提示
	var $err_auth = "username invalid or wrong password"; //用户名无效提示
	var $err_user = "user invalid"; //用户无效提示(被封禁)
	var $err; //出错提示
	var $error_report = false; //显示错误
	//-------------------------------------------------
	//add by sham
	var $_uid			= "id";				//id的字段
	var $_uname			= "u_name";			//用户名的地段
	var $_department	= "u_department";	//部门字段
	var $_leadid		= "u_leadid";		//是否主管
	
	var $uid;	//id的字段
	var $uname;	//用户名的地段
	//-------------------------------------------------

function Login($appname=""){
	$this->appname=$appname; //初始化网站名称
}

//判断是否登录
function isLoggedin(){
	//$this->kv = new Kv();
	if(isset($_COOKIE['suid'])) //如果cookie中保存有sid
	{
		session_id($_COOKIE['suid']);
		session_start();
		if(isset($_SESSION['appname'])){
			if($_SESSION['appname']!=$this->appname) Return false;
		}
		//为了防止不同的程序使用同一个登录类产生冲突，加了个appname作为区分标记
		//验证ca权限
		//$this->dca();
		return true;
	}
	else //如果cookie中未保存sid,则直接检查session
	{
		session_start();
//		die($_SESSION['appname']);
		if(isset($_SESSION['appname'])){
			//验证ca权限
			//$this->dca();
			return true;
		}
	}
	return false;
}

//function dca(){ //ca权限验证
//	return true;
//	$c = $_GET['c'].'.'.$_GET['a'];
//	$ms =  $this->kv->get('userpow.'.$_COOKIE['suid']);				//用户的pw
//	if(in_array($_GET['c'].'.'.$_GET['a'],$ms))  return true;
//	$path_pass = CONF_PATH.'Pass.inc.php';
//	if(file_exists($path_pass)){
//		$fi_pass = include $path_pass;
//		if(in_array($_GET['c'].'.'.$_GET['a'],$fi_pass)) return true;
//	}
//	//return true;
//	E('未被授权的动作 请联系管理员');
//}

function userAuth($username,$userpass) //用户认证
{
	$this->username=$username;
	$this->userpass=$userpass;
	//连接数据库
	global $_W;
	$_host = $_W['pdo']['system']['HOST'];
	$_user = $_W['pdo']['system']['USER'];
	$_pwd = $_W['pdo']['system']['PWD'];
	$_db = $_W['pdo']['system']['NAME'];
	$_chr = $_W['pdo']['system']['CHAR'];

	//$this->kv = new Kv();
	mysql_connect($_host,$_user,$_pwd);
	mysql_select_db($_db);
	mysql_query('set character_set_connection = utf8');
	mysql_query('set names utf8');
	$query="select * from `".$this->authtable."` where `".$this->col_username."`='$username';";
	$result=mysql_query($query);
	if(mysql_num_rows($result)==1) //找到此用户
	{
		$row=mysql_fetch_assoc($result);
		if($row['u_delete']==0) //此用户被封禁
		{
			$this->errReport($this->err_user);
			$this->err=$this->err_user;
			return false;
		}
		elseif($userpass==$row[$this->col_password]) //密码匹配
		{
			//-------------------------------------
			//add by sham
			$this->uid	 = $row[$this->_uid];
			$this->uname = $row[$this->_uname];
			$this->u_department = $row['u_department'];
			$this->u_leadid 	= $row['u_leadid'];
			//ca缓存
			$mypw = unserialize($row['u_purview']);
			//$this->kv->set('userpow.'.$this->uid,$mypw,8*60*60);
			//--------------------------------------
//			$this->userinfo=$row;
			return true;
		}
		else //密码不匹配
		{
			$this->errReport($this->err_auth);
			$this->err=$this->err_auth;
			return false;
		}
	}
	else //没有找到此用户
	{
		$this->errReport($this->err_auth);
		$this->err=$this->err_auth;
		return false;
	}
}

function setSession() //置session
{
	$sid=uniqid('sid'); //生成sid
	session_id($sid);
	session_start();
	$_SESSION['appname']		= $this->appname; 		//保存程序名
	$_SESSION['userinfo']		= $this->userinfo; 		//保存用户信息（表中所有字段）
	$_SESSION['u_department']	= $this->u_department; 	//保存部门信息（表中所有字段）
	$_SESSION['u_leadid']		= $this->u_leadid; 		//保存是否主管信息（表中所有字段）
	if($this->use_cookie) //如果使用cookie保存sid
	{
		if(!setcookie('suid',$sid,time()+$this->cookietime,$this->cookiepath)){
			$this->errReport("set cookie failed");
			$this->err="set cookie failed";
		}
		//---------------------------------------------------
		//保存一些必要地段,让程序调用//add by sham
		setcookie('suid',$this->uid,time()+$this->cookietime,$this->cookiepath);
		setcookie('suname',$this->uname,time()+$this->cookietime,$this->cookiepath);
		setcookie('sudepartment',$this->u_department,time()+$this->cookietime,$this->cookiepath);
		setcookie('suleadid',$this->u_leadid,time()+$this->cookietime,$this->cookiepath);
		
		//---------------------------------------------------
	}else{
		setcookie('suid','',time()-3600,$this->cookiepath); //清除cookie中的sid
	}
}

function userLogout() //用户注销
{
	session_start();
	session_destroy();
	if(setcookie('suid','',time()-3600,$this->cookiepath)){
		setcookie('suname','',time()-3600,$this->cookiepath); //清除cookie中的sid
		setcookie('sudepartment','',time()-3600,$this->cookiepath); //清除cookie中的sid
		setcookie('suleadid','',time()-3600,$this->cookiepath); //清除cookie中的sid
		
		return true;
	}else{
		return false;
	}
}

function settokon(){
	$tm 	= time()+1*60*60;
	$tm2 	= time()+8*60*60;
	$tokon_ 	= md5($tm);
	$tokonsql = " select tokon from tokon 
				where uid = {$this->uid} and tm > $tm";
	$tokon = $this->db->getone($tokonsql);
	if(empty($tokon)){
		$sql = "insert into tokon (uid,tokon,tm) values({$this->uid},'$tokon_',$tm2)";
		$this->db->query($sql);
	}
}

function gettokon(){
	//根据cookie获取一个有效的tokon
	$tm 	= time();
	$uid = intval($_COOKIE['suid']);
	$tokonsql = " select tokon from tokon
				where uid = $uid and tm > $tm";
	$tokon = $this->db->getone($tokonsql);
	return $tokon;
}

function re(){
	$uid = intval($_COOKIE['suid']);
	$ip = $_SERVER['REMOTE_ADDR'];
	$tm = time();
	$sql = "update sy_user set last_logtm = $tm,last_logip='$ip' where id = {$this->uid}";
	$this->db->query($sql);
}

function errReport($str) //报错
{
	if($this->error_report)
	echo "ERROR: $str";
}

}
?>