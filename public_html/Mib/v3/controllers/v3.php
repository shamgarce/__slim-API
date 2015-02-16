<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class v3 extends CI_Controller
{
	/**
	 * 通用过程 :
	 * 根据salt / timestamp / deviceid / signature / 判断是否合法的请求
	 * 根据salt / timestamp / openid 判断是否合法用户
	 */
	private	$code = 0;
	private	$msg = '';

	private 	$salt	= 'ccab8f440ff0825e';

	private 	$sign	= array();			//所有的输入数据存储
	private 	$map	= array();			//数据库解析到的所有匹配

	private 	$debug = false;


	private	$mothod = '';
	private	$params = array();
	public 		$db 	= NULL;


	function __construct()
	{
		parent::__construct();

		//=========================================================
		$this->sign['salt'] 		= $this->salt;				//
		$this->sign['timestamp'] 	= $this->input->get('timestamp',true);	//$_GET['timestamp'];	//时间
		$this->sign['deviceid'] 	= $this->input->get('deviceid',true);	//$_GET['deviceid'];	//设备id
		$this->sign['openid'] 		= $this->input->get('openid',true);		//$_GET['openid'];		//设备id
		//$this->sign['actionid'] 	= $this->input->get('actionid',true);	//$_GET['actionid'];	//动作id用来验证是否重复提交	//暂时不处理
		$this->sign['signature'] 	= $this->input->get('signature',true);	//$_GET['signature'];	//计算出来的签名比对 2014087451d28443c11e84107dfaae1f
		$this->sign['user'] 		= $this->input->get('user',true);		//$_GET['ush'];			//ush //获取得到 再次获取则会更换
		$this->sign['sign'] 		= false;
		//=========================================================
		$this->load->library('Db');

		//=========================================================
		//匹配模式 ->$this->map
		$sql = "select * from userapi where enable = 1 AND  v = 'v3'";
		$rc = $this->db->getall($sql);
		foreach($rc as $key=>$value){
			$ar 	= explode('/',$value['api']);
			$___m 	= array_shift($ar);
			$___aj	= array_shift($ar);
			$___a 	= (substr($___aj, 0, 1) != ':')? empty($___aj)?'index':$___aj:'index';
			$map[$___m][$___a] = array($value['id'],$value['ys']);
		}
		$this->map = $map;

	}

	public function _remap($method, $params = array())
	{
		if($method == 'index') $this->jout(405);		//不可以调用的方法名

		$this->sign['mothod'] 			= $method;
		$this->sign['mothod_action']	= empty($params[0])?'index':$params[0];
		if(!empty($this->map[$this->sign['mothod']]['index']))	$this->sign['mothod_action'] = 'index';

		$this->sign['params'] 			= $params;
		//========================================================

		/*
		 * 有这么几种情况
		 * 1 安全检查没有通过
		 * 2 method 缺失
		 * 3
		//根据输入的数据,和sign中的数据,来判断是否有false
		*/

		if(!$this->safe_sign()) $this->jout($this->code,'未通过签名监测');

		//=============================================================
		//数据库id 有了//能够获取到映射
		$tid = $this->map[$this->sign['mothod']][$this->sign['mothod_action']][0];
		$this->sign['dbid'] = $tid;
		if($tid){
			//找到了数据
			//是否debug
			//是否调试
			$sql = "select * from userapi where id = $tid";
			$rs = $this->db->getRow($sql);

			if($rs['debug'] == 1){		//调试模式
				if(empty($rs['response'])) 	$rs['response'] = '{"code":200,"msg":"操作完成"}';
				$r = json_decode($rs['response']);
				$r->timestamp = time();
				$r->debugpath = 'v3';
				echo json_encode($r);
				exit;
			}else{
				$sp 	= explode('/',$rs['ys']);
				$this->load->library('M/'.ucwords($sp[0]),$params);
				$this->$sp[0]->$sp[1]($this->sign);							//把头部签名文件传递进去
			}
		}else{
			//没找到数据记录//关闭
			$this->jout(200,'designing.....');
		}

		//===============================================================
	}

	//=========================================================
	//数据完整性 和安全签名
	public function safe_sign()	//安全签名
	{

//		//=========================================================
//		//数据验证计算	http://m.so/v1/adduser/?timestamp=1422963025&deviceid=10052424&signature=2014087451d28443c11e84107dfaae1f
//		(md5("{$sign['salt']}_{$sign['timestamp']}_{$sign['deviceid']}") == $_GET['signature']) && $sign['sign'] = true;
//		($sign['timestamp']>time()+100*60 || $sign['timestamp'] < time()-100*60) 				&& $sign['sign'] = false;			//时间判断
//		$sign['sign'] = false;

		return true;
	}


	//=========================================================
	//匹配是否正确
	public function uricheck()
	{


		//uri 到 数据库

		//检查是否调试模式,调试模式直接转r/s
		//是否关闭,关闭直接输出关闭
		$this->code = 300;
		return true;


		//uri 到数据库 能否找到正确的映射
		$this->code = 300;
		return true;

		//映射 到文件
		//映射 到文件,能否找到正确匹配
		$this->code = 300;
		return true;


		$this->code = 300;
		return true;
	}

	//===============================================================
	//信息输出
	//===============================================================
	public function jout($code,$msg = '有错误')
	{
		$res['code'] = $code.'00';
		$res['msg'] = $msg;
		echo json_encode($res);
		exit;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */