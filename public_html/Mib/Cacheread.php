<?php



$mem = new Memcache;
$mem->connect("127.0.0.1", 11211);
//保存数据
$mem->set('key1', 'This is first value', 0, 60);
$val = $mem->get('key1');
echo "Get key1 value: " . $val ."<br />";


$mstr = serialize($mem);


//测试

$m = function () {
	//检查 top hash表
	echo 1;
};
//$m  = '123';
//这个可以序列化吗      不可以
//$mstr = serialize($m);




echo $mstr;




/*
 *
 * 重要的
 * 1 : 函数名记忆
 * 2 : 重要单词记忆
 * 3 : 每天阅读
 * 4 : 每天记忆
 *
 *
1 : hash表 APC
2 : 数据缓存暂存 memcache



3 : 永久存储 mysql
4 : 永久存储 mongodb
*/

/*
基本

读取表的某一条记录
User:id:3
User:id:5



$mc  = getmc();

getmc(
    $mc = getmc()
    if(!fmepty()){
        $mc =
    }
    return $mc
);
*/



?>


