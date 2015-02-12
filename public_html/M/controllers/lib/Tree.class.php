<?php
//模拟PHP无限分类查询结果
/*
include('_Tree.class.php');
$Tree=new Tree($result);
$leaf = $Tree->leaf(2);
$level = $Tree->leaf_level(2);
$nav = $Tree->navi(12);
$fi = $Tree->leafid(0);
*/

class  Tree{
	private $result;            //需要处理的数据
    private $tmp;               //临时数据,保存有所有节点的子节点
    private $tmplevel;               //临时数据保存层级
    private $arr;
    private $already = array();//临时
    private $par = array();    //所有 有child的id集合

    /**
     * 构造函数
     * @param array $result 树型数据表结果集
     * @param array $fields 树型数据表字段，array(分类id,父id)
     * @param integer $root 顶级分类的父id
     */
    public function __construct($result,$fields = array('id', 'preid')) {
        $this->tmplevel = 0;
        $this->result = $result;
        $this->fields = $fields;        //$this->fields[1]
        //$this->root = 0;
        $this->handler();
    }

    /**
     * 树型数据表结果集处理
     */
    private function handler() {

        //首先,改写源数据,查找叶子
        foreach ($this->result as $node) {
            array_push($this->par,$node[$this->fields[1]]);                                        //获取所有的非叶子id
            $_result[$node[$this->fields[0]]] = $node;
        }
        $this->result = $_result;

        foreach ($this->result as $key=>$node) {
            if(!in_array($node[$this->fields[0]],$this->par))   $this->result[$key]['_leaf'] = 1;   //标记叶子
            $_tmp[$node[$this->fields[1]]][] = $this->result[$key];                                 //非叶子的child数据
        }

        //purefather 检查
        foreach($_tmp as $key => $value){
            $purefather = true;
            foreach($value as $k=>$v){
                if(!$v['_leaf']) $purefather = false;
            }
            if($purefather) $this->result[$key]['_pure'] = 1;
        }

        foreach ($this->result as $node) {
            $tmp[$node[$this->fields[1]]][] = $node;                                 //建立新的tmp
        }
        krsort($tmp);	//排序

        unset($_result);
        unset($_tmp);

        for ($i = count($tmp); $i > 0; $i--) {		//对temp进行循环
            foreach ($tmp as $k => $v) {			//遍历temp的元素值
                if (!in_array($k, $this->already)) {
                    if (!$this->tmp) {
                        $this->tmp = array($k, $v);
                        $this->already[] = $k;
                        continue;
                    } else {
                        foreach ($v as $key => $value) {
                            if ($value[$this->fields[0]] == $this->tmp[0]) {
                                $tmp[$k][$key]['child'] = $this->tmp[1];
                                $this->tmp = array($k, $tmp[$k]);		//递归形成数据
                            }
                        }
                    }
                }
            }
            $this->tmp = null;
        }
        $this->tmp = $tmp;
    }

    /**
     * 反向递归 从叶子到根
     */
    private function recur_n($arr, $id) {
        foreach ($arr as $v) {
            if ($v[$this->fields[0]] == $id) {
                $this->arr[] = $v;
                if ($v[$this->fields[1]] != 0) $this->recur_n($arr, $v[$this->fields[1]]);
            }
        }
    }
    /**
     * 正向递归 从根到叶子
     */
    private function recur_p($arr) {
        foreach ($arr as $v) {
            $this->arr[] = $v[$this->fields[0]];
            if ($v['child']) $this->recur_p($v['child']);
        }
    }

    //获取一个叶子
    public function leaf($id = null) {//获得叶子数据 [_pure][_leaf]
        if(!$this->_leaf[$id])  $this->_leaf($id);
        return $this->_leaf[$id];
    }

    /**
     * @param integer $id 分类id
     * @return array 返回分支，默认返回整个树
     */
    private function _leaf($id = null) {
        $id = ($id == null) ? 0 : $id;
        $this->_leaf[$id] =$this->tmp[$id];
    }

    //==========================================================
    //对该结果进行层级计算
    public function leaf_level($id = null,$chr='└─') {
        if(!$this->_leaf_level[$id])  $this->_leaf_level($id,$chr);
        return $this->_leaf_level[$id];
    }


    //==========================================================
    //对该结果进行层级计算
    public function _leaf_level($id = null,$chr='└─') {
        if(!$this->_leaf[$id])  $this->_leaf($id);
        $arr = $this->get_leaf_level($this->_leaf[$id],0,$chr);             //数据,初始数字
        $this->_leaf_level[$id] = $arr ;             //return $arr;
    }

    public function getlist()
    {
        foreach($this->list as $key=>$value){
            unset($this->list[$key]['child']);
        }
        return $this->list;
    }

    private function get_leaf_level($arr, $num,$chr = '└─') {
        foreach ($arr as $k=>$v) {
            $arr[$k]['_level'] = $num +1;
            //----------------------------------------
            $chr_ = '';
            for($i=0;$i<$num+1;$i++){
                $chr_  .= "&nbsp;&nbsp;";
            }
            $arr[$k]['_vchr'] = $chr_.$chr;
            //----------------------------------------
        }
        foreach ($arr as $k=>$v) {
            $this->list[] =  $v;
            if(!empty($arr[$k]['child'])){
                $arr[$k]['child'] = $this->get_leaf_level($v['child'],$v['_level'],$chr);
            }
        }
        return $arr;
    }
    //==========================================================

    /**
     * 导航 一维数组
     *
     * @param integer $id 分类id
     * @return array 返回单线分类直到顶级分类
     */
    public function navi($id) {
        $this->arr = null;
        $this->recur_n($this->result, $id);
        krsort($this->arr);
        return $this->arr;
    }
    /**
     * 散落 一维数组
     *
     * @param integer $id 分类id
     * @return array 返回leaf下所有分类id
     */
    public function leafid($id) {
        $this->arr = null;
        $this->arr[] = $id;
        $this->recur_p($this->leaf($id));
        return $this->arr;
    }

//leaf 列表显示 层级还没有 需要计算
//怎么计算层级


}
