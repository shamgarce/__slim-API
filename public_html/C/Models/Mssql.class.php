<?php

class mssql{
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
		//mssql_connect("192.168.10.1","YuyueUser","zxc123123");
		$this->link_id = @mssql_connect($dbhost, $dbuser, $dbpw);
		if (!$this->link_id){
			$this->ErrorMsg("Can't Connect MySQL Server($dbhost)!");
			return false;
		}
        /* 选择数据库 */
        if ($dbname){
            if (mssql_select_db($dbname, $this->link_id) === false ){
				$this->ErrorMsg("Can't select MySQL database($dbname)!");
            }else{
                return true;
            }
        }else{
            return true;
        }
    }

    function select_database($dbname){
        return mssql_select_db($dbname, $this->link_id);
    }

    function fetch_array($query, $result_type = MYSQL_ASSOC){		//内部
        return mssql_fetch_array($query, $result_type);
    }

    private function query($sql, $type = ''){
        if ($this->link_id === NULL){
            $this->connect($this->settings['dbhost'], $this->settings['dbuser'], $this->settings['dbpw'], $this->settings['dbname']);
           // $this->settings = array();
        }
        if ($this->queryCount++ <= 999){
            $this->queryLog[] = $sql;
        }
        if ($this->queryTime == ''){
                $this->queryTime = microtime(true);
        }
        if (!($query = mssql_query($sql, $this->link_id)) && $type != 'SILENT'){
            $this->error_message[]['message'] = 'MySQL Query Error';
            $this->error_message[]['sql'] = $sql;
            $this->ErrorMsg();
            return false;
        }
		
        return $query;
    }


    function result($query, $row){
        return @mssql_result($query, $row);
    }

    function num_rows($query){
        return mssql_num_rows($query);
    }

    function num_fields($query){
        return mssql_num_fields($query);
    }

    function free_result($query){
        return mssql_free_result($query);
    }


    function fetchRow($query){
        return mssql_fetch_assoc($query);
    }

    function fetch_fields($query){
        return mssql_fetch_field($query);
    }

    function version(){
        return $this->version;
    }



    function close(){
        return mssql_close($this->link_id);
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
        $res = $this->query($sql);
        if ($res !== false){
            $row = mssql_fetch_row($res);
            if ($row !== false){
                return $row[0];
            }else{
                return '';
            }
        }else{
            return false;
        }
    }

    function getAll($sql,$str=''){
        $res = $this->query($sql);
        if ($res !== false){
            $arr = array();
            while ($row = mssql_fetch_assoc($res)){
            	if(empty($str)){
	                $arr[] = $row;
            	}else{
    	            $arr[$row[$str]] = $row;
            	}
            }
			
            return $arr;
        }else{
            return false;
        }
    }
    
    function getMap($sql){
		$res = $this->query($sql);
		//===================================
		if ($res !== false){
            $arr = array();
            while ($row = mssql_fetch_row($res)){
        		$arr[$row[0]] = $row[1];
            }
			
            return $arr;
        }else{
            return false;
        }		
    }
    
    function getRow($sql, $limited = false){
        $res = $this->query($sql);
        if ($res !== false){
			$vsr = mssql_fetch_assoc($res);
			
            return $vsr;
        }else{
            return false;
        }
    }

    function getCol($sql){
        $res = $this->query($sql);
        if ($res !== false){
            $arr = array();
            while ($row = mssql_fetch_row($res)){
                $arr[] = $row[0];
            }
			
            return $arr;
        }else{
            return false;
        }
    }
	
	//===================================================================
}	//end class
?>