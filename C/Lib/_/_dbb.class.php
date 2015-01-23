<?php
/**
 * 功能
 * 进行数据库的备份
 * 进行数据库的还原
 */
class dbb{
    var $db_host	= '';
    var $db_user	= '';
    var $db_pwd		= '';
    var $db_name	= '';
    var $db_char	= '';
    var $db    		= NULL;			//数据库对象
    //===============================================
    var $file_path	= 'db/';		//存储路径
    
	function __construct(){
		$this->db_host	= $_W['pdo']['system']['HOST'];
		$this->db_user	= $_W['pdo']['system']['USER'];
		$this->db_pwd	= $_W['pdo']['system']['PWD'];
		$this->db_name	= $_W['pdo']['system']['NAME'];
		$this->db_char	= $_W['pdo']['system']['CHAR'];
	}    
    
	function backup(){
		$nr = $this->_getnr();
		if($this->savefile($nr)) return true;
	}

	function savefile($nr){
		$filename = CACHE_PATH.$this->file_path.$this->db_name.'_'.date('Y_m_j_g_i').".sql";  //存放路径，默认存放到项目最外层
		$fp = fopen($filename,'w');
		fputs($fp,$nr);
		fclose($fp);
		return true;
	}	
	
	function _getnr(){
		$host		= $this->db_host;  
		$user		= $this->db_user;
		$password	= $this->db_pwd;
		$dbname		= $this->db_name;
		$dbchar		= $this->db_char;
		
		//=======================================================
		//数据库连接
		if(!mysql_connect($host,$user,$password))  //连接mysql数据库
		{
		    echo '数据库连接失败，请核对后再试';
		    exit;
		}
		if(!mysql_select_db($dbname))  //是否存在该数据库
		{
		    echo '不存在数据库:'.$dbname.',请核对后再试';
		    exit;
		}
		//=============================================
		mysql_query("set names '$dbchar'");
		$mysql= "set charset $dbchar;\r\n";
		$q1 = mysql_query("show tables");
		while($t=mysql_fetch_array($q1)){
		    $table=$t[0];
		    $q2=mysql_query("show create table `$table`");
		    $sql=mysql_fetch_array($q2);
		    $mysql.=$sql['Create Table'].";\r\n";
		    $q3=mysql_query("select * from `$table`");
		    while($data=mysql_fetch_assoc($q3)){
		        $keys=array_keys($data);
		        $keys=array_map('addslashes',$keys);
		        $keys=join('`,`',$keys);
		        $keys="`".$keys."`";
		        $vals=array_values($data);
		        $vals=array_map('addslashes',$vals);
		        $vals=join("','",$vals);
		        $vals="'".$vals."'";
		        $mysql.="insert into `$table`($keys) values($vals);\r\n";
		    }
		}
		return $mysql;
	}


//恢复数据库
//
//$filename = "jkjhkjk20111227242.sql";
//$host="localhost"; //主机名
//$user="root"; //MYSQL用户名
//$password=""; //密码
//$dbname="jkjhkjk"; //在此指定您要恢复的数据库名，不存在则必须先创建,请自已修改数据库名
//mysql_connect($host,$user,$password);
//mysql_select_db($dbname);
//$mysql_file="mysql_bak/".$filename; //指定要恢复的MySQL备份文件路径,请自已修改此路径
//restore($mysql_file); //执行MySQL恢复命令
//
//function restore($fname)
//    {
//        if (file_exists($fname)) {
//            $sql_value="";
//            $cg=0;
//            $sb=0;
//            $sqls=file($fname);
//            foreach($sqls as $sql)
//            {
//                $sql_value.=$sql;
//            }
//            $a=explode(";\r\n", $sql_value);  //根据";\r\n"条件对数据库中分条执行
//            $total=count($a)-1;
//            for ($i=0;$i<$total;$i++)
//            {
//                执行命令
//                if(mysql_query($a[$i]))
//                {
//                    $cg+=1;
//                }
//                else
//                {
//                    $sb+=1;
//                    $sb_command[$sb]=$a[$i];
//                }
//            }
//            echo "操作完毕，共处理 $total 条命令，成功 $cg 条，失败 $sb 条";
//            显示错误信息 
//            if ($sb>0)
//            {
//                echo "<hr><br><br>失败命令如下：<br>";
//                for ($ii=1;$ii<=$sb;$ii++)
//                {
//                    echo "<p><b>第 ".$ii." 条命令（内容如下）：</b><br>".$sb_command[$ii]."</p><br>";
//                }
//            }            //-----------------------------------------------------------
//        }else{
//            echo "MySQL备份文件不存在，请检查文件路径是否正确！";
//        }
//    }


}
?>