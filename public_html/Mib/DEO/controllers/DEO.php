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
		header("Location: /DEO/user");
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

		if($_COOKIE['deo_shangchuan'] != 1){
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

		$data['fff'] = array(
			'0'=>'否',
			'1'=>'是'
		);


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

	public function edit_do($uid)
	{
//		uid
//		Avatarar
//		up
//		MANAGER
		$fi = array("user_login"=>$_POST['uid']);
		$row = $this->S->mdb->findOne("dy_user",$fi);


		$row['category'] =$_POST['up'];


		$this->S->mdb->update("dy_user", $fi, $row);


		$res['code'] = 100;
		$res['msg'] = '操作成功';
		echo json_encode($res);
		exit;


	}

	public function edit_user($uid)
	{



		$fi = array("user_login"=>$uid);
		$row = $this->S->mdb->findOne("dy_user",$fi);


//		print_r($row);





		//====================================================
		//$this->S->mdb->update("dy_user", $fi, $row);

		$data['row'] = $row;

		$data['ulogin'] = $uid;
		$this->load->view('DEO/DEO_edit_user.php', $data);
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


		$dic1 = $this->dic_gn_main();
		$dic = $this->dic_gn_ex();

//抽样现场
		$data['dic1'] = $dic1;		//字典
		$data['dic'] = $dic;		//字典
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


		$dic1 = $this->dic_gw_main();
		$dic = $this->dic_gw_ex();



		$data['dic1'] = $dic1;		//字典
		$data['dic'] = $dic;		//字典
		$this->load->view('DEO/DEO_guowai', $data);
	}

	public function output_gn($oddid)
	{

		$fi = array('SampleFormNumber'=>$oddid);
		$rc = $this->S->mdb->find("dy_zh_SampleForm",$fi);
		$mc = $rc[0];
		UNSET($mc['_id']);
//print_r($rc);
//		exit;
		//dy_zh_SampleCondition
		$fi = array('odd_id'=>$oddid);
		$rc_con = $this->S->mdb->find("dy_zh_SampleCondition",$fi);

		$dic1 = $this->dic_gn_main();
		$dic = $this->dic_gn_ex();


		$resultPHPExcel = $this->S->PHPExcel;

		$resultPHPExcel->getActiveSheet()->setCellValue('A1', '节点');
		$resultPHPExcel->getActiveSheet()->setCellValue('C1', '值');
		$i = 2;
		foreach($mc as $key=>$item){
			$resultPHPExcel->getActiveSheet()->setCellValue('A' . $i, $dic1[$key]);
			if(!is_array($item))
			{
				$resultPHPExcel->getActiveSheet()->setCellValue('C' . $i, (string)$item);
			}
			ELSE
			{

				foreach($item as $key2=>$value2)
				{
					$resultPHPExcel->getActiveSheet()->setCellValue('B' . $i, $dic[$key][$key2]);
					if(!is_array($value2))
					{
						$resultPHPExcel->getActiveSheet()->setCellValue('C' . $i, (string)$value2);
					}
					$i ++;
				}
			}
			$i ++;
		}

		//CONDICTION
		foreach($rc_con as $k=>$v){
			UNSET($v['_id']);
			foreach($v as $key=>$value){
				$resultPHPExcel->getActiveSheet()->setCellValue('A' . $i, $key);
				$resultPHPExcel->getActiveSheet()->setCellValue('C' . $i, (string)$value);
				$i ++;
			}
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
		$fi = array('SampleFormNumber'=>$oddid);
		$rc = $this->S->mdb->find("dy_SampleForm",$fi);
		$mc = $rc[0];
		UNSET($mc['_id']);
//print_r($rc);
//		exit;
		//dy_zh_SampleCondition
		$fi = array('odd_id'=>$oddid);
		$rc_con = $this->S->mdb->find("dy_SampleCondition",$fi);

		$dic1 = $this->dic_gw_main();
		$dic = $this->dic_gw_ex();


		$resultPHPExcel = $this->S->PHPExcel;

		$resultPHPExcel->getActiveSheet()->setCellValue('A1', '节点');
		$resultPHPExcel->getActiveSheet()->setCellValue('C1', '值');
		$i = 2;
		foreach($mc as $key=>$item){
			$resultPHPExcel->getActiveSheet()->setCellValue('A' . $i, $dic1[$key]);
			if(!is_array($item))
			{
				$resultPHPExcel->getActiveSheet()->setCellValue('C' . $i, (string)$item);
			}
			ELSE
			{

				foreach($item as $key2=>$value2)
				{
					$resultPHPExcel->getActiveSheet()->setCellValue('B' . $i, $dic[$key][$key2]);
					if(!is_array($value2))
					{
						$resultPHPExcel->getActiveSheet()->setCellValue('C' . $i, (string)$value2);
					}
					$i ++;
				}
			}
			$i ++;
		}

		//CONDICTION
		foreach($rc_con as $k=>$v){
			UNSET($v['_id']);
			foreach($v as $key=>$value){
				$resultPHPExcel->getActiveSheet()->setCellValue('A' . $i, $key);
				$resultPHPExcel->getActiveSheet()->setCellValue('C' . $i, (string)$value);
				$i ++;
			}
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


























	public function dic_gn_main()
	{
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
		return $dic1;
	}
	public function dic_gn_ex()
	{
		$dic['inLandSampleSpot'] = array(
			"saleUsedState"		=> '销售使用状态',
			"sampleSpot"		=> '抽样地点',
			"unitsNumber"		=> '件数',
			"saledPrice"		=> '已售总价',
			"storeTemperature"	=> '仓储温度',
			"priceUnit"			=> '出厂价格单位',
			"stockAmount"		=> '库存数量',
			"salePricePerUnit"	=> '销售单价',
			"storeHnmidity"		=> '仓储湿度',
			"pricePerUnit"		=> '出厂单价',
			"stockAmountUnit"	=> '库存数量单位',
			"storeSpotCategory"	=> '存货点分类',
			"saleTotalPrice"	=> '已售总价',
			"productAmountUnit"	=> '生产数量单位',
			"storeSpot"			=> '存货地点',
			"sampledDepartmentNature"=> '被抽单位性质',
			"productAmount"		=> '生产数量',
			"totalPrice"		=> '总价',
		);

//药品信息
		$dic['inLandPhaInformation'] = array(
			"productDepartmentPostCode"		=> '生产单位邮编',
			"storeCondition"		=> '贮藏条件',
			"validityPeriod"		=> '效期',
			"productDepartment"		=> '生产单位',
			"approvalNumber"		=> '批准文号',
			"lotNumber"		=> '批号',
			"doseModel"		=> '剂型',
			"chinessName"		=> '中文名称',
			"englishName"		=> '英文名称',
			"shelfLife"		=> '保质期',
			"phaName"		=> '商品名称',
			"executiveStandard"		=> '执行标准',
			"preparationGuiGe"		=> '制剂规格',
			"productDepartmentAddress"		=> '生产单位地址',
			"packageGuiGe"		=> '包装规格',
		);

//包装情况
		$dic['inLandPackageCondition'] = array(
			"middlePackage"		=> '中包装',
			"noBorer"		=> '无蛀虫',
			"noMildeu"		=> '无霉变',
			"leastInPackage"		=> '最小内包装',
			"sealing"		=> '封装牢固',
			"packageNoDamaged"		=> '包装无破损',
			"inPackage"		=> '内包装',
			"noPollution"		=> '无污染',
			"smallPackage"		=> '小包装',
			"noWaterPrint"		=> '无水迹',
		);

//基本信息
		$dic['inLandBasicInformation'] = array(
			"checkInstitution"		=> '检验机构',
			"phaIngredient"		=> '药用原料',
			"phaPreparations"		=> '药品制剂',
			"taskCategory"		=> '任务类别',
			"comment"		=> '备注',
			"sampleGoal"		=> '抽样目的',
			"specialPha"		=> '特别药品',
			"basePharmaceutical"		=> '基础药物',
		);

//执法单位签字
		$dic['inLandEnforcementUnitSign'] = array(
			"sampleDepartmentHandler"		=> '抽样单位经手人',
			"sampleDate"		=> '抽样日期',
			"sampleDepartmentPhone"		=> '抽样单位电话',
			"sampleDepartment"		=> '抽样单位',
		);

//监管相对人
		$dic['inLandSupervoseOfferee'] = array(
			"productionLicense"		=> '规范证书号',
			"enforceInstruction"		=> '执法说明',
			"businessLicense"		=> '营业执照',
			"telephone"		=> '电话',
			"legalPerson"		=> '法人',
			"svoCategory"		=> '监管相对人分类',
		);

//监管相对人签字
		$dic['inLandSuperviseOffereeSign'] = array(
			"sampledDepartmentHandlerPhone"		=> '被抽样单位经手人电话',
			"sampledDepartmentHandler"		=> '被抽样单位经手人',
			"sampledDepartmentPostCode"		=> '被抽样单位邮编',
			"sampledDepartmentPhone"		=> '被抽样单位电话',
			"sampledDepartment"		=> '被抽样单位',
		);

//抽样情况
		$dic['inLandSampleCondition'] = array(
			"sampleUnit"		=> '样品单位',
			"SampleNumber"		=> '抽样数量',
			"sampleIncludeMaterial"		=> '样品内包材',
			"sampleUnitsNumber"		=> '抽样件数',
		);
		return $dic;
	}

	public function dic_gw_main()
	{
		$dic1 = array(
			"othersInformation"	=>	"其他信息",
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
		$dic1['checkDepartment'] = '抽样单位';
		return $dic1;
	}
	public function dic_gw_ex()
	{

//qita
		$dic['othersInformation'] = array(
			"shangPinDanJia"	=>	"商品单价",
			"sellerDepartment"	=>	"卖方单位",
			"tongGuanDanHao"	=>	"通关单号",
			"suiHuoWu"	=>	"随货物",
			"kouAnJu"	=>	"口岸局",
			"shouHuoDepartment"	=>	"收货单位",
			"jinKouKouAn"	=>	"进口口岸",
			"shangPinCode"	=>	"商品编码",
			"tiYunDanHao"	=>	"提运单号",
			"maiFangDepartment"	=>	"买方单位",

		);
//药品信息
		$dic['pharmaceuticalInforamation'] = array(
			"storeConditionl"	=>	"贮藏条件",
			"chineseName"	=>	"中文名称",
			"validityPeriod"	=>	"效期",
			"productDepartment"	=>	"生产单位",
			"lotNumber"	=>	"批号",
			"doseModel"	=>	"剂型",
			"checkInformNumber"	=>	"检验通知单号",
			"productRegion"	=>	"产地",
			"englishName"	=>	"英文名称",
			"teJinXuKe"	=>	"特药进口许可证号",
			"compactNumber"	=>	"合同号",
			"specification"	=>	"规格",
			"pharmaceuticalName"	=>	"商品名称",
			"registerNumber"	=>	"注册证号",

		);
//抽样单位
		$dic['sampleDepartment'] = array(

			"sampleDepartmentHandler"	=>	"抽样单位经手人",
			"sampleDate"	=>	"抽样日期",
			"sampleDepartmentPhone"	=>	"抽样单位电话",
			"sampleDepartment"	=>	"抽样单位",

		);

//抽样情况
		$dic['sampleCondition'] = array(
			"sampleUnit"	=>	"样品单位",
			"checkNumber"	=>	"报验数量",
			"sampleNumber"	=>	"抽样数量",
			"sampleIncludeMaterial"	=>	"样品内包材",
			"sampleUnitsNumber"	=>	"抽样件数",

		);



//抽样现场
		$dic['sampleSpot'] = array(
			"samplePlace"	=>	"抽样地点",
			"storeTemperature"	=>	"仓储温度",
			"storePlace"	=>	"存货地点",
			"storeHnmidity"	=>	"仓储湿度",
		);

//标签核对
		$dic['labelCheck'] = array(
			"others"	=>	"其他",
			"unitsNumber"	=>	"件数",
			"validityPeriod"	=>	"有效期",
			"productDepartment"	=>	"生产厂商",
			"packageGuiGe"	=>	"包装规格",
			"specification"	=>	"规格",
			"pharmaceuticalName"	=>	"品名",
			"number"	=>	"数量",
			"lotNumber"	=>	"批号",
			"registerNumber"	=>	"注册证号",
		);

//包装情况
		$dic['packageCondition'] = array(
			"inPackageMaterial"	=>	"内包材料",
			"outPackageMaterial"	=>	"外包材料",
			"sealing"	=>	"封固",
			"outPackage"	=>	"外包装",
		);

		$dic['checkDepartment'] = array(
			"checkDepartmentPhone"	=>	"抽样单位电话",
			"checkDepartmentHandler"	=>	"抽样单位负责人",
			"checkDepartment"	=>	"抽样单位",
		);
		return $dic;
	}


}





