<?php
namespace Easy;

class Easy
{
    const VERSION = '2.4.2';

    /**
     * Slim PSR-0 autoloader
     */
    public static function autoload($className)
    {
        $thisClass = str_replace(__NAMESPACE__ . '\\', '', __CLASS__);
        $baseDir = __DIR__;
        if (substr($baseDir, -strlen($thisClass)) === $thisClass) $baseDir = substr($baseDir, 0, -strlen($thisClass));
        $className = ltrim($className, '\\');
        $fileName = $baseDir;
        $namespace = '';
        if ($lastNsPos = strripos($className, '\\')) {
            $namespace = substr($className, 0, $lastNsPos);
            $className = substr($className, $lastNsPos + 1);
            $fileName .= str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
        }
        $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
        file_exists($fileName) && require $fileName;
    }

    /**
     * Register Slim's PSR-0 autoloader
     */
    public static function registerAutoloader()
    {
        spl_autoload_register(__NAMESPACE__ . "\\Easy::autoload");
    }

    public function __construct(array $userSettings = array()){
//        set_error_handler(array('\Easy\Easy', 'handleErrors'));                 //这里还有点问题,没有正确起到作用


        // Setup IoC container
        $this->container = new \Easy\Set();
        $this->container['settings'] = array_merge(static::getDefaultSettings(), $userSettings);

        // Default environment              //调用的时候才会执行
        $this->container->singleton('environment', function ($c) {
            return \Easy\Environment::getInstance();
        });


//        // Default request
//        $this->container->singleton('request', function ($c) {
//            return new \Slim\Http\Request($c['environment']);
//        });
//
//        // Default response
//        $this->container->singleton('response', function ($c) {
//            return new \Slim\Http\Response();
//        });
//
//        // Default router
//        $this->container->singleton('router', function ($c) {
//            return new \Slim\Router();
//        });


echo 9;
print_r($this->container);



        //$this->container = new \Slim\Helper\Set();
       // $this->container['settings'] = array_merge(static::getDefaultSettings(), $userSettings);
    }

    public function run(){

//        $env = \Easy\Environment::getInstance();
//        $all = $env->all();
//        print_r($all);
//        var_dump($env);
//        echo 'go';
    }























    /**
     * Get default application settings //默认设置
     * @return array
     */
    public static function getDefaultSettings()
    {
        return array(
            // Application
            'mode' => 'development',
            // Debugging
            'debug' => true,
            // Logging
            'log.writer' => null,
//            'log.level' => \Easy\Log::DEBUG,
            'log.enabled' => true,
            // View
            'templates.path' => './templates',
            'view' => '\Easy\View',
            // Cookies
            'cookies.encrypt' => false,
            'cookies.lifetime' => '20 minutes',
            'cookies.path' => '/',
            'cookies.domain' => null,
            'cookies.secure' => false,
            'cookies.httponly' => false,
            // Encryption
            'cookies.secret_key' => 'CHANGE_ME',
            'cookies.cipher' => MCRYPT_RIJNDAEL_256,
            'cookies.cipher_mode' => MCRYPT_MODE_CBC,
            // HTTP
            'http.version' => '1.1',
            // Routing
            'routes.case_sensitive' => true
        );
    }

    /********************************************************************************
     * Error Handling and Debugging
     *******************************************************************************/
    /**
     * Convert errors into ErrorException objects
     *
     * This method catches PHP errors and converts them into \ErrorException objects;
     * these \ErrorException objects are then thrown and caught by Slim's
     * built-in or custom error handlers.
     *
     * @param  int            $errno   The numeric type of the Error
     * @param  string         $errstr  The error message
     * @param  string         $errfile The absolute path to the affected file
     * @param  int            $errline The line number of the error in the affected file
     * @return bool
     * @throws \ErrorException - set_error_handler(array('\Easy\Easy', 'handleErrors'));
     * //这里还有点问题,没有正确起到作用
     */
//    public static function handleErrors($errno, $errstr = '', $errfile = '', $errline = '')
//    {
//        if (!($errno & error_reporting())) {
//            return;
//        }
//
//        throw new \ErrorException($errstr, $errno, 0, $errfile, $errline);
//    }

    /**
     * Generate diagnostic template markup
     *
     * This method accepts a title and body content to generate an HTML document layout.
     *
     * @param  string   $title  The title of the HTML template
     * @param  string   $body   The body content of the HTML template
     * @return string
     */
    protected static function generateTemplateMarkup($title, $body)
    {
        return sprintf("<html><head><title>%s</title><style>body{margin:0;padding:30px;font:12px/1.5 Helvetica,Arial,Verdana,sans-serif;}h1{margin:0;font-size:48px;font-weight:normal;line-height:48px;}strong{display:inline-block;width:65px;}</style></head><body><h1>%s</h1>%s</body></html>", $title, $title, $body);
    }

    /**
     * Default Not Found handler
     */
    protected function defaultNotFound()
    {
        echo static::generateTemplateMarkup('404 Page Not Found', '<p>The page you are looking for could not be found. Check the address bar to ensure your URL is spelled correctly. If all else fails, you can visit our home page at the link below.</p><a href="' . $this->request->getRootUri() . '/">Visit the Home Page</a>');
    }

    /**
     * Default Error handler
     */
    protected function defaultError($e)
    {
        $this->getLog()->error($e);
        echo self::generateTemplateMarkup('Error', '<p>A website error has occurred. The website administrator has been notified of the issue. Sorry for the temporary inconvenience.</p>');
    }




}
