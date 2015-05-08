<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DEO extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('cookie');		//
		$this->S = new Seter();        //里面包含系列的单例对象
		$this->logininfo['username'] = 'admin';
		$this->logininfo['password'] = 'admin';
	}


	//是否登陆监测
	public function login_check(){
		if($_COOKIE['deo_admin'] == $this->logininfo['username']){
			//return true;
		}else{
			//Seter::
			header("Location: /DEO/LOGIN");
			exit;
			//die('<a href="/DEO/LOGIN">sing in</a>');
		}
	}


	public function login_exc(){
		$username 		= $_POST['username'];
		$password 		= $_POST['password'];

		if($this->logininfo['username'] == $username && $this->logininfo['password'] == $password){
			$this->input->set_cookie("deo_admin",$username,86500);
			$res['code'] = 100;
			$res['msg'] = '登陆成功';
		}else{
			$res['code'] = -100;
			$res['msg'] = '登陆失败';
		}
		echo json_encode($res);
		exit;
	}

	public function login()
	{
		$this->load->view('DEO/DEO_login', $data);
	}

	public function loginout()
	{
		$this->input->set_cookie("deo_admin",'--',86500);
		header("Location: /DEO/LOGIN");
		exit;
	}


	public function index()
	{
		$this->login_check();
		//首页
		//===================================================================

$sql =  "select * from sy_user";
$rc = $this->S->db->getall($sql);



		$this->load->view('DEO/DEO_index', $data);
	}

	public function cflag()
	{
		$this->login_check();


		$fi = array("user_login"=>$_POST['ulogin']);
		$row = $this->S->mdb->findOne("dy_user",$fi);
		$row['enable'] =($_POST['rel']==1)?0:1;


		$this->S->mdb->update("dy_user", $fi, $row);


		$res['code'] = 100;
		$res['msg'] = '操作成功';
		echo json_encode($res);
		exit;




	}

		public function danhao($fistr,$page)
	{
		$this->login_check();

		//$page = intval($_GET['page']);
		$page = intval($page);
		if($page  == 0)$page = 1;
		$pageSize = 30;
		$start= ($page-1)*$pageSize;
		if($start <0)$start = 0;

		$fi["start"] =$start;
		$fi["limit"] =$pageSize;
		$fi["sort"] = array("odd_id"=>-1);

		//条件array()
		switch ($fistr)
		{
			case 'J':
				$fic = array('f'=>'J');
			break;
			case 'G':
				$fic = array('f'=>'G');
			break;
			default:
				$fistr = 'A';
				$fic = array();
			break;
		}

		//$_COOKIE['deo_qiyong']

		if($_COOKIE['deo_qiyong'] == 1){
			$fic['used'] = 1;
		}
		if($_COOKIE['deo_shangchuan'] == 1){
			$fic['up'] = 1;
		}


		$rc = $this->S->mdb->find("dy_typeoddid",$fic,$fi);

		//上一页 下一页计算
		$pre = $page - 1 ;
		$next = $page +1;
		if($pre <=0)$pre = 1;

		$data['pre'] = $pre;
		$data['next'] = $next;


		$data['page'] = $page;
		$data['fic'] = $fistr;


		$data['rc'] = $rc;
		$this->load->view('DEO/DEO_danhao', $data);
	}

	public function user()
	{
		$this->login_check();
		//====================================================

		//====================================================
		$rc = $this->S->mdb->find("dy_user",array());
//print_r($rc);
		//====================================================
		$data['rc'] = $rc;
		$this->load->view('DEO/DEO_user', $data);
	}



	//=========================================================
	//pop窗口
	public function guonei($danhao)
	{
		$this->login_check();
		$fi = array('SampleFormNumber'=>$danhao);
		$rc = $this->S->mdb->find("dy_zh_SampleForm",$fi);

		//dy_zh_SampleCondition
		$fi = array('odd_id'=>$danhao);
		$rc_con = $this->S->mdb->find("dy_zh_SampleCondition",$fi);

		//dy_zh_SampleDepartment
		$fi = array('odd_id'=>$danhao);
		$rc_dep = $this->S->mdb->find("dy_zh_SampleDepartment",$fi);


		$data['rc_dep'] = $rc_dep;		//单号
		$data['rc_con'] = $rc_con;		//单号
		$data['rc'] 	= $rc[0];		//结果集

		$data['danhao'] = $danhao;		//单号



		$dic1 = array(
			"UserName"					=>	"用户",
			"inLandSampleSpot"			=>	"抽样现场",
			"inLandPhaInformation"		=>	"药品信息",
			"inLandPackageCondition"	=>	"包装情况",
			"inLandBasicInformation"	=>	'基本信息',
			"inLandEnforcementUnitSign"	=>	"执法单位签字",
			"inLandSupervoseOfferee"	=>	"监管相对人",
			"inLandSuperviseOffereeSign"=>	"监管相对人签字",
			"OnLine"					=>	"在线？",
			"inLandSampleCondition"		=>	"抽样情况",
			"SampleFormNumber"			=>	"抽样单号",
		);
		//抽样现场
		$dic['inLandSampleSpot'] = array(
			"saleUsedState"		=> '',
			"sampleSpot"		=> '',
			"unitsNumber"		=> '',
			"saledPrice"		=> '',
			"storeTemperature"	=> '',
			"priceUnit"			=> '',
			"stockAmount"		=> '',
			"salePricePerUnit"	=> '',
			"storeHnmidity"		=> '',
			"pricePerUnit"		=> '销售单价',
			"stockAmountUnit"	=> '',
			"storeSpotCategory"	=> '',
			"saleTotalPrice"	=> '已售总价',
			"productAmountUnit"	=> '',
			"storeSpot"			=> '',
			"sampledDepartmentNature"=> '',
			"productAmount"		=> '',
			"totalPrice"		=> '总价',
		);

		//药品信息
		$dic['inLandPhaInformation'] = array(
			"productDepartmentPostCode"		=> '',
			"storeCondition"		=> '',
			"validityPeriod"		=> '',
			"productDepartment"		=> '',
			"approvalNumber"		=> '',
			"lotNumber"		=> '',
			"doseModel"		=> '',
			"chinessName"		=> '',
			"englishName"		=> '',
			"shelfLife"		=> '',
			"phaName"		=> '',
			"executiveStandard"		=> '',
			"preparationGuiGe"		=> '',
			"productDepartmentAddress"		=> '',
			"packageGuiGe"		=> '',
		);

		//包装情况
		$dic['inLandPackageCondition'] = array(
			"middlePackage"		=> '',
			"noBorer"		=> '',
			"noMildeu"		=> '',
			"leastInPackage"		=> '',
			"sealing"		=> '',
			"packageNoDamaged"		=> '',
			"inPackage"		=> '',
			"noPollution"		=> '',
			"smallPackage"		=> '',
			"noWaterPrint"		=> '',
		);

		//基本信息
		$dic['inLandBasicInformation'] = array(
			"checkInstitution"		=> '',
			"phaIngredient"		=> '',
			"phaPreparations"		=> '',
			"taskCategory"		=> '',
			"comment"		=> '',
			"sampleGoal"		=> '',
			"specialPha"		=> '',
			"basePharmaceutical"		=> '',
		);

		//执法单位签字
		$dic['inLandEnforcementUnitSign'] = array(
			"sampleDepartmentHandler"		=> '',
			"sampleDate"		=> '',
			"sampleDepartmentPhone"		=> '',
			"sampleDepartment"		=> '',
		);

		//监管相对人
		$dic['inLandSupervoseOfferee'] = array(
			"productionLicense"		=> '',
			"enforceInstruction"		=> '',
			"businessLicense"		=> '',
			"telephone"		=> '',
			"legalPerson"		=> '',
			"svoCategory"		=> '',
		);

		//监管相对人签字
		$dic['inLandSuperviseOffereeSign'] = array(
			"sampledDepartmentHandlerPhone"		=> '',
			"sampledDepartmentHandler"		=> '',
			"sampledDepartmentPostCode"		=> '',
			"sampledDepartmentPhone"		=> '',
			"sampledDepartment"		=> '',
		);

		//抽样情况
		$dic['inLandSampleCondition'] = array(
			"sampleUnit"		=> '',
			"SampleNumber"		=> '',
			"sampleIncludeMaterial"		=> '',
			"sampleUnitsNumber"		=> '',
		);



















		$data['dic1'] = $dic1;		//字典
		$this->load->view('DEO/DEO_guonei', $data);
	}

	//=========================================================
	//pop窗口
	public function guowai($danhao)
	{
		$this->login_check();
		$fi = array('SampleFormNumber'=>$danhao);
		$rc = $this->S->mdb->find("dy_SampleForm",$fi);

		//dy_zh_SampleCondition
		$fi = array('odd_id'=>$danhao);
		$rc_con = $this->S->mdb->find("dy_SampleCondition",$fi);

		//dy_zh_SampleDepartment
		$fi = array('odd_id'=>$danhao);
//		$rc_dep = $this->S->mdb->find("dy_SampleDepartment",$fi);

//		$data['rc_dep'] = $rc_dep;		//单号
		$data['rc_con'] = $rc_con;		//单号

		$data['danhao'] = $danhao;
		$data['rc'] 	= $rc[0];


		$dic1 = array(
			"othersInformation"	=>	"qita",
			"pharmaceuticalInforamation"		=>	"药品信息",
			"sampleDepartment"		=>	"抽样单位",

			"sampleCondition"					=>	"抽样情况",
			"sampleSpot"			=>	"抽样现场",

			"labelCheck"	=>	"标签核对",
			"packageCondition"	=>	"包装情况",
			"UserName"	=>	'用户',
			"OnLine"					=>	"在线？",
			"SampleFormNumber"			=>	"抽样单号",
		);

		//qita
		$dic['othersInformation'] = array(
			"shangPinDanJia"	=>	"",
			"sellerDepartment"	=>	"",
			"tongGuanDanHao"	=>	"",
			"suiHuoWu"	=>	"",
			"kouAnJu"	=>	"",
			"shouHuoDepartment"	=>	"",
			"jinKouKouAn"	=>	"",
			"shangPinCode"	=>	"",
			"tiYunDanHao"	=>	"",
			"maiFangDepartment"	=>	"",

		);
		//药品信息
		$dic['pharmaceuticalInforamation'] = array(
			"storeConditionl"	=>	"",
			"chineseName"	=>	"",
			"validityPeriod"	=>	"",
			"productDepartment"	=>	"",
			"lotNumber"	=>	"",
			"doseModel"	=>	"",
			"checkInformNumber"	=>	"",
			"productRegion"	=>	"",
			"englishName"	=>	"",
			"teJinXuKe"	=>	"",
			"compactNumber"	=>	"",
			"specification"	=>	"",
			"pharmaceuticalName"	=>	"",
			"registerNumber"	=>	"",

		);
		//抽样单位
		$dic['sampleDepartment'] = array(

			"sampleDepartmentHandler"	=>	"",
			"sampleDate"	=>	"",
			"sampleDepartmentPhone"	=>	"",
			"sampleDepartment"	=>	"",

		);

		//抽样情况
		$dic['sampleCondition'] = array(
			"sampleUnit"	=>	"",
			"checkNumber"	=>	"",
			"sampleNumber"	=>	"",
			"sampleIncludeMaterial"	=>	"",
			"sampleUnitsNumber"	=>	"",

		);



		//抽样现场
		$dic['sampleSpot'] = array(
			"samplePlace"	=>	"",
			"storeTemperature"	=>	"",
			"storePlace"	=>	"",
			"storeHnmidity"	=>	"",
		);

			//标签核对
		$dic['labelCheck'] = array(
			"others"	=>	"",
			"unitsNumber"	=>	"",
			"validityPeriod"	=>	"",
			"productDepartment"	=>	"",
			"packageGuiGe"	=>	"",
			"specification"	=>	"",
			"pharmaceuticalName"	=>	"",
			"number"	=>	"",
			"lotNumber"	=>	"",
			"registerNumber"	=>	"",
		);

		//包装情况
		$dic['packageCondition'] = array(
			"inPackageMaterial"	=>	"",
			"outPackageMaterial"	=>	"",
			"sealing"	=>	"",
			"outPackage"	=>	"",
		);

		$data['dic1'] = $dic1;		//字典
		$this->load->view('DEO/DEO_guowai', $data);
	}

	public function output_gn($oddid)
	{
		echo $oddid;
		exit;




		$resultPHPExcel = $this->S->PHPExcel;

		$resultPHPExcel->getActiveSheet()->setCellValue('A1', '节点一');
		$resultPHPExcel->getActiveSheet()->setCellValue('A1', '节点二');
		$resultPHPExcel->getActiveSheet()->setCellValue('B1', '值');
		$i = 2;
		foreach($data as $item){
			$resultPHPExcel->getActiveSheet()->setCellValue('A' . $i, $item['quarter']);
			$resultPHPExcel->getActiveSheet()->setCellValue('B' . $i, $item['name']);
			$resultPHPExcel->getActiveSheet()->setCellValue('C' . $i, $item['number']);
			$i ++;
		}



		$outputFileName = 'guonei.'.gmdate("D, d M Y H:i:s").'.xls';
		//========================================================
		$xlsWriter = new PHPExcel_Writer_Excel5($resultPHPExcel);
//ob_start(); ob_flush();
		header("Content-Type: application/force-download");
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");
		header('Content-Disposition:inline;filename="'.$outputFileName.'"');
		header("Content-Transfer-Encoding: binary");
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Pragma: no-cache");
		$xlsWriter->save( "php://output" );
	}

	public function output_gw($oddid)
	{

//		$str = 'a:3:{s:3:"GET";a:5:{s:9:"timestamp";s:10:"1431082466";s:8:"deviceid";s:15:"359776055170312";s:3:"and";s:4:"v1.0";s:4:"user";s:8:"Avatarar";s:9:"signature";s:32:"2e35b4468c9b7b09042e72cd5531d98c";}s:5:"FILES";a:0:{}s:4:"POST";a:0:{}}';
//		$str2 = 'a:3:{s:3:"GET";a:5:{s:9:"timestamp";s:10:"1431082783";s:8:"deviceid";s:15:"359776055170312";s:3:"and";s:4:"v1.0";s:4:"user";s:8:"Avatarar";s:9:"signature";s:32:"80eb218115c92babea84e51226cdba2d";}s:5:"FILES";a:1:{s:5:"tfile";a:5:{s:4:"name";s:17:"G462015000004.jpg";s:4:"type";s:0:"";s:8:"tmp_name";s:27:"C:\Windows\Temp\phpE296.tmp";s:5:"error";i:0;s:4:"size";i:68324;}}s:4:"POST";a:0:{}}';
//		$ar = unserialize($str);
//		$ar2 = unserialize($str2);
//
//		echo '<pre>';
//
//		print_r($ar);
//		print_r($ar2);
//		exit;

		$resultPHPExcel = $this->S->PHPExcel;
		$resultPHPExcel->getActiveSheet()->setCellValue('A1', '节点一');
		$resultPHPExcel->getActiveSheet()->setCellValue('A1', '节点二');
		$resultPHPExcel->getActiveSheet()->setCellValue('B1', '值');
		$i = 2;
		foreach($data as $item){
			$resultPHPExcel->getActiveSheet()->setCellValue('A' . $i, $item['quarter']);
			$resultPHPExcel->getActiveSheet()->setCellValue('B' . $i, $item['name']);
			$resultPHPExcel->getActiveSheet()->setCellValue('C' . $i, $item['number']);
			$i ++;
		}




		$outputFileName = 'guowai.'.gmdate("D, d M Y H:i:s").'.xls';
		//========================================================
		$xlsWriter = new PHPExcel_Writer_Excel5($resultPHPExcel);
//ob_start(); ob_flush();
		header("Content-Type: application/force-download");
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");
		header('Content-Disposition:inline;filename="'.$outputFileName.'"');
		header("Content-Transfer-Encoding: binary");
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Pragma: no-cache");
		$xlsWriter->save( "php://output" );
	}

}




