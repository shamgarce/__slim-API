<?php
defined('IS') or exit();
class test extends Api{
	//public function action_before(){}
	//public function action_after(){}
	/*
$config['dbhost'] = '127.0.0.1';
$config['dbuser'] = 'root';
$config['dbpw'] = '123';
$config['dbname'] = 'ns';
$config['charset'] = 'utf8';
$config['pconnect'] = 1;
$config['quiet'] =1;
$db = Mysql::getInstance($config);
$sql = "select * from sy_user";
$db->lifetime = 1000;
$rc = $db->getall($sql);
$rc = $db->getrow($sql);
$rc = $db->getcol($sql);
$rc = $db->getmap($sql);
$rc = $db->getone($sql);
gsql($sql,'map','chr')
$db->query($sql);
$db->autoexecute('sy_user5',$rc,insert,'where')
$db->autoexecute('sy_user5',$rc,insert,'where')
$db->close();
$db->version();
$db->setMaxCacheTime(0);
$db->getMaxCacheTime();
	 * */
	public function getsucceed(){

//		$book = new Mysql();
//		$book->play();
//		/*----------------------------------------</script>*/

		$config['dbhost'] = '127.0.0.1';
		$config['dbuser'] = 'root';
		$config['dbpw'] = '123';
		$config['dbname'] = 'ns';
		$config['charset'] = 'utf8';
		$config['pconnect'] = 1;
		$config['quiet'] =1;
		$db = Mysql::getInstance($config);
		$sql = "select * from sy_user";

//		gsql
		//$db->lifetime = 1000;
//		$rc = $db->getall($sql);
//		$rc = $db->getall($sql);
//		$rc = $db->getrow($sql);
//		$rc = $db->getcol($sql);
//		$rc = $db->getone($sql);
		$db->gsql($sql,'all');
		$db->gsql($sql,'all');
		$db->gsql($sql,'all');
		$db->gsql($sql,'all');
		$db->gsql($sql,'all');
		$db->gsql($sql,'all');
		echo 1;


		$db->setMaxCacheTime(10);
		echo $db->getMaxCacheTime();
		echo $db->insert_id();
echo '---------------';
echo $db->queryCount;
		echo '--------------';



//$mysql = "";
//$pre = Mysql2::getInstance();
//$pre->setProperty('name','乔布斯');
//$pre2 = Mysql2::getInstance();
//print $pre2->getProperty('name');
////==================================================</pre>



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
