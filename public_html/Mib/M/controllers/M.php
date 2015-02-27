<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M extends CI_Controller
{


	function __construct()
	{
		parent::__construct();
		//连接数据库================================================两种方式都可以
//		include(FCPATH.APPPATH.'libraries\Db.php');
//		$this->db = Db::getInstance();
		//连接数据库================================================
		$this->load->library('Db');			//数据库
	}


    //主要的管理界面
    public function index()
    {

        $this->load->view('M/M_index',$data);
    }

    //设置界面
    public function setup()
    {
        include 'Config/Set.php';
        $ar = array();
        for($i=1;$i<$num+1;$i++){
           array_push($ar,$i);
        }
        array_push($ar,19);
        array_push($ar,20);

        $this->load->library('Fun');			//数据库
        $ars = $this->fun->getstr($ar);
        $sql = "select * from  doc_metro_group where groupid in($ars)";
        $rc = $this->db->getall($sql);

        $data['rc'] = $rc;
        $data['num'] = $num;


        $this->load->view('M/M_setup',$data);
    }

    //设置界面
    public function setup_setgroupnum($num)
    {
        $num = intval($num);

        $content = '<' . "?php\r\n" .
                    '$num = ' . $num . ";\r\n".
                    "\r\n?" . '>';
        @file_put_contents('Config/Set.php', $content);

        //19 有效
        //其他有效
        //============================================================
        //缺少的加上
        $sql = "update doc_metro_group set enable = 0 where groupid<>19";
        $this->db->query($sql);
        for($i=1;$i<$num+1;$i++){
            $sql = "update doc_metro_group set enable = 1 where groupid = $i";
            $this->db->query($sql);
        }

        $rs['code'] = 200;
        $rs['msg'] = '提交成功';
        echo json_encode($rs);
    }



}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */