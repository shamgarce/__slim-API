<?php
/*示例
 * 用单例模式实现数据库的类  还要更改,
 * 变更为单例数据库和缓存功能的组合运用,后面有时间再说了
$config['dbhost'] = '127.0.0.1';
$config['dbuser'] = 'root';
$config['dbpw'] = '123';
$config['dbname'] = 'ns';
$config['charset'] = 'utf8';
$config['pconnect'] = 1;
$config['quiet'] =1;
$db = Mysql::getInstance($config);
$sql = "select * from sy_user";
$db->lifetime = 1000;
$rc = $db->getall($sql);
$rc = $db->getrow($sql);
$rc = $db->getcol($sql);
$rc = $db->getmap($sql);
$rc = $db->getone($sql);
gsql($sql,'map','chr')
$db->query($sql);
$db->autoexecute('sy_user5',$rc,insert,'where')
$db->autoexecute('sy_user5',$rc,insert,'where')
$db->close();
$db->version();
$db->setMaxCacheTime(0);
$db->getMaxCacheTime();
*/
class Db{
    protected $properties;
    //private $settings = array();
    //下面是单例结构===================================================
    public $link_id     = NULL;
    public $queryCount  = 0;
    public $retemp      = array();      //临时结果集 gsql的结果集临时存储
    public $queryTime   = 0;
    public $queryLog    = array();
    public $max_cache_time = 300; 					// 最大的缓存时间，以秒为单位
    public $root_path      = 'EasyCache/';    //RHCACHE
    public $cache_data_dir = 'query_caches/';	//缓存记录
    public $err_path      	= 'errlog/';			//错误/慢查询 日志
    public $debug      	    = false;
    public $error_message  = array();
    public $platform       = '';			//操作系统
    public $version        = '';
    public $dbhash         = '';			//配置缓存文件名
    public $starttime      = 0;
    public $timeline       = 0;
    public $timezone       = 0;
    public $lifetime       = 0;			    //缓存有效时间,<=0标识关闭
    public $slowquery      = 0.5;			//慢查询记录时间 超过这个时间,进行记录
    public $mysql_config_cache_file_time = 0;
    public $cache_data  	= '';
    public $cache_data_name= '';
    public $mysql_disable_cache_tables = array(); 		// 不允许被缓存的表，遇到将不会进行缓存
    public $base            = '';

    private $props = array();           //单例结构
    public static $instance;

    public function __construct($chr = 'default'){
        $file_path = APPPATH.'config/mysql.php';
        if ( ! file_exists($file_path))
        {
            show_error('The configuration file mysql.php does not exist.');
        }
        include($file_path);

        $this->base = dirname(__FILE__)."\\";

        $this->root_path = $this->base.'/'.$this->root_path;
//        $this->cls_mysql($config['dbhost'], $config['dbuser'], $config['dbpw'], $config['dbname'], $config['charset'], $config['pconnect'], $config['quiet']);
        $this->cls_mysql(
            $mysql_set[$chr]['hostname'],
            $mysql_set[$chr]['username'],
            $mysql_set[$chr]['password'],
            $mysql_set[$chr]['database'],
            $mysql_set[$chr]['charset'],
            $mysql_set[$chr]['pconnect'],
            $mysql_set[$chr]['quiet']);
    }

    public static function getInstance($config = 'default'){
        !(self::$instance instanceof self)&&self::$instance = new Db($config);
        return self::$instance;
    }

    private function __clone(){}
    //==================================================结束单例结构=
    private function cls_mysql($dbhost, $dbuser, $dbpw, $dbname = '', $charset = 'utf8', $pconnect = 0, $quiet = 0){
        if ($quiet){
            $this->connect($dbhost, $dbuser, $dbpw, $dbname, $charset, $pconnect, $quiet);
        }else{
            $this->settings = array(
                'dbhost'   => $dbhost,
                'dbuser'   => $dbuser,
                'dbpw'     => $dbpw,
                'dbname'   => $dbname,
                'charset'  => $charset,
                'pconnect' => $pconnect
            );
        }
    }

    //=====================================================
    // return true or false
    //连接数据库
    //=====================================================
    private function connect($dbhost, $dbuser, $dbpw, $dbname = '', $charset = 'utf8', $pconnect = 0, $quiet = 0)
    {
            $this->link_id = @mysql_connect($dbhost, $dbuser, $dbpw, true);         //非持久连接
            if (!$this->link_id){
                if (!$quiet)   $this->ErrorMsg("Can't Connect MySQL Server($dbhost)!");
                return false;
            }
        $this->dbhash  = md5($this->root_path . '_' . $dbhost . $dbuser . $dbpw . $dbname);
        $this->version = mysql_get_server_info($this->link_id);
        mysql_query("SET character_set_connection=$charset, character_set_results=$charset, character_set_client=binary", $this->link_id);
        mysql_query("SET sql_mode=''", $this->link_id);
        $sqlcache_config_file = $this->root_path . $this->cache_data_dir . 'sqlcache_config_file_' . $this->dbhash . '.php';
        //echo $sqlcache_config_file;
        @include($sqlcache_config_file);
        $this->starttime = microtime(true);//time();
        if ($this->max_cache_time && $this->starttime > $this->mysql_config_cache_file_time + $this->max_cache_time){
            //开始跳缓存-------------------------------------
            if ($dbhost != '.'){
                $result = mysql_query("SHOW VARIABLES LIKE 'basedir'", $this->link_id);
                $row    = mysql_fetch_assoc($result);
                if (!empty($row['Value']{1}) && $row['Value']{1} == ':' && !empty($row['Value']{2}) && $row['Value']{2} == "\\"){
                    $this->platform = 'WINDOWS';
                }else{
                    $this->platform = 'OTHER';
                }
            }else{
                $this->platform = 'WINDOWS';
            }

            if ($this->platform == 'OTHER' &&
                ($dbhost != '.' && strtolower($dbhost) != 'localhost:3306' && $dbhost != '127.0.0.1:3306') ||
                (PHP_VERSION >= '5.1' && date_default_timezone_get() == 'UTC'))
            {
                $result = mysql_query("SELECT UNIX_TIMESTAMP() AS timeline, UNIX_TIMESTAMP('" . date('Y-m-d H:i:s', $this->starttime) . "') AS timezone", $this->link_id);
                $row    = mysql_fetch_assoc($result);

                if ($dbhost != '.' && strtolower($dbhost) != 'localhost:3306' && $dbhost != '127.0.0.1:3306'){
                    $this->timeline = $this->starttime - $row['timeline'];
                }

                if (PHP_VERSION >= '5.1' && date_default_timezone_get() == 'UTC'){
                    $this->timezone = $this->starttime - $row['timezone'];
                }
            }

            $content = '<' . "?php\r\n" .
                '$this->mysql_config_cache_file_time = ' . $this->starttime . ";\r\n" .
                '$this->timeline = ' . $this->timeline . ";\r\n" .
                '$this->timezone = ' . $this->timezone . ";\r\n" .
                '$this->platform = ' . "'" . $this->platform . "';\r\n?" . '>';
            @file_put_contents($sqlcache_config_file, $content);
            //跳缓存结束-------------------------------------
        }
        /* 选择数据库 */
        if ($dbname){
            if (mysql_select_db($dbname, $this->link_id) === false ){
                if (!$quiet)  $this->ErrorMsg("Can't select MySQL database($dbname)!");
                return false;
            }else{
                return true;
            }
        }else{
            return true;
        }
    }

    private function fetch_array($query, $result_type = MYSQL_ASSOC){		//内部
        return mysql_fetch_array($query, $result_type);
    }

    /*
     *选择数据库
     * */
    public function select_database($dbname){
        return mysql_select_db($dbname, $this->link_id);
    }

    /*
     *设置字符集
     * */
    public function set_mysql_charset($charset){   /* 如果mysql 版本是 4.1+ 以上，需要对字符集进行初始化 */
        if (in_array(strtolower($charset), array('gbk', 'big5', 'utf-8', 'utf8'))){
            $charset = str_replace('-', '', $charset);
        }
        if ($charset != 'latin1'){
            mysql_query("SET character_set_connection=$charset, character_set_results=$charset, character_set_client=binary", $this->link_id);
        }
    }

    /*
     * //有可能执行,比如update / delete
     * */
    public function query($sql, $type = ''){
        if ($this->link_id === NULL){
            $this->connect($this->settings['dbhost'], $this->settings['dbuser'], $this->settings['dbpw'], $this->settings['dbname'], $this->settings['charset'], $this->settings['pconnect']);
            // $this->settings = array();
        }
        if ($this->queryCount++ <= 999){            $this->queryLog[] = $sql;        }
        if ($this->queryTime == 0){
            $this->queryTime = microtime(true);     //版本5.3是环境必须
        }

        /* 当当前的时间大于类初始化时间的时候，自动执行 ping 这个自动重新连接操作 */
        if (time() > $this->starttime + 1){            mysql_ping($this->link_id);        }

        if (!($query = mysql_query($sql, $this->link_id)) && $type != 'SILENT'){
            $this->error_message[]['message'] = 'MySQL Query Error';
            $this->error_message[]['sql'] = $sql;
            $this->error_message[]['error'] = mysql_error($this->link_id);
            $this->error_message[]['errno'] = mysql_errno($this->link_id);
            $this->ErrorMsg();
            return false;
        }



        //记录慢查询
        if ($this->queryTime - $this->starttime>$this->slowquery){
            $str = $sql."\r\n".'TM : '.$this->queryTime - $this->starttime.' : '.date('Y-m-d H:i:s')."\r\n----------------------------\r\n";
            $cachefile = $this->root_path . $this->err_path . 'slowquery.php';
            @file_put_contents($cachefile, $str, FILE_APPEND);
        }
        return $query;
    }


//-------------------------------------------------------------------
    function getOne($sql, $limited = false){
        if ($limited == true){
            $sql = trim($sql . ' LIMIT 1');
        }
        $res = $this->query($sql);
        if ($res !== false){
            $row = mysql_fetch_row($res);
            if ($row !== false){
                return $row[0];
            }else{
                return '';
            }
        }else{
            return false;
        }
    }

    function getRow($sql, $limited = false){
        if ($limited == true){
            $sql = trim($sql . ' LIMIT 1');
        }
        $res = $this->query($sql);
        if ($res !== false){
            $vsr = mysql_fetch_assoc($res);
            return $vsr;
        }else{
            return false;
        }
    }

    public function getAll($sql,$str=''){
        $res = $this->query($sql);
        if ($res !== false){
            $arr = array();
            while ($row = mysql_fetch_assoc($res)){
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
            while ($row = mysql_fetch_row($res)){
                $arr[$row[0]] = $row[1];
            }
            return $arr;
        }else{
            return false;
        }
    }


    function getCol($sql){
        $res = $this->query($sql);
        if ($res !== false){
            $arr = array();
            while ($row = mysql_fetch_row($res)){
                $arr[] = $row[0];
            }
            return $arr;
        }else{
            return false;
        }
    }

    //===================================================================
    //只会执行一遍的语法结构,,会把结果缓存起来
    //再次遇到该类型的话,直接读取缓存,输出 存储位置$retemp
    //===================================================================
    function gsql($sql,$type='all',$str=''){        //$retemp
        $markstr = $sql.$type;
        if(!empty($this->retemp[$markstr]))        return $this->retemp[$markstr];
        switch($type){
            case 'all':
                $rc = $this->getAll($sql,$str);
                $this->retemp[$markstr] = $rc;
                return $rc;
                break;
            case 'one':
                $rc = $this->getOne($sql);
                $this->retemp[$markstr] = $rc;
                return $rc;
                break;
            case 'row':
                $rc = $this->getRow($sql);
                $this->retemp[$markstr] = $rc;
                return $rc;
                break;
            case 'col':
                $rc = $this->getCol($sql);
                $this->retemp[$markstr] = $rc;
                return $rc;
                break;
            case 'map':
                $rc = $this->getMap($sql);
                $this->retemp[$markstr] = $rc;
                return $rc;
                break;
        }
        return false;
    }

    public function setMaxCacheTime($second){
        $this->max_cache_time = $second;
    }

    public function getMaxCacheTime(){
        return $this->max_cache_time;
    }

    /* 仿真 Adodb 函数 */
    function autoExecute($table, $field_values, $mode = 'INSERT', $where = '', $querymode = ''){
        $field_names = $this->getCol('DESC ' . $table);
        $sql = '';


        if ($mode == 'INSERT'){
            $fields = $values = array();
            foreach ($field_names AS $value){
                if (array_key_exists($value, $field_values) == true){
                    $fields[] = $value;
                    $values[] = "'" . $field_values[$value] . "'";
                }
            }

            if (!empty($fields)){
                $sql = 'INSERT INTO ' . $table . ' (' . implode(', ', $fields) . ') VALUES (' . implode(', ', $values) . ')';
            }
        }else{
            $sets = array();
            foreach ($field_names AS $value){
                if (array_key_exists($value, $field_values) == true){
                    $sets[] = $value . " = '" . $field_values[$value] . "'";
                }
            }
            if (!empty($sets)){
                $sql = 'UPDATE ' . $table . ' SET ' . implode(', ', $sets) . ' WHERE ' . $where;
            }
        }
        //echo $sql;
        if ($sql){
            return $this->query($sql, $querymode);
        }else{
            return false;
        }
    }


    function autoReplace($table, $field_values, $update_values, $where = '', $querymode = ''){
        $field_descs = $this->getAll('DESC ' . $table);

        $primary_keys = array();
        foreach ($field_descs AS $value){
            $field_names[] = $value['Field'];
            if ($value['Key'] == 'PRI'){
                $primary_keys[] = $value['Field'];
            }
        }

        $fields = $values = array();
        foreach ($field_names AS $value){
            if (array_key_exists($value, $field_values) == true){
                $fields[] = $value;
                $values[] = "'" . $field_values[$value] . "'";
            }
        }

        $sets = array();
        foreach ($update_values AS $key => $value){
            if (array_key_exists($key, $field_values) == true){
                if (is_int($value) || is_float($value)){
                    $sets[] = $key . ' = ' . $key . ' + ' . $value;
                }else{
                    $sets[] = $key . " = '" . $value . "'";
                }
            }
        }

        $sql = '';
        if (empty($primary_keys)){
            if (!empty($fields)){
                $sql = 'INSERT INTO ' . $table . ' (' . implode(', ', $fields) . ') VALUES (' . implode(', ', $values) . ')';
            }
        }else{
            if ($this->version() >= '4.1'){
                if (!empty($fields)){
                    $sql = 'INSERT INTO ' . $table . ' (' . implode(', ', $fields) . ') VALUES (' . implode(', ', $values) . ')';
                    if (!empty($sets)){
                        $sql .=  'ON DUPLICATE KEY UPDATE ' . implode(', ', $sets);
                    }
                }
            }else{
                if (empty($where)){
                    $where = array();
                    foreach ($primary_keys AS $value){
                        if (is_numeric($value)){
                            $where[] = $value . ' = ' . $field_values[$value];
                        }else{
                            $where[] = $value . " = '" . $field_values[$value] . "'";
                        }
                    }
                    $where = implode(' AND ', $where);
                }

                if ($where && (!empty($sets) || !empty($fields))){
                    if (intval($this->getOne("SELECT COUNT(*) FROM $table WHERE $where")) > 0){
                        if (!empty($sets)){
                            $sql = 'UPDATE ' . $table . ' SET ' . implode(', ', $sets) . ' WHERE ' . $where;
                        }
                    }else{
                        if (!empty($fields)){
                            $sql = 'REPLACE INTO ' . $table . ' (' . implode(', ', $fields) . ') VALUES (' . implode(', ', $values) . ')';
                        }
                    }
                }
            }
        }

        if ($sql){
            return $this->query($sql, $querymode);
        }else{
            return false;
        }
    }


    public function version(){
        return $this->version;
    }

    /*
     * 输出错误信息
     * */
    public function ErrorMsg($message = '', $sql = ''){
        if ($message){
            echo "<b>info</b>: $message\n\n<br /><br />";
        }else{
            echo "<b>MySQL server error report:";
            print_r($this->error_message);
        }
        exit;
    }


    //------------------------------------------------------------
    //元操作
    private function result($query, $row){
        return @mysql_result($query, $row);
    }

    private function num_rows($query){
        return mysql_num_rows($query);
    }

    private function num_fields($query){
        return mysql_num_fields($query);
    }

    private function free_result($query){
        return mysql_free_result($query);
    }


    private function fetchRow($query){
        return mysql_fetch_assoc($query);
    }

    private function fetch_fields($query){
        return mysql_fetch_field($query);
    }



    private function escape_string($unescaped_string){
        return mysql_real_escape_string($unescaped_string);
    }

    //针对connection的操作
    private function affected_rows(){
        return mysql_affected_rows($this->link_id);
    }

    private function error(){
        return mysql_error($this->link_id);
    }

    private function errno(){
        return mysql_errno($this->link_id);
    }

    private function ping(){
        return mysql_ping($this->link_id);
    }

    public function insert_id(){
        return mysql_insert_id($this->link_id);
    }

    public function close(){
        return mysql_close($this->link_id);
    }

    //=======================================
    //=======================================
    //=======================================

    public function all()
    {
        return $this->properties;
    }

    /**
     * Array Access: Offset Exists
     */
    public function offsetExists($offset)
    {
        return isset($this->properties[$offset]);
    }

    /**
     * Array Access: Offset Get
     */
    public function offsetGet($offset)
    {
        if (isset($this->properties[$offset])) {
            return $this->properties[$offset];
        } else {
            return null;
        }
    }

    /**
     * Array Access: Offset Set
     */
    public function offsetSet($offset, $value)
    {
        $this->properties[$offset] = $value;
    }

    /**
     * Array Access: Offset Unset
     */
    public function offsetUnset($offset)
    {
        unset($this->properties[$offset]);
    }


}

