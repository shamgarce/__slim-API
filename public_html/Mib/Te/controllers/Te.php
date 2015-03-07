<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Te extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->S = new Set();
		$this->S->singleton('Db', function ($c) {
			return new Db();
		});
		$this->S->singleton('Mdb', function ($c) {
			return new Mdb();
		});

	}


//	public function getInstance($class){
//		!($this->$class) && $this->$class = new $class();
//	}

	public function index()
	{
		$sql = "select * from dy_user";
		$rc = $this->S->Db->getall($sql);

	}

	public function cldata()
	{
		$this->clear("drlist");
	}

	public function crdata()
	{
		$handle = "E:/www/slim-API/public_html/sample.txt";
		$a=filectime($handle);		//时间$trm
		$dbhanddb = "ms$a";			//数据库名

		$drlist = $this->get_cache("drlist");				//是否已经导入,和断点标记
		if(empty($drlist[$a])){
			//还没有导入
			$file_handle = fopen($handle, "r");
			$ar = array();
			$i= 0;
			while (!feof($file_handle)) {
				$line = fgets($file_handle);
				$line = floatval($line);
				$ar_['id'] = $i;
				$ar_['va'] = $line;
				$ar[] = $ar_;
				$i++;
			}
			fclose($file_handle);


			foreach($ar as $key=>$value){
				$this->S->Mdb->insert("temp_r",$value);
			}



			$drlist_max[$a] = $i;
			$this->set_cache("drlist_max", $drlist_max);			//最大数据保存

			//导入完毕
			$drlist[$a] = 1;
			$this->set_cache("drlist", $drlist);
		}






	}

	public function getdata($countnum)
	{
		$countnum = empty($countnum)?1:$countnum;
		$handle = "E:/www/slim-API/public_html/sample.txt";
		$a=filectime($handle);		//时间$trm
		$drlist = $this->get_cache("drlist");				//是否已经导入,和断点标记
		$drlist_max = $this->get_cache("drlist_max");				//是否已经导入,和断点标记

		if($countnum==1){
			$are["id"] = $drlist[$a];
			$row = $this->S->Mdb->find("temp_r",$are);
			$num = $row[0]['va'];
		}else{
			$are["id"] = $drlist[$a];
			$row = $this->S->Mdb->find("temp_r",array(),array("start"=>$are["id"],"limit"=>$countnum*5,"sort"=>array("id"=>1)));
			//获得了数据			//五取一
			foreach($row as $key=>$value){
				if(ceil($key/5)==$key/5){
					$ne[] = $value['va'];
				}
			}

			echo json_encode($ne);
			exit;

		}

		//获取总的数据
		//$drlist[$a]++;
		$drlist[$a] = $drlist[$a]+5;			//步长 2

		//最大的
		$drlist_max = $this->get_cache("drlist_max");
		if($drlist[$a]>=$drlist_max[$a]){
			$drlist[$a] = 1;
			$this->set_cache("drlist", $drlist);
		}
		$this->set_cache("drlist", $drlist);				//断电保存

		//获取正确的数据,并且输出
		$point[0] =time()*1000;;
		$point[1] =$num;
		echo json_encode($point);


		exit;

	}

	//复用函数
	public function T(){
		list($usec, $sec) = explode(" ",microtime());
		$num = ((float)$usec + (float)$sec);
		return $num;
	}









	//=============================================================
	//参数接收
	//测试 http://192.168.1.200/Te/go/123
	/*
	public function go($id)
	{
		echo $id;
	}
	//测试 http://192.168.1.200/Te/doo/123/wer
	public function doo($id=0,$num=0)
	{
		echo $id.'<br>'.$num;
	}
	//=============================================================*/

/*
 *	类加载 			http://codeigniter.org.cn/user_guide/general/creating_libraries.html
 *  路由配置		http://codeigniter.org.cn/user_guide/general/routing.html
	公共函数位于 	system/core/Common.php 文件中，大家可以在这里定义自己的公共函数
	路由类			http://codeigniter.org.cn/user_guide/libraries/uri.html
	错误处理		http://codeigniter.org.cn/user_guide/general/errors.html
	模板引擎		http://codeigniter.org.cn/user_guide/libraries/parser.html
 * application/config/routes.php
 * */



	//=============================================================
	/*
	 * Doc
	 * Man
	 * 这两个模块没有启用
	 * */
//	//正常情况下不起用这个
//	public function _remap($method, $params = array())
//	{
//		echo 1;
//	}
	//=============================================================














	public function set_cache($key, $value, $time = 0) {
		if ($time == 0) $time = null; //null情况下永久缓存
		return apc_store($key, $value, $time);;
	}


	/**
	 * Apc缓存-获取缓存
	 * 通过KEY获取缓存数据
	 * @param  string $key   KEY值
	 */
	public function get_cache($key) {
		return apc_fetch($key);
	}

	/**
	 * Apc缓存-清除一个缓存
	 * 从memcache中删除一条缓存
	 * @param  string $key   KEY值
	 */
	public function clear($key) {
		return apc_delete($key);
	}

	/**
	 * Apc缓存-清空所有缓存
	 * 不建议使用该功能
	 * @return
	 */
	public function clear_all() {
		apc_clear_cache('user'); //清除用户缓存
		return apc_clear_cache(); //清楚缓存
	}

	/**
	 * 检查APC缓存是否存在
	 * @param  string $key   KEY值
	 */
	public function exists($key) {
		return apc_exists($key);
	}

	/**
	 * 字段自增-用于记数
	 * @param string $key  KEY值
	 * @param int    $step 新增的step值
	 */
	public function inc($key, $step) {
		return apc_inc($key, (int) $step);
	}

	/**
	 * 字段自减-用于记数
	 * @param string $key  KEY值
	 * @param int    $step 新增的step值
	 */
	public function dec($key, $step) {
		return apc_dec($key, (int) $step);
	}

	/**
	 * 返回APC缓存信息
	 */
	public function info() {
		return apc_cache_info();
	}
















}


















