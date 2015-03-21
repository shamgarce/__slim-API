<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class W extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->S = new Set();		//里面包含系列的单例对象
	}

	//可编辑的首页,在适当的位置会有个edit标签		首页 是一个封面
	public function index()
	{
		$nodeid = 197;			//背诵和记忆单元

		//=============================================
		$sql	= "select id,preid,title from doc_document where enable = 0 order by sort desc ,id";
		$_rc	= $this->S->db->getall($sql,'id');		//所有的数据

		$this->load->library('tree',$_rc);
		$leaf = $this->tree->leaf($nodeid);
		$data['leaf'] = $leaf;

//		//=============================================================
//		//本页内容
		$sql	= "select * from doc_document where (preid = $nodeid) AND enable = 0 order by sort desc ,id";
		$mast	= $this->S->db->getall($sql);		//所有的数据
		$data['mast'] = $mast;

		foreach($mast as $key=>$value){
			$_id[] = $value['id'];
		}

		$ids = Set::getstr($_id,0,',');
		empty($ids) && $ids = "9999999999";
		$sql	= "select * from doc_document where id in($ids) or preid in($ids) order by sort desc ,id";
		$mc	= $this->S->db->getall($sql,'id');		//所有的数据



//print_r($mc);
		$data['mc'] = $mc;
//		//=============================================================
		$this->load->view('W/W_index',$data);

	}





}




