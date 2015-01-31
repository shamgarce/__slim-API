<?php
defined('IS') or exit();
class ca extends Api
{




	/* //添加/更新/删除//获取不在这里
	 * 添加用户
	 * 验证数据 openid / timestamp / signature
	 * 隐藏数据 device_id / salt
	 * 提交的数据包括用户名 username 密码 userpwd
	 * */
	public function useradd()
	{
		$this->db = $this->getdb();
		$salt = '123456789';
		//验证
		$this->regvery();

		$username = $_POST['user_login'];
		$userpwd = $_POST['user_password'];

		$rc['user_login'] = $username;
		//$rc['user_password'] = md5(md5($userpwd.$salt).$salt);
		$rc['user_password'] = $userpwd;
		$rc['f_regtime'] = time();
		$rc['enable'] = true;
//print_r($rc);
		$this->db->autoExecute('dy_user',$rc,'INSERT');


		$this->E(200,'user_add ok');
	}


	//============================
	public function regvery(){
		$this->db = $this->getdb();
		//===================================================
		global $_W;
		$username = $_POST['user_login'];
		$userpwd = $_POST['user_password'];
		if (empty($username) || empty($userpwd)) 			$this->E(500,'用户名密码不能为空');
		if (strlen($username)<3 || strlen($username)>20) 	$this->E(501,'用户名长度不符合要求');
		if (strlen($userpwd)<7) 							$this->E(502,'密码要求长度大于6');
		$flit= array(
				'0000000','1111111','11111111112233','123123123','123321123',
				'1234567',
				'12345678', '7654321', '6666666', '8888888',
				'abcdefg','abcabcabc','abc123123','a1b2c3d4','aaa111',
				'123qwe','qwerty','qweasd','admin','password',
				'p@ssword', 'passwd', 'iloveyou','5201314'
		);
		if(in_array($userpwd,$flit))			$this->E(503,'没有通过弱口令监测');
		//其他监测
		//用户名是否存在
		$sql = "select count(*) from dy_user where user_login = '$username'";
		$this->lifetime = 0;
		$count = $this->db->getone($sql);
		if($count > 0)	$this->E(504,'该用户已经存在');
	}

	public function E($code,$msg='',$data=array())
	{
		global $_W;
		$_W['json']['code'] = $code;
		$_W['json']['msg']  = $msg;
		$_W['json']['data'] = $data;
		$this->JSON = $_W['json'];
		$this->jsonout();
		exit;
	}

	public function getdb()
	{
		$config['dbhost'] = '127.0.0.1';
		$config['dbuser'] = 'root';
		$config['dbpw'] = '123';
		$config['dbname'] = 'ns';
		$config['charset'] = 'utf8';
		$config['pconnect'] = 0;
		$config['quiet'] =0;
		$db = Mysql::getInstance($config);
		return $db;
	}


}