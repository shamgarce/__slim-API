<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Man extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 *        http://example.com/index.php/welcome
	 *    - or -
	 *        http://example.com/index.php/welcome/index
	 *    - or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct()
	{
		parent::__construct();
		//连接数据库================================================
		define('MBASE', dirname(__FILE__)."\\".'lib');	//v31 EASY的绝对路径
		include(MBASE.'\Mysql.class.php');
		$this->db = Mysql::getInstance();
		//连接数据库================================================
	}

	public function r($id)
	{
		//根据id读取信息返回
		$sql = "select `response` from userapi where id = $id";
		$res= $this->db->getone($sql);
		$res = str_replace(" ","",$res);
		$res = str_replace("\n","",$res);
		$res = str_replace("\r","",$res);
		echo $res;
		exit;
	}

	public function Docview($num = 0)
	{
		$sql = "select * from userapi where id = $num";
		$data['row'] = $this->db->getrow($sql);
		$data['id'] = $num;
		$this->load->view('Man/Man_docview',$data);
	}


	//主要的管理界面
	public function doc()
	{
		$rc = $this->db->getall("select * from userapi");
		$data['msg'] = "默认m";
		$data['rc'] = $rc;
		$this->load->view('Man/Man_doc',$data);
	}



	//主要的管理界面
	public function index()
	{
		$rc = $this->db->getall("select * from userapi");
		$data['msg'] = "默认m";
		$data['rc'] = $rc;
		$this->load->view('Man/Man_index',$data);
	}

	//添加新的接口
	public function addnew()
	{
		//==========================================================
		$this->load->view('Man/Man_addnew',$data);
	}



	//编辑接口
	public function edit($id)
	{
		//对该ID进行编辑
		$data['row'] = $this->db->getrow("select * from userapi where id = $id");
		//==========================================================
		$this->load->view('Man/Man_edit',$data);
	}
	//编辑接口操作
	public function edit_exec()
	{

		//$rc['id'] = $_POST['id'];
		$rc['v']		= $_POST['v'];
		$rc['api']		= $_POST['api'];
		$rc['ys'] 		= $_POST['ys'];
		$rc['dis'] 		= $_POST['dis'];

		$rc['name'] 	= $_POST['name'];

		$rc['request'] 	= stripslashes($_POST['request']);
		$rc['response'] = stripslashes($_POST['response']);
		$rc['request'] = str_replace("'","\"",$rc['request']);
		$rc['response'] = str_replace("'","\"",$rc['response']);
		$rc['request'] 	= addslashes($rc['request']);
		$rc['response'] = addslashes($rc['response']);

		$rc['enable'] 	= $_POST['enable']==1?true:false;
		$rc['debug'] 	= $_POST['debug']==1?true:false;

		$this->db->autoExecute('userapi',$rc,'UPDATE',"ID = {$_POST['id']}");
		$res['code'] = 200;
		$res['msg'] ='完成';
		echo json_encode($res);

	}


	public function changedebug($id,$rel)
	{
		$rc['debug'] = $rel;
		$this->db->autoExecute('userapi',$rc,'UPDATE',"ID = $id");
		$res['code'] = 200;
		$res['msg'] ='完成';
		echo json_encode($res);
		//==========================================================
	}


	//获得api接口示例代码
	public function apicode()
	{
		echo 'no';
		//==========================================================
		$this->load->view('Man/Man_code',$data);
	}

	//添加操作的执行
	public function addnew_exc()
	{

		$rc['v']  	= $_POST['addnew_v'];
		$rc['api']  = $_POST['addnew_api'];
		$rc['ys'] 	= $_POST['addnew_ys'];
		$rc['dis'] = $_POST['addnew_dis'];
		$rc['enable'] 	= $_POST['enable'];
		$rc['debug'] 	= $_POST['debug'];

		$rc['name']  = $_POST['addnew_ypiname'];

		$rc['request'] 	= stripslashes($_POST['addnew_apirequest']);
		$rc['response'] = stripslashes($_POST['addnew_apiresponse']);
		$rc['request'] = str_replace("'","\"",$rc['request']);
		$rc['response'] = str_replace("'","\"",$rc['response']);
		$rc['request'] 	= addslashes($rc['request']);
		$rc['response'] = addslashes($rc['response']);


		$this->db->autoExecute('userapi',$rc,'INSERT');
		$res['code'] = 200;
		$res['msg'] ='完成';
		echo json_encode($res);

	}

	//=============================================================
	//模块管理界面
	//=============================================================
	public function model()
	{
		$rc = $this->db->getall("select * from user_model order by m");

		//==========================================================
		$data['rc'] = $rc;
		$this->load->view('Man/Man_model',$data);
	}

	//添加模块 - 执行
	public function Model_add_exe()
	{
		$rc['v'] = $_POST['model_v'];
		$rc['m'] = $_POST['model_m'];
		$rc['a'] = $_POST['model_a'];

		$this->db->autoExecute('user_model',$rc,'INSERT');
		$res['code'] = 200;
		$res['msg'] ='完成';
		echo json_encode($res);
	}

	//添加模块
	public function model_add()
	{
		$this->load->view('Man/Man_model_add');
	}


	public function Model_del_exc()
	{
		$id = $_POST['id'];
		$this->db->query("delete from user_model where id = $id");

		$res['code'] = 200;
		$res['msg'] ='完成';
		echo json_encode($res);
	}



}



/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */