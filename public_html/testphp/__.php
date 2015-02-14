<?php


include "MongoPHP.class.php";

/* =========== 测试用例,更多API请看文档  ============ */

// 连接 Mongo
$mongo = new MongoPHP(array('host'=>'localhost','port'=>27017));

// 使用 bug 数据库
$mongo->selectDB('bug');

//// 向 user 集合(表)中插入文档(记录)
//for($i=1; $i<=5; $i++){
//    $mongo->insert('user', array('id'=>$i, 'name'=>'yuan'.$i));
//}
//$mongo->insert('user', array('id'=>5, 'name'=>'yuan5'));

// 查询 user 集合中所有的文档
$ret = $mongo->select('user');
//$mongo->delete('user');
print_r($ret);


//// 查询 user 集合中 id=5 的文档(2条记录)
//$ret = $mongo->select('user',array('id'=>5));
//print_r($ret);

//// 查询 user 集合中 id=1 的文档(1条记录)
//$ret = $mongo->fetchRow('user',array('id'=>1));
//print_r($ret);

//// 更新 id=1 的文档记录中 name='newname'
//$mongo->update('user',array('name'=>'newname'), array('id'=>1));

//// 删除 id=1 的文档记录
//$mongo->delete('user',array('id'=>2));
