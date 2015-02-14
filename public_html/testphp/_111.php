<?php
/*
用php写的无序树
@author: mx  (http://my.oschina.net/meikaiyuan)
@version: 2013-05-10 v2.00
 */
 
 class  unorderedTree{
     
    // 节点id计数器
    protected $nodeId=0;
    // 树的深度
    protected $depth=0;
    // 树的节点数,
    protected $nodesCount=0;
    // 树的度 @todo: 使其发挥作用
    public $degree=" to be implent";
     
    // 根节点id
    // 由于树有多种从根节点开始操作，不想每次遍历树到顶找root，用一个变量始终指向根节点
    protected $rootid=null;
      
    // 子节点集合, k-v 为 nodeid=>(stdclass)node
    // 一些树的实现常常是采用节点和树同一class，这里节点是使用  stdclass{ data, parent, id , childrenIds} ，因我认为节点和树应为两种对象，且stdclass要轻于树的class
    // 节点格式说明:  $this->nodes[nodeId] = new stdclass{ id ,parentId, childrenIds,  data }
    // id: 节点id
    // parentId: 节点父节点id
    // childrenIds: 子节点的id    不想每次遍历树确定层次关系
    // 注意: 节点中,  #只保存其自身数据和其子节点id的集合#,  子节点的数据通过从树 $tree->nodes[ $node->childrenIds[a_child_id]  ] 访问
    // data: 节点中包含的数据，如节点名称等属性数据
    protected $nodes=array();
    // 用户自定义访问节点
    protected $userVisitFunction=null;
     
    /* 分组: 类的基本函数 */
    // @todo: 构造树
    public function __construct(){
    }
    // @todo: 销毁树
    public function __destruct(){
        unset($this->nodes) ;
    }
     
     //   ---------------------------------------------- 获取数据类函数-------------------------------------------
     // 获取树的深度,
     public function getTreeDepth(){
        return $this->depth;
     }
     // 获取树的节点数目
     public function getCount(){
        return $this->NodesCount;
     }
      
     // 获取树的度
     public function getDegree(){
        // @todo: 获取树的度（因为对度暂时没什么需要就不实现了 )
        return $this->degree;
     }
      
     //获取指定节点
     public function getNode($nodeId){
        if(isset($this->Nodes[$nodeId])){
            return $this->Nodes[$nodeId];
        }
        else{
            return false;
        }
     }
      
     // 获取最新id
     public function getId(){
        return $this->nodeId;
     }
      
      
     //获取指定节点高度
     public function getNodeHeight($nodeId){
      
        if( array_key_exists($nodeId, $this->nodes) ){
            // 此节点已在树里，高度至少为1，每找到一个父节点+1
            $height=1;
            // 记录此树中已经访问过的节点,  用于防止节点构造时互相parent导致此函数死循环且及时结束查找
            $visitedNodesIds=array();
            // 记录当前操作节点的id
            $cid=$nodeId;
            // 当前节点的父节点必须存在于此树中
            // 不用递归
            while(   isset($cid)   ) {
                if(   !in_array($cid,$visitedNodesIds )  ){
                    if( $this->rootid===$cid){ //到顶,返回
                        return $height;
                    }
                    $visitedNodesIds[]=$cid;
                    $cid= $this->nodes[ $cid ]->parentId;
                    $height++;  
                }
                else{
                    return false;
                }
            }
            return false;
        }
        else{
            return false;
        }
     }
      
     //获取根节点
     public function getRoot(){
        return  (!is_null($this->rootid) ) && $this->nodes[$this->rootid];
     }
      
     //获取指定节点和其所有子节点构成的数组
     //这是用于获取子树的一个关键基础操作
     public function getSubNodes($nodeId){
        if(isset($this->nodes[$nodeId])){
            $result=array();
            $toVisitNodeIds=array();
            $toVisitedNodeIds[]=$nodeId; 
            $result[]=$this->nodes[$nodeId]->id;
            array_shift($toVisitedNodeIds);
            $toVisitedNodeIds=array_merge(  $toVisitedNodeIds,  $this->nodes[$nodeId]->childrenIds);
            while(!empty($toVisitedNodeIds)){
                $toVisitNodeId=array_shift($toVisitedNodeIds);
                $result[]=$this->nodes[$toVisitNodeId]->id;
                $toVisitedNodeIds=array_merge(  $toVisitedNodeIds,  $this->nodes[$toVisitNodeId]->childrenIds);
            }
            return $result ;
        }
        else{
            return false;
        }
     }
     
     //@todo: 获取由指定节点和其所有子节点构建的子树
     public function getSubTree($nodeid){
     }
      
     //----------------------------------------------------------------  数据更新 -----------------------------------------------
     public function setId($nodeId){
            $this->nodeId=$nodeId;
            return $this;
     }
      
      // 创建不重复的(树中未被使用的) 新id
     public function seekId(){
        $this->nodeId++;
        return $this->nodeId;
     }
      
    public function setVisitFunction($userFunction){
        $this->userVisitFunction=$userFunction;
     }
      
     //插入子节点，默认为插在根节点下
     public function insertNode($parent_id=null , $data=null){
        //注意node不是class tree
        $node = new stdclass;
        $node->data = $data;
        //树的节点数增加
        $this->nodeCount++;
        // 分配节点id
        $this->seekId();
        $node->id =$this->getId();
        //插入根节点
        if(  (is_null($parent_id))  &&  is_null($this->rootid)){
            $node->parentId = null;
            $node->childrenIds = array();
            $this->depth=1; 
            $this->rootid=$node->id;
            $this->nodes [$node->id]=$node;
            return $this;
        }
        elseif(   isset($this->nodes[$parent_id])  || is_null($parent_id) ){  // 插在此树已有节点下
            if(is_null($parent_id)){
                $parent_id=$this->rootid;
            }
            $node->parentId = $parent_id;
            $node->childrenIds = array();
            //更新树的最大深度
            $depth=$this->getNodeHeight($parent_id);
            $this->depth=max($depth+1, $this->depth);
            $this->nodes[$parent_id]->childrenIds []= $node->id;
            $this->nodes [$node->id]=$node;
            return $this;
        }
        else{
            return $this;
        }
     }
      
     //insert node 的别名
     public function append($parent_id=null , $data=null){
        return $this->insertNode($parent_id,$data);
      }
     
     // --------------------------------------------------------------- 数据访问 -----------------------------------------------------
     //广度优先遍历节点的别名, 全名太长了
     public function b($nodeId=null){
        return $this->breadthTraversal($nodeId);
     }
     // 广度优先遍历节点
     public function breadthTraversal($nodeId=null){
        if(is_null($this->rootid)){
            die("此树为空树，不可访问");
        }
        else{
            //全部遍历
            if(is_null($nodeId) || ( $this->rootid===$nodeId)  ){
                $nodeId=$this->rootid;
            }
            $toVisitNodeIds=array();
            $toVisitedNodeIds[]=$nodeId; 
            $this->visit( $this->nodes[$nodeId]);
            array_shift($toVisitedNodeIds);
            $toVisitedNodeIds=array_merge(  $toVisitedNodeIds,  $this->nodes[$nodeId]->childrenIds);
            while(!empty($toVisitedNodeIds)){
                $toVisitNodeId=array_shift($toVisitedNodeIds);
                $this->visit( $this->nodes[$toVisitNodeId]);
                $toVisitedNodeIds=array_merge(  $toVisitedNodeIds,  $this->nodes[$toVisitNodeId]->childrenIds);
            }
        }
        return $this;
     }
      
     //深度优先的别名
     public function d($nodeId=null){
        return $this->depthTraversall($nodeId);
     }
      
     // 深度优先遍历
     // 和广度优先的不同实现只在于array_merge的顺序不同而已 ( php array 忒好用啊忒好用  )
     public function depthTraversall($nodeId=null){
        if(is_null($this->rootid)){
            die("此树为空树，不可访问");
        }
        else{
            //全部遍历
            if(is_null($nodeId)){
                $nodeId=$this->rootid;
            }
            $toVisitNodeIds=array();
            $toVisitedNodeIds[]=$nodeId; 
            $this->visit( $this->nodes[$nodeId]);
            array_shift($toVisitedNodeIds);
            $toVisitedNodeIds=array_merge(   $this->nodes[$nodeId]->childrenIds, $toVisitedNodeIds );
            while(!empty($toVisitedNodeIds)){
                $toVisitNodeId=array_shift($toVisitedNodeIds);
                $this->visit( $this->nodes[$toVisitNodeId]);
                $toVisitedNodeIds=array_merge(   $this->nodes[$toVisitNodeId]->childrenIds, $toVisitedNodeIds );
            }
        }
        return $this;
     }
      
     //访问单个节点
     public function visit($node){
        if(is_null($this->userVisitFunction )){
            return $node->id;
        }
        else{
            return call_user_func($this->userVisitFunction,$node,$this);
        }
     }
      
 
 }
 
 
?>