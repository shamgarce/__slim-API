<?php
define('IS',true);
$_W['_Files'][] = __FILE__;
$_W['verlib'] 	= array('v1','debug');
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
/*影响 _Files */
define('DEBUG_TRACER',true);
/*影响 _StartUseMems------------------------------------------------------------*/
define('DEBUG_ERROR_REPORT',true);		//baocuo
//define('CP','');		//baocuo
//define('CPCACHE','');		//baocuo
//defined('CP') 		or define('CP', dirname(__FILE__)."\\");	//C的路径
//defined('CPCACHE') 	or define('CPCACHE',CP.'Cache/');			//缓存的根路径
/*------------------------------------------------------------*/

define('MP','../');		//defined('CPCACHE') 	or define('CPCACHE',CP.'Cache/');	//mp跟版本号密切相关 这里只定义根路径

require 'Slim/Slim.php';
require '../C/Api.php';
\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();


//The routes defined above would be accessible at, respectively:
//GET    /api/library/books/:id
//PUT    /api/library/books/:id
//DELETE /api/library/books/:id
// API group

$app->group('/v1', function () use ($app) {
    // Library group
    $app->group('/library', function () use ($app) {
        // Get book with ID
        $app->get('/books/:id', function ($id) {
        	$config['v'] = 'v1';
        	$config['instance'] = 'library';
        	$config['action'] = 'books';
        	//=================================================
        	$config['args']['id'] = $id;
        	ApiBase::run($config);
        });
		// POST route
		$app->post('/post',function () {
		        echo 'This is a POST route';
		    }
		);
        // Update book with ID
        $app->put('/books/:id', function ($id) {
        });
        // Delete book with ID
        $app->delete('/books/:id', function ($id) {
        });

    });
});


/**
 * Step 4: Run the Slim application
 * This method should be called last. This executes the Slim application
 * and returns the HTTP response to the HTTP client.
 */
$app->run();

