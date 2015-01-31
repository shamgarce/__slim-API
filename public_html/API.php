<?php
namespace Easy;


//require 'API.Config.php';
//require 'EASY/C.php';
//require 'M2/M.php';




class Easy{

    /**
     * @const string
     */
    const VERSION = '2.4.2';

    /**
     * @var \EASY\Helper\Set
     */
    public $container;

    /**
     * @var array[\EASY]
     */
    protected static $apps = array();

    /**
     * @var string
     */
    protected $name;

    /**
     * @var array
     */
    protected $middleware;

    /**
     * @var mixed Callable to be invoked if application error
     */
    protected $error;

    /**
     * @var mixed Callable to be invoked if no matching routes are found
     */
    protected $notFound;

    /**
     * @var array
     */
    protected $hooks = array(
        'EASY.before' => array(array()),
        'EASY.before.router' => array(array()),
        'EASY.before.dispatch' => array(array()),
        'EASY.after.dispatch' => array(array()),
        'EASY.after.router' => array(array()),
        'EASY.after' => array(array())
    );


    /**
     * Api PSR-0 autoloader
     */
    public static function autoload($className)
    {
        $thisClass = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
        $baseDir = __DIR__;
        if (substr($baseDir, -strlen($thisClass)) === $thisClass) {
            $baseDir = substr($baseDir, 0, -strlen($thisClass));
        }


        $className = ltrim($className, '\\');
        $fileName  = $baseDir;

        $namespace = '';
        if ($lastNsPos = strripos($className, '\\')) {
            $namespace = substr($className, 0, $lastNsPos);
            $className = substr($className, $lastNsPos + 1);
            echo $fileName;
            echo str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;;
            $fileName  .= str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
        }
        //echo $namespace;



        $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';


        if (file_exists($fileName)) {
            require $fileName;
        }
    }

    /**
     * Register Api's PSR-0 autoloader
     */
    public static function registerAutoloader()
    {
        spl_autoload_register(__NAMESPACE__ . "\\Easy::autoload");
    }

    /**
     * Constructor
     * @param  array $userSettings Associative array of application settings
     */
    public function __construct(array $userSettings = array())
    {
        // Setup IoC container
        $this->container = new \Easy\Helper\Set();
        $this->container['settings'] = array_merge(static::getDefaultSettings(), $userSettings);

        // Default environment
        $this->container->singleton('environment', function ($c) {
            return \EASY\Environment::getInstance();
        });

        // Default request
        $this->container->singleton('request', function ($c) {
            return new \EASY\Http\Request($c['environment']);
        });

        // Default response
        $this->container->singleton('response', function ($c) {
            return new \EASY\Http\Response();
        });

        // Default router
        $this->container->singleton('router', function ($c) {
            return new \EASY\Router();
        });

        // Default view
        $this->container->singleton('view', function ($c) {
            $viewClass = $c['settings']['view'];
            $templatesPath = $c['settings']['templates.path'];

            $view = ($viewClass instanceOf \EASY\View) ? $viewClass : new $viewClass;
            $view->setTemplatesDirectory($templatesPath);
            return $view;
        });

        // Default log writer
        $this->container->singleton('logWriter', function ($c) {
            $logWriter = $c['settings']['log.writer'];

            return is_object($logWriter) ? $logWriter : new \EASY\LogWriter($c['environment']['Api.errors']);
        });

        // Default log
        $this->container->singleton('log', function ($c) {
            $log = new \EASY\Log($c['logWriter']);
            $log->setEnabled($c['settings']['log.enabled']);
            $log->setLevel($c['settings']['log.level']);
            $env = $c['environment'];
            $env['Api.log'] = $log;

            return $log;
        });

        // Default mode
        $this->container['mode'] = function ($c) {
            $mode = $c['settings']['mode'];

            if (isset($_ENV['Api_MODE'])) {
                $mode = $_ENV['Api_MODE'];
            } else {
                $envMode = getenv('Api_MODE');
                if ($envMode !== false) {
                    $mode = $envMode;
                }
            }

            return $mode;
        };

        // Define default middleware stack
        $this->middleware = array($this);
        $this->add(new \EASY\Middleware\Flash());
        $this->add(new \EASY\Middleware\MethodOverride());

        // Make default if first instance
        if (is_null(static::getInstance())) {
            $this->setName('default');
        }
    }

    public function root()
    {
        return rtrim($_SERVER['DOCUMENT_ROOT'], '/') . rtrim($this->request->getRootUri(), '/') . '/';
    }

    public function run(){
       // echo $this->root();
        echo 1;
    }
}


\Easy\Easy::registerAutoloader();
$easy = NEW Easy();















