<?php
/*** Mongodb类** examples:
 * $mongo = new HMongodb("127.0.0.1:11223");
 * $mongo->selectDb("test_db");
 * 创建索引
 * $mongo->ensureIndex("test_table", array("id"=>1), array('unique'=>true));
 * 获取表的记录
 * $mongo->count("test_table");
 * 插入记录
 * $mongo->insert("test_table", array("id"=>2, "title"=>"asdqw"));
 * 更新记录
 * $mongo->update("test_table", array("id"=>1),array("id"=>1,"title"=>"bbb"));
 * 更新记录-存在时更新，不存在时添加-相当于set
 * $mongo->update("test_table", array("id"=>1),array("id"=>1,"title"=>"bbb"),array("upsert"=>1));
 * 查找记录
 * $mongo->find("c", array("title"=>"asdqw"), array("start"=>2,"limit"=>2,"sort"=>array("id"=>1)))
 * 查找一条记录
 * $mongo->findOne("$mongo->findOne("ttt", array("id"=>1))", array("id"=>1));
 * 删除记录
 * $mongo->remove("ttt", array("title"=>"bbb"));
 * 仅删除一条记录
 * $mongo->remove("ttt", array("title"=>"bbb"), array("justOne"=>1));
 * 获取Mongo操作的错误信息
 * $mongo->getError();
 */

class Sham_Env {

    const METHOD_HEAD = 'HEAD';
    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';
    const METHOD_PUT = 'PUT';
    const METHOD_PATCH = 'PATCH';
    const METHOD_DELETE = 'DELETE';
    const METHOD_OPTIONS = 'OPTIONS';
    const METHOD_OVERRIDE = '_METHOD';

    /**
     * @var array
     */
    protected static $formDataMediaTypes = array('application/x-www-form-urlencoded');

    /**
     * Application Environment
     * @var \Slim\Environment
     */
    public $env;

    /**
     * HTTP Headers
     */
    public $headers;

    /**
     * HTTP Cookies
     */
    public $cookies;

    /**
     * Constructor
     */
    public function __construct()
    {

        //The HTTP request method
        $env['REQUEST_METHOD'] = $_SERVER['REQUEST_METHOD'];

        //The IP
        $env['REMOTE_ADDR'] = $_SERVER['REMOTE_ADDR'];

        // Server params
        $scriptName = $_SERVER['SCRIPT_NAME']; // <-- "/foo/index.php"
        $requestUri = $_SERVER['REQUEST_URI']; // <-- "/foo/bar?test=abc" or "/foo/index.php/bar?test=abc"
        $queryString = isset($_SERVER['QUERY_STRING']) ? $_SERVER['QUERY_STRING'] : ''; // <-- "test=abc" or ""

        // Physical path
        if (strpos($requestUri, $scriptName) !== false) {
            $physicalPath = $scriptName; // <-- Without rewriting
        } else {
            $physicalPath = str_replace('\\', '', dirname($scriptName)); // <-- With rewriting
        }
        $env['SCRIPT_NAME'] = rtrim($physicalPath, '/'); // <-- Remove trailing slashes

        // Virtual path
        $env['PATH_INFO'] = substr_replace($requestUri, '', 0, strlen($physicalPath)); // <-- Remove physical path
        $env['PATH_INFO'] = str_replace('?' . $queryString, '', $env['PATH_INFO']); // <-- Remove query string
        $env['PATH_INFO'] = '/' . ltrim($env['PATH_INFO'], '/'); // <-- Ensure leading slash

        // Query string (without leading "?")
        $env['QUERY_STRING'] = $queryString;

        //Name of server host that is running the script
        $env['SERVER_NAME'] = $_SERVER['SERVER_NAME'];

        //Number of server port that is running the script
        $env['SERVER_PORT'] = $_SERVER['SERVER_PORT'];

        //HTTP request headers (retains HTTP_ prefix to match $_SERVER)
        $headers = $this->extract($_SERVER);
        foreach ($headers as $key => $value) {
            $env[$key] = $value;
        }

        $this->cookies = $_COOKIE;
        $this->get     = $_GET;
        $this->post    = $_POST;
        $this->env     = $env;
    }

    /**
     * Extract HTTP headers from an array of data (e.g. $_SERVER)
     * @param  array $data
     * @return array
     */
    public static function extract($data)
    {
        $results = array();
        foreach ($data as $key => $value) {
            $key = strtoupper($key);
            if (strpos($key, 'X_') === 0 || strpos($key, 'HTTP_') === 0 || in_array($key, static::$special)) {
                if ($key === 'HTTP_CONTENT_LENGTH') {
                    continue;
                }
                $results[$key] = $value;
            }
        }
        return $results;
    }

    protected static $special = array(
        'CONTENT_TYPE',
        'CONTENT_LENGTH',
        'PHP_AUTH_USER',
        'PHP_AUTH_PW',
        'PHP_AUTH_DIGEST',
        'AUTH_TYPE'
    );

}
