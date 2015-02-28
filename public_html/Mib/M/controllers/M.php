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
    public function setup_group_sort_exc(){
        $setgroup_sort = $_POST['setgroup_sort'];


        foreach($setgroup_sort as $key=>$value){

            $this->db->autoexecute('doc_metro',$value,'UPDATE',"id=$key");
        }

        $rs['code'] = 200;
        $rs['msg'] = '提交成功';
        echo json_encode($rs);

    }


    public function setup_group($groupid){
        $this->load->helper('cookie');

        $groupid = intval($groupid);
        $sql = "select * from doc_metro_group where groupid = $groupid";
        $row = $this->db->getrow($sql);

        //检索出该分组id的瓷片数据
        $sql = "select * from doc_metro
                where groupid = $groupid and enable = 1
                order by sort desc";
        $rc = $this->db->getall($sql);

        $data['row'] = $row;
        $data['rc'] = $rc;

        $this->load->view('M/M_setup_group',$data);
    }
    public function view($nodeid)
    {

        //=============================================================
        $listid = intval($nodeid);
        $sql	= "select id,preid,title,titleonly from doc_document where enable = 0 order by sort desc ,id";
        $_rc	= $this->db->getall($sql,'id');		//所有的数据

        $this->load->library('tree',$_rc);

        $leaf = $this->tree->leaf($listid);
        $data['leaf'] = $leaf;
//		$level = $Tree->leaf_level($listid);
        $nav = $this->tree->navi($listid);
        $data['nav'] = $nav;

        //=============================================================
        //整课树的运算  第一,运算处小树枝 第二 运算出是否叶子

        $_rc['id'] = 0;
        $_rc['title'] = '根';

        //=============================================================
        $data['listid'] = $listid;		//跟本id同级,以及下级的
        //=============================================================
        //本页内容
        $sql	= "select * from doc_document where (id = $listid) AND enable = 0 order by sort desc ,id";
        $mcmain	= $this->db->getRow($sql);		//所有的数据

        $sql	= "select * from doc_document where (preid = $listid) AND enable = 0 order by sort desc ,id";
        $mc	= $this->db->getall($sql,'id');		//所有的数据

        $data['mcmain'] = $mcmain;
        $data['mc'] = $mc;
        //=============================================================

        $this->load->helper('cookie');
        $this->load->view('M/M_view',$data);
    }

    public function tnode($nodeid=0){

        $nodeid = intval($nodeid);
        //=============================================
        $sql	= "select id,preid,title,titleonly from doc_document where enable = 0 order by sort desc ,id";
        $_rc	= $this->db->getall($sql,'id');		//所有的数据
        $this->load->library('tree',$_rc);
        $leaf = $this->tree->leaf($nodeid);
        $data['leaf'] = $leaf;

        $level = $this->tree->leaf_level($nodeid);
        $nav = $this->tree->navi($nodeid);
        $data['nav'] = $nav;


        $this->load->helper('cookie');
        $this->load->view('M/M_tnode',$data);
    }

    public function tree_ext($leaf)
    {
        if(empty($leaf['child'])){
            return "<li><a href=\"/M/show/{$leaf['id']}\">{$leaf['title']}</a></li>\r\n";
        }else{
            if($leaf[_pure]==1){
                $html = "<li class=\"node collapsed\"><a href=\"/M/show/{$leaf['id']}\"><span class=\"node-toggle padding10\"></span>".$leaf['title']."</a>
    <ul>"."\n\r";
            }else{
                $html = "<li class=\"node collapsed\"><a href=\"/M/tnode/{$leaf['id']}\"><span class=\"node-toggle padding10\"></span>".$leaf['title']."</a>
    <ul>"."\n\r";
            }
            $html_ = '';
            foreach($leaf['child'] as $key=>$value){
                $html_ .=$this->tree_ext($value);
            }
            $html .= $html_;
            $html .= "
    </ul>
</li>"."\r\n";
            return $html;
        }
    }

    public function tree(){
        //=============================================================
        $sql	= "select id,preid,title,titleonly from doc_document where enable = 0 order by sort desc ,id";
        $_rc	= $this->db->getall($sql,'id');		//所有的数据
        $this->load->library('tree',$_rc);
        $leaf = $this->tree->leaf(0);
        $data['leaf'] = $leaf;
        //=============================================================
        //整课树的运算  第一,运算处小树枝 第二 运算出是否叶子
       // print_r($leaf);
//print_r($leaf['child']);
        //用递归计算
        $html =  '<ul class="treeview" data-role="treeview">'."\r\n";

        foreach($leaf['child'] as $key=>$value){
            $html .= $this->tree_ext($value);
        }
        $html .= "</ul>\r\n".'';

        $data['html'] =  $html;
//echo $html;

        $this->load->helper('cookie');
        $this->load->view('M/M_tree',$data);
    }



    //设置界面
    public function setup()
    {
        $this->load->helper('cookie');
        $this->load->library('Fun');			//函数库
        include 'Config/Set.php';
        $ar = array();
        for($i=1;$i<$num+1;$i++){
           array_push($ar,$i);
        }
        array_push($ar,19);
        array_push($ar,20);


        $ars = $this->fun->getstr($ar);
        $sql = "select * from  doc_metro_group where groupid in($ars)";
        $rc = $this->db->getall($sql);

        $data['rc'] = $rc;
        $data['num'] = $num;


        $this->load->view('M/M_setup',$data);
    }

    public function setup_group_edit_exc()
    {
//edbrand	44444444444
//edcolor	bg-magenta
//edcontent	544455555555
//edgroupid	11111
//edicon	icon-briefcase-2
//edid	6
//edpic	/A/upload/CR-UMnZfet6Cy.jpg
//edtitle	111111111111111111
//edwg	2111111111

        $id = intval($_POST['edid']);

        $rc['groupid'] = $_POST['edgroupid'];
        $rc['title']    = $_POST['edtitle'];
        $rc['wg']       = $_POST['edwg'];
        $rc['color']    = $_POST['edcolor'];
        $rc['icon']     = $_POST['edicon'];

        $rc['img']      = $_POST['edpic'];
        $rc['brand']    = $_POST['edbrand'];
        $rc['content']  = $_POST['edcontent'];
        $rc['url']      = $_POST['edurl'];


        $rc['cpcode']   = $_POST['11111'];        //计算组合

        //获取nodeid[构建url]
        if(empty($rc['url'])){
            $nodeid = $this->db->getone("select docid from doc_metro where id = $id");
            if(!empty($nodeid)){
                $rc['url'] = '/M/treeview/'.$nodeid;
            }
        }

        //拼接瓷片
        $rc['cpcode']  = '<a {url} class="tile {wg} {color}" data-click="transform">
            {content}
            {brand}
        </a>';
        $url = !empty($rc['url'])?"href=\"{$rc['url']}\"":'';
        $rc['cpcode'] = str_replace('{url}',    $url,       $rc['cpcode']);
        $rc['cpcode'] = str_replace('{brand}',  $rc['brand'],$rc['cpcode']);
        $rc['cpcode'] = str_replace('{content}',$rc['content'],$rc['cpcode']);
        $rc['cpcode'] = str_replace('{wg}',     $rc['wg'],$rc['cpcode']);
        $rc['cpcode'] = str_replace('{color}',  $rc['color'],$rc['cpcode']);
        $rc['cpcode'] = str_replace('{img}',  $rc['img'],$rc['cpcode']);
        $rc['cpcode'] = str_replace('{icon}',  $rc['icon'],$rc['cpcode']);

        //doc_metro
        $this->db->autoexecute('doc_metro',$rc,'update',"id=$id");
        $rs['code'] = 200;
        $rs['msg'] = '提交成功';
        echo json_encode($rs);
    }

    public function setup_group_edit($id)
    {
        $id = intval($id);
        $sql = "select * from doc_metro where id = $id";
        $rc = $this->db->getrow($sql);
//print_r($rc);
        $data['rc'] = $rc;
        $this->load->view('M/M_setup_group_edit',$data);
    }


    public function setup_groupinfo_exc()
    {
        $groupvar = $_POST['groupvar'];
        foreach($groupvar as $key=>$value){
            $this->db->autoexecute('doc_metro_group',$value,'UPDATE',"groupid=$key");
        }

        $rs['code'] = 200;
        $rs['msg'] = '提交成功';
        echo json_encode($rs);
        //print_r($groupvar);
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