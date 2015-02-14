<meta charset="utf-8"><style>
div{
    margin: 4px 0 0 5px;
    padding: 5px;
    border: 1px solid #66f;
    font-size: 12px;
     
    text-align: left;
    float:left;
    clear: both;
}
</style>
 
<?php
require "_111.php";
 
$uTree=new unorderedTree(array());
//获取根id
$rootid=$uTree->insertNode()->getId();
//在根下插入n个节点
$uTree->insertNode()->insertNode()->insertNode()->insertNode();
//获取最新插入节点id
$nid_x=$uTree->getId();
//在此节点下继续插
$uTree->insertNode($nid_x)->insertNode($nid_x)->insertNode();
// 在指定的节点下插（可以稍后从输出div看这些id的节点后面是否有相应数量的div）
$nid_x=2;
$uTree->insertNode($nid_x)->insertNode($nid_x)->insertNode($nid_x) ;
$nid_x=7;
$uTree->insertNode($nid_x);
$nid_x=11;
$uTree->insertNode($nid_x);
$nid_x=13;
$uTree->insertNode($nid_x);
$uTree->insertNode($nid_x);
 
//结合css，产生不同高度的节点不同缩进效果
function show($node,$tree){
    $marginleft= 20* ($tree->getNodeHeight($node->id))  ;
    echo '<div style="margin-left: '.$marginleft.'px">'. $node->id ."</div>";
}
 
// 指定用show来遍历节点
$uTree->setVisitFunction('show');
 
// 深度优先遍历
echo '<div style="width:100%;"><hr>深度优先遍历<hr></div>';
$uTree->d(1); 
 
echo '<div style="width:100%;"><hr>广度优先遍历<hr></div>';
 
$uTree->setVisitFunction('show');
// 广度优先遍历
$uTree->b(1);
 
//获取一下某节点与其下所有子节点，（参照深度优先遍历看看）
echo '<div style="width:100%;"><hr>获取节点和子节点集合<hr></div>';
$nodeId=5;
echo "<div>$nodeId 与其子节点id集合为： ", print_r($uTree->getSubNodes($nodeId),true ),"</div>";
 
 
echo '<div style="width:100%;"><hr>换种id玩玩<hr></div>';
 
$charTree=new unorderedTree();
// 改用字符来做id，注意这类id不好太多
$charTree->setId('a');
$charTree->setVisitFunction('show');
//获取根id
$rootid=$charTree->insertNode()->getId();
//在根下插入n个节点
$charTree->insertNode()->insertNode()->insertNode()->insertNode();
// 随便再插几个
$charTree->insertNode('c')->insertNode('d');
// 看看效果
$charTree->d();
  
  
?>