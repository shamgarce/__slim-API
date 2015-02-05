<?php


define('IS',true);

/*------------------------------------------------------------
常量
EASY_VERSION
__CHAR
MAGIC_QUOTES_GPC
DEBUG
DEBUG_TRACER
DEBUG_ERROR_REPORT
CP
CPCACHE
MEMORY_LIMIT_ON
*/
define('DEBUG',true);
/*影响
_Files
*/
define('DEBUG_TRACER',true);
/*影响
_StartUseMems
------------------------------------------------------------*/
define('DEBUG_ERROR_REPORT',true);		//baocuo
define('CP','');		//baocuo
define('CPCACHE','');		//baocuo

//defined('CP') 		or define('CP', dirname(__FILE__)."\\");	//C的路径
//defined('CPCACHE') 	or define('CPCACHE',CP.'Cache/');			//缓存的根路径
// API group




/*------------------------------------------------------------*/



/**
 * Step 1: Require the Slim Framework
 *
 * If you are not using Composer, you need to require the
 * Slim Framework and register its PSR-0 autoloader.
 *
 * If you are using Composer, you can skip this step.
 */
require 'Slim/Slim.php';

//ECHO $_SERVER['REQUEST_URI'] ;

//ECHO $_SERVER['QUERY_STRING'];
//EXIT;


require '../C/APP.php';

\Slim\Slim::registerAutoloader();

/**
 * Step 2: Instantiate a Slim application
 *
 * This example instantiates a Slim application using
 * its default settings. However, you will usually configure
 * your Slim application now by passing an associative array
 * of setting names and values into the application constructor.
 */
$app = new \Slim\Slim();

/**
 * Step 3: Define the Slim application routes
 *
 * Here we define several Slim application routes that respond
 * to appropriate HTTP request methods. In this example, the second
 * argument for `Slim::get`, `Slim::post`, `Slim::put`, `Slim::patch`, and `Slim::delete`
 * is an anonymous function.
 */

$app->get('/:v/:class/:method', function ($v,$name,$na) {
	//$config['']
	$appbase = new AppBase();
	$appbase->run();
	//    echo "Hello, $name";
});

// GET route
$app->get(
    '/',
    function () {
        echo 'Hello Slim111111111';
    }
);

// POST route
$app->post(
    '/post',
    function () {
        echo 'This is a POST route';
    }
);

//The routes defined above would be accessible at, respectively:
//GET    /api/library/books/:id
//PUT    /api/library/books/:id
//DELETE /api/library/books/:id
/*
$app->group('/api', function () use ($app) {
    // Library group
    $app->group('/library', function () use ($app) {
        // Get book with ID
        $app->get('/books/:id', function ($id) {
        	echo 1;
        });
        // Update book with ID
        $app->put('/books/:id', function ($id) {
        });
        // Delete book with ID
        $app->delete('/books/:id', function ($id) {
        });
    });
});
*/
/**
 * Step 4: Run the Slim application
 *
 * This method should be called last. This executes the Slim application
 * and returns the HTTP response to the HTTP client.
 */
$app->run();

