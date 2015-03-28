<?php





















/*
 * 加载配置文件
 * */
include "Seter/Config.php";


/*
 * 加载Seter文件
 * */
//include "Seter/Seter.php";

/*
 * 对象实例化
 * */
$Seter = new Seter();

//对象赋值
$Seter->reawd = 123;
$Seter['reawd'] = 1234;

//调用apc
//$Seter->apc->set_cache("vid",19999999);
//$Seter->apc->get_cache("vid");

//调用Mysql
//$sql = "select * from dy_user";
//$rc = $Seter->db->getall($sql);

//调用 mongodb
//$ar = $Seter->mdb->find("dy_user", array());

//调用memcache

//print_r($ar);
exit;

//* $mongo->ensureIndex("test_table", array("id"=>1), array('unique'=>true));
//* 获取表的记录
//* $mongo->count("test_table");
//*


print_r($rc);

//$this->S->apc->clear();
//$this->S->apc->clear_all($key);
//$this->S->apc->exists($key);
//$this->S->apc->inc("vidd",1);
//$this->S->apc->dec("vidd",1);
//$mr =  $this->S->apc->info();


echo $Seter->reawd;


$t = Seter::T();



echo '<hr>';
echo Seter::T()-$t;







//exit;
//$mem = new Memcache;
//$mem->connect("127.0.0.1", 11211);
////保存数据
//$mem->set('key1', 'This is first value', 0, 60);
//$val = $mem->get('key1');
//echo "Get key1 value: " . $val ."<br />";
//
//
//$mstr = serialize($mem);
//
//
////测试
//
//$m = function () {
//	//检查 top hash表
//	echo 1;
//};
////$m  = '123';
////这个可以序列化吗      不可以
////$mstr = serialize($m);
//
//
//
//
//echo $mstr;




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
