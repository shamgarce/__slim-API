<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Doc extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		//连接数据库================================================
		define('MBASE', dirname(__FILE__)."\\".'lib');	//v31 EASY的绝对路径
		include(MBASE.'\Mysql.class.php');
		$this->db = Mysql::getInstance();
		//连接数据库================================================
	}

	//可编辑的首页,在适当的位置会有个edit标签		首页 是一个封面
	public function index($listid = 0)
	{
		//=============================================================
		//是否指向文章页面,根据两重数据来进行判断
		//1 : 数据库指定的ar标签 否则为list
		//2 :
		//初始化
		// $listid	类别ID
		// $rc		容器
		// $_rc		资源数据
		//=============================================================
		$listid = intval($listid);
		$rc 	= array();
		$rc2 	= array();
		$sql	= "select id,preid,title from doc_document where enable = 0 order by sort desc ,id";
		$_rc	= $this->db->getall($sql,'id');		//所有的数据

		//=============================================================
		//整课树的运算  第一,运算处小树枝 第二 运算出是否叶子
		$_rc = $this->unc_tree(0,$_rc);				//获得一棵树			//['ye']
		$_rc['id'] = 0;
		$_rc['title'] = '根';
		$rc = $this->unc_find_father($_rc);			//对叶子的父亲进行标记	//['fa']

		//对树进行遍历,找到合适的分叉
		$rc = $this->unc_find_id($listid,$rc);		//根据ID找到分叉;
		$this->unc_find_path($listid,$_rc);			//根据整棵树建立路径

		//print_r($this->treepath);



		//=============================================================
		//跟本id同级,以及下级的
		$data['listid'] = $listid;
		$data['rc'] = $rc;							//ok对一级,二级进行列表,其他层级不管

		krsort($this->treepath);
		$data['treepath'] = $this->treepath;		//路径

		$this->load->helper('cookie');
		$this->load->view('Doc/index',$data);
	}


	//对整棵树进行检查,计算出叶子
	//中止条件 : 数据不在are中
	//入口 0
	function unc_tree($id, $are=array()){
		// 根据id 检索出需要处理的单元
		//返回数据是该单元,和该单元下面的子数据
		//中止条件,叶子
		$fwe = true;
		$ar = $are[$id];
		foreach($are as $key=>$value){
			if($value['preid'] == $id){
				$fwe = false;
				$ar['child'][$value['id']] = $this->unc_tree($value['id'],$are);
			}
		}
		if($fwe) $ar['ye'] = $fwe;			//叶子标记
		return $ar;
	}

	//对叶子的父亲进行标记
	function unc_find_father($are=array())
	{
		if($are['ye']==1){		//叶子
			return $are;
		}
		if($are['ye']!=1) {        //非叶子
			$reflag = true;
			foreach($are['child'] as $key=>$value) {
				if($value['ye']!=1) {
					$reflag = false;
				}
			}
			if($reflag){
				$are['fa']=1;
				return $are;
			}
		}
		//===============================================
		foreach($are['child'] as $key=>$value){
			$are['child'][$key] = $this->unc_find_father($value);
		}
		return $are;
	}

	//根据id,获取相应的分支
	function unc_find_id($id,$are=array())
	{
		if($id == 0) return $are;
		if($id == $are['id']) return $are;
		//===============================================
		foreach($are['child'] as $key=>$value){
			return $this->unc_find_id($id,$value);
		}
		return array();
	}

	//根据id,获取相应的分支
	function unc_find_path($id,$are=array())
	{
		if($id == $are['id'] || $id == 0){
			return true;
		}
		//echo print_r($are['child']);
		//===============================================
		foreach($are['child'] as $key=>$value){
			$mc = $this->unc_find_path($id,$value);
			if($mc){
				$uc = $value;
				unset($uc['child']);
				$this->treepath[] = $uc;
				return $mc;
			}
		}
		return false;
	}

	//=============================================================
	//查看
	public function nrview($listid = 0){
		$listid = intval($listid);
		$rc 	= array();
		$rc2 	= array();
		$sql	= "select id,preid,title from doc_document where enable = 0 order by sort desc ,id";
		$_rc	= $this->db->getall($sql,'id');		//所有的数据


		//=============================================================
		//整课树的运算  第一,运算处小树枝 第二 运算出是否叶子
		$_rc = $this->unc_tree(0,$_rc);				//获得一棵树			//['ye']
		$_rc['id'] = 0;
		$_rc['title'] = '根';
		$rc = $this->unc_find_father($_rc);			//对叶子的父亲进行标记	//['fa']

		//对树进行遍历,找到合适的分叉
		$rc = $this->unc_find_id($listid,$rc);		//根据ID找到分叉;
		$this->unc_find_path($listid,$_rc);			//根据整棵树建立路径

//print_r($this->treepath);

		//=============================================================
		//本页内容
		$sql	= "select * from doc_document where (id = $listid) AND enable = 0 order by sort desc ,id";
		$mcmain	= $this->db->getRow($sql);		//所有的数据
		$sql	= "select * from doc_document where (preid = $listid) AND enable = 0 order by sort desc ,id";
		$mc	= $this->db->getall($sql,'id');		//所有的数据

		$data['mcmain'] = $mcmain;
		$data['mc'] = $mc;
		//=============================================================
		//跟本id同级,以及下级的
		$data['listid'] = $listid;
		$data['rc'] = $rc;							//ok对一级,二级进行列表,其他层级不管

		krsort($this->treepath);
		$data['treepath'] = $this->treepath;		//路径

		$this->load->helper('cookie');


		$this->load->view('Doc/nrview',$data);
	}



	//=============================================================
	//内容页
	public function content(){
		$this->load->helper('cookie');
		$this->load->view('Doc/index_view_list',$data);
	}

	//=============================================================
	//内容编辑
	public function content_edit(){

	}

	//=============================================================
	//设置
	public function vset(){
		//功能 :设置是否显示编辑和排序,还有是否展示地址
		$this->load->helper('cookie');
		$this->load->view('Doc/vset',$data);
	}

	//=============================================================
	//选择 归属
	public function vset_select(){
		//检索所有的信息,选择归属


		//功能 :设置是否显示编辑和排序,还有是否展示地址
		$sql	= "select id,preid,title from doc_document
					where LENGTH(content) = 0 and enable = 0
					order by sort desc ,id";
		$_rc	= $this->db->getall($sql,'id');		//所有的数据
		$data['_rc'] = $_rc;

//print_r($_rc);

		$this->load->view('Doc/vset_select',$data);
	}


	public function vset_edit_exc()
	{
		$id = $_POST['id'];
		$rc['preid'] 	= $_POST['bguishu'];
		$rc['title'] 	= trim($_POST['btiaoti']);
		$rc['content'] 	= $_POST['bnr'];
		$rc['url'] 		= $_POST['burl'];

		if(empty($rc['title']))	{
			echo json_encode(array("code"=>"-200","msg"=>'标题必须填写'));
			exit;
		}

		$this->db->autoExecute("doc_document",$rc,'UPDATE',"id=$id");
		echo json_encode(array("code"=>"200","msg"=>'完成'));
		exit;
	}
	//=============================================================
	//设置
	public function vset_edit($id){
		$sql	= "select * from doc_document where id = $id ";
		$rc	= $this->db->getrow($sql);		//所有的数据
		$data['rc'] = $rc;

		//功能 :设置是否显示编辑和排序,还有是否展示地址
		$sql	= "select id,preid,title from doc_document where enable = 0 order by sort desc ,id";
		$_rc	= $this->db->getall($sql,'id');		//所有的数据
		$data['_rc'] = $_rc;




		$this->load->view('Doc/vset_edit',$data);
	}

	//=============================================================
	//设置
	public function vset_addnew(){
		//功能 :设置是否显示编辑和排序,还有是否展示地址
		$this->load->view('Doc/vset_addnew',$data);
	}

	public function vset_addnew_exc(){
		//doc_document add
		$rc['preid'] 	= $_POST['bguishu'];
		$rc['title'] 	= trim($_POST['btiaoti']);
		$rc['content'] 	= $_POST['bnr'];
		$rc['url'] 		= $_POST['burl'];
		if(empty($rc['title']))	{
			echo json_encode(array("code"=>"-200","msg"=>'标题必须填写'));
			exit;
		}
		$this->db->autoExecute("doc_document",$rc,'INSERT');
		echo json_encode(array("code"=>"200","msg"=>'完成'));
		exit;
	}





}




