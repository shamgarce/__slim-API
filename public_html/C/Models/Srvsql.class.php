<?php
/*
sqlsrv_begin_transaction	开始事务。
sqlsrv_cancel			取消语句；并放弃相应语句的所有未决结果。
sqlsrv_client_info		提供有关客户端的信息。
sqlsrv_close			关闭连接。释放与相应连接关联的所有资源。
sqlsrv_commit			提交事务。
sqlsrv_configure		更改错误处理和日志记录配置。
sqlsrv_connect			创建一个连接，并将其打开。
sqlsrv_errors			返回关于上一操作的错误和/或警告信息。
sqlsrv_execute			执行预定义语句。
sqlsrv_fetch			使下一行的数据可供读取。
sqlsrv_fetch_array		以数值索引数组、关联数组或这两种数组的形式检索下一行的数据。
sqlsrv_fetch_object		以对象形式检索下一行的数据。
sqlsrv_field_metadata	返回字段元数据。
sqlsrv_free_stmt		关闭语句。释放与相应语句关联的所有资源。
sqlsrv_get_config		返回指定配置设置的值。
sqlsrv_get_field		按索引检索当前行中的字段。可以指定 PHP 返回类型。
sqlsrv_has_rows			检测结果集是否具有一行或多行。
sqlsrv_next_result		使下一结果可供处理。
sqlsrv_num_rows			报告结果集中的行数。
sqlsrv_num_fields		检索活动结果集中的字段数。
sqlsrv_prepare			准备 Transact-SQL 查询，但不执行该查询。隐式绑定参数。
sqlsrv_query			准备 Transact-SQL 查询，并将其执行。
sqlsrv_rollback			回滚事务。
sqlsrv_rows_affected	返回有所修改的行的数目。
sqlsrv_send_stream_data	在每次调用函数时向服务器发送最多八千字节 (8 KB) 的数据。
sqlsrv_server_info		提供有关服务器的信息。

$serverName = "192.168.10.1";
$connectionInfo = array( 
"UID"=>"YuyueUser",
"PWD"=>"zxc123123",
"Database"=>"his2009"
);
 

$conn = sqlsrv_connect( $serverName, $connectionInfo);
if($conn){
	echo "Connection established.\n";
}else{
	echo "Connection could not be established.\n";
	die( print_r( sqlsrv_errors(), true));
}


$sql = "select top 10 * from OPEBillMain";
$query = sqlsrv_query($conn,$sql);
while($row = sqlsrv_fetch_array($query)){
    //echo $row['nid']."-----".$row['title']."<br/>";
	echo 1;
}
//$row = mysql_fetch_row($rs);
print_r($rs);

*/


class Srvsql{
    var $link_id    = NULL;
    var $settings   = array();
    var $queryCount = 0;
    var $queryTime  = '';
    var $queryLog   = array();
    var $max_cache_time = 300; 						// 最大的缓存时间，以秒为单位
    var $root_path      = 'mysql/';					//CACHE_PATH
    var $cache_data_dir = 'query_caches/';			//data目录下
    var $err_path      	= 'errlog/';				//data目录下
    var $debug      	= false;
    var $error_message  = array();
    var $platform       = '';						//操作系统
    var $version        = '';
    var $dbhash         = '';						//配置缓存文件名
    var $starttime      = 0;
    var $timeline       = 0;
    var $timezone       = 0;
	
	// 0非持久/1持久	0即时连接/1连接
    function __construct($dbhost='', $dbuser='', $dbpw='', $dbname = ''){
        $this->cls_mysql($dbhost, $dbuser, $dbpw, $dbname);
    }

    function cls_mysql($dbhost, $dbuser, $dbpw, $dbname = ''){
		$this->settings = array(
			'dbhost'   => $dbhost,
			'dbuser'   => $dbuser,
			'dbpw'     => $dbpw,
			'dbname'   => $dbname
			);
    }
    
    function connect($dbhost, $dbuser, $dbpw, $dbname = '')
    {
		$connectionInfo = array( 
				"UID"=>$dbuser,
				"PWD"=>$dbpw,
				'ReturnDatesAsStrings'=> true,				//字符串形式返回时间
				"Database"=>$dbname
				);
		$this->link_id = sqlsrv_connect( $dbhost, $connectionInfo);
		//mssql_connect("192.168.10.1","YuyueUser","zxc123123");
		//$this->link_id = @mssql_connect($dbhost, $dbuser, $dbpw);
		if (!$this->link_id){
			$this->ErrorMsg("Can't Connect MsSQL Server($dbhost)!");
			return false;
		}
    }
//====================================================

    private function query($sql, $type = ''){
        if ($this->link_id === NULL){
            $this->connect($this->settings['dbhost'], $this->settings['dbuser'], $this->settings['dbpw'], $this->settings['dbname']);
           // $this->settings = array();
        }
        if (!($query = sqlsrv_query($this->link_id,$sql))){
            $this->error_message[]['message'] = 'MySQL Query Error';
            $this->error_message[]['sql'] = $sql;
            $this->ErrorMsg();
            return false;
        }
        $this->queryCount++;
        return $query;
    }

    function num_rows($query){
        return sqlsrv_num_rows($query);
    }

    function num_fields($query){
        return sqlsrv_num_fields($query);
    }

    function close(){
        return sqlsrv_close($this->link_id);
    }

    function ErrorMsg($message = '', $sql = ''){
        if ($message){
            echo "<b>info</b>: $message\n\n<br /><br />";
        }else{
            echo "<b>MySQL server error report:";
            print_r($this->error_message);
        }
        exit;
    }

	//===================================================================
    function getOne($sql, $limited = false){
		if($this->sqliscached($sql,'getone')){
			$getdata = $this->getsqldata($sql,'getone');
			return $getdata;
		}    	
        $res = $this->query($sql);
        if ($res !== false){
            $row = sqlsrv_fetch_array($res);
            if ($row !== false){
				//设置缓存
				//===================================
				if($this->lifetime  != 0){$this->setsqldata($sql,'getone',$row[0]);}
				//===================================
                return $row[0];
            }else{
                return '';
            }
        }else{
            return false;
        }
    }

    function getAll($sql,$str=''){
		if($this->sqliscached($sql,'getall'.$str)){
			$getdata = $this->getsqldata($sql,'getall'.$str);
			return $getdata;
		}
        $res = $this->query($sql);
        if ($res !== false){
            $arr = array();
            while ($row = sqlsrv_fetch_object($res)){
            	if(empty($str)){
	                $arr[] = $row;
            	}else{
    	            $arr[$row[$str]] = $row;
            	}
            }
			
			//设置缓存
			//===================================
			if($this->lifetime != 0){$this->setsqldata($sql,'getall'.$str,$arr);}
			//===================================
            return $arr;
        }else{
            return false;
        }
    }
    
    function getMap($sql){
    	if($this->sqliscached($sql,'getmap')){
			$getdata = $this->getsqldata($sql,'getmap');
			return $getdata;
		}
		$res = $this->query($sql);
		//===================================
		if ($res !== false){
            $arr = array();
            while ($row = sqlsrv_fetch_array($res)){
        		$arr[$row[0]] = $row[1];
            }
			//设置缓存
			//===================================
			if($this->lifetime  != 0){$this->setsqldata($sql,'getmap',$arr);}
			//===================================
            return $arr;
        }else{
            return false;
        }		
    }
    
    function getRow($sql, $limited = false){
    	
		if($this->sqliscached($sql,'getrow')){
			$getdata = $this->getsqldata($sql,'getrow');
			return $getdata;
		}
        $res = $this->query($sql);
        if ($res !== false){
			$vsr = sqlsrv_fetch_object($res);
			//设置缓存
			//===================================
			if($this->lifetime  != 0){$this->setsqldata($sql,'getrow',$vsr);}
			//===================================
            return $vsr;
        }else{
            return false;
        }
    }

    function getCol($sql){
		if($this->sqliscached($sql,'getcol')){
			$getdata = $this->getsqldata($sql,'getcol');
			return $getdata;
		}
        $res = $this->query($sql);
        if ($res !== false){
            $arr = array();
            while ($row = sqlsrv_fetch_array($res)){
                $arr[] = $row[0];
            }
			
			//设置缓存
			//===================================
			if($this->lifetime != 0){$this->setsqldata($sql,'getcol',$arr);}
			//===================================
            return $arr;
        }else{
            return false;
        }
    }
	
	//==================================================
	//获取缓存的数据
	function getsqldata($sql,$cacheid){
		if($this->sqliscached($sql,$cacheid)){
			return $this->cache_data;
		}
	}
    
	//==================================================
	//设置缓存的数据
	function setsqldata($sql,$cacheid,$data){
		$this->cache_data_name	= $sql;
		$this->cache_data		= $data;
		
		$cachefile = $this->getcachefilename($sql,$cacheid);
		
		$values['cachename']	= $sql;
		$values['cachetm']		= time();
		$values['cachecontent']	= serialize($data);
		$values =  serialize($values);
		$values_file = "<?php exit;?>";
		$values = $values_file."//[begin]//".$values."//[end]//";
		@file_put_contents($cachefile,$values);
		return true;
	}

	//==================================================
	//获取缓存的数据
	function sqliscached($sql,$cacheid){
		if($this->lifetime <= 0){return false;}
		if($this->cache_data_name == $sql){return true;}		//获取

		$cachefile = $this->getcachefilename($sql,$cacheid);
		
		$value 			= @file_get_contents($cachefile);
		if($value == ''){return false;}
		$value 			= $this->content_cut($value,'//[begin]//','//[end]//');
		$value 			= unserialize($value);
		$cachetm		= $value['cachetm'];
		$cachecontent	= unserialize($value['cachecontent']);
		if(time() - $cachetm > $this->lifetime){
			return false;
		}else{
			$this->cache_data_name	= $sql;
			$this->cache_data		= $cachecontent;
			return true;
		}
	}    

	//获取缓存文件的路径
	function getcachefilename($sql,$cacheid){
		$filename = 'srvcache_data_file_'.MD5($sql.serialize($this->settings)).'_'.$cacheid.'.php';
		$filechr = MD5($sql.serialize($this->settings));
		$tpath = RHCACHE.$this->root_path.$this->cache_data_dir.substr($filechr,0,2);
		!is_dir($tpath) && mkdir($tpath, 0777);
		$cachefile = $tpath . '/'.$filename;		
		return $cachefile;
	}	
	
	//==================================================
	//内容截取
	function content_cut($str,$startstr=" ",$endstr=" "){
		$outstr="";
		if(!empty($str) && strpos($str,$startstr)!==false && strpos($str,$endstr)!==false){
			$startpos	= strpos($str,$startstr);
			$str		= substr($str,($startpos+strlen($startstr)),strlen($str));
			$endpos		= strpos($str,$endstr);
			$outstr		= substr($str,0,$endpos);
		}
		return trim($outstr);
	}
	
	
	//===================================================================
}	//end class
?>