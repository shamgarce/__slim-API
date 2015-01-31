<?php
define('IS',true);
$_W['_Files'][] = __FILE__;
$_W['verlib'] 	= array('v1','debug');

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

require '../Slim/Slim.php';
require '../../C/Api.php';
\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();

//header("Content-type: text/html; charset=utf-8");
/*
$app->group('/debug', function () use ($app) {
	$app->group('/get', function () use ($app) {
		$app->get('/succeed', function () use ($app) {
			$req = $app->request;
        	$config['v'] = 'v1';
        	$config['debug'] = '1';
        	$config['instance'] = 'test';
        	$config['action'] = 'getsucceed';
			ApiBase::run($config);
	    });
		
	    $app->get('/fail', function () use ($app) {
        	$config['v'] = 'v1';
        	$config['debug'] = '1';
        	$config['instance'] = 'test';
        	$config['action'] = 'getfail';
			ApiBase::run($config);
	    });
	    
    });
	$app->group('/post', function () use ($app) {
		$app->post('/succeed', function () use ($app) {
        	$config['v'] 		= 'v1';
        	$config['debug'] 	= '1';
        	$config['instance'] = 'test';
        	$config['action'] 	= 'postsucceed';
			ApiBase::run($config);

		});

	    $app->post('/fail', function () use ($app) {
        	$config['v'] 		= 'v1';
        	$config['debug'] 	= '1';
        	$config['instance'] = 'test';
        	$config['action'] 	= 'postfail';
			ApiBase::run($config);

	    });

	});
	
    $app->group('/library', function () use ($app) {
        $app->get('/books/:id', function ($id) use ($app) {
			//=================================================
			$req = $app->request;
        	$config['v'] = 'v1';
        	$config['instance'] = 'library';
        	$config['action'] = 'books';
        	$config['args']['id'] = $id;
        	$config['args']['d']['zh1'] = "中文";
			$config['args']['d']['getMethod'] 	= $app->request->getMethod();;
			$config['args']['d']['getBody']	= $app->request->getBody();
			$config['args']['d']['get'] 	= $app->request->get();
			$config['args']['d']['post']	= $app->request->post();
			$config['args']['d']['put'] 	= $app->request->put();
			$config['args']['d']['cookies'] = $app->getCookie('foo');
			$config['args']['d']['sessionid'] = session_id() ;        	

			$config['args']['d']['headers'] = $app->request->headers;
			$config['args']['d']['headersget'] = $app->request->headers->get('ACCEPT_CHARSET');
			$config['args']['d']['params'] = $app->request->params('paramName');
			$config['args']['d']['getRootUri'] = $req->getRootUri();
			$config['args']['d']['getResourceUri'] = $req->getResourceUri();
			$config['args']['d']['getContentType'] = $req->getContentType();
			$config['args']['d']['getMediaType'] = $req->getMediaType();
			$config['args']['d']['getContentCharset'] = $req->getContentCharset();
			$config['args']['d']['getContentLength'] = $req->getContentLength();
			$config['args']['d']['getHost'] = $req->getHost();
			$config['args']['d']['getHostWithPort'] = $req->getHostWithPort();
			$config['args']['d']['getPort'] = $req->getPort();
			$config['args']['d']['getScheme'] = $req->getScheme();
			$config['args']['d']['getPath'] = $req->getPath();
			$config['args']['d']['getUrl'] = $req->getUrl();
			$config['args']['d']['getIp'] = $req->getIp();
			$config['args']['d']['getReferrer'] = $req->getReferrer();
			$config['args']['d']['getUserAgent'] = $req->getUserAgent();
			$config['args']['d']['----------'] = '---------------------------------';
			$config['args']['d']['_get'] = $_GET;
			$config['args']['d']['_post'] = $_POST;
			$config['args']['d']['HTTP_RAW_POST_DATA'] = $GLOBALS['HTTP_RAW_POST_DATA'];
			ApiBase::run($config);
        	//=================================================
        });
		// POST route
		$app->post('/books/:id', function ($id) use ($app) {
			$req = $app->request;
        	$config['v'] = 'v1';
        	$config['instance'] = 'library';
        	$config['action'] = 'books';
        	$config['args']['id'] = $id;
        	$config['args']['d']['zh1'] = "中文";
			$config['args']['d']['getMethod'] 	= $app->request->getMethod();;
			$config['args']['d']['getBody']	= $app->request->getBody();
			$config['args']['d']['get'] 	= $app->request->get();
			$config['args']['d']['post']	= $app->request->post();
			$config['args']['d']['put'] 	= $app->request->put();
			$config['args']['d']['cookies'] = $app->getCookie('foo');
			$config['args']['d']['sessionid'] = session_id() ;        	
			$config['args']['d']['headers'] = $app->request->headers;
			$config['args']['d']['headersget'] = $app->request->headers->get('ACCEPT_CHARSET');
			$config['args']['d']['params'] = $app->request->params('paramName');
			$config['args']['d']['getRootUri'] = $req->getRootUri();
			$config['args']['d']['getResourceUri'] = $req->getResourceUri();
			$config['args']['d']['getContentType'] = $req->getContentType();
			$config['args']['d']['getMediaType'] = $req->getMediaType();
			$config['args']['d']['getContentCharset'] = $req->getContentCharset();
			$config['args']['d']['getContentLength'] = $req->getContentLength();
			$config['args']['d']['getHost'] = $req->getHost();
			$config['args']['d']['getHostWithPort'] = $req->getHostWithPort();
			$config['args']['d']['getPort'] = $req->getPort();
			$config['args']['d']['getScheme'] = $req->getScheme();
			$config['args']['d']['getPath'] = $req->getPath();
			$config['args']['d']['getUrl'] = $req->getUrl();
			$config['args']['d']['getIp'] = $req->getIp();
			$config['args']['d']['getReferrer'] = $req->getReferrer();
			$config['args']['d']['getUserAgent'] = $req->getUserAgent();
			$config['args']['d']['----------'] = '---------------------------------';
			$config['args']['d']['_get'] = $_GET;
			$config['args']['d']['_post'] = $_POST;
			$config['args']['d']['HTTP_RAW_POST_DATA'] = $GLOBALS['HTTP_RAW_POST_DATA'];
        	//=================================================        
			ApiBase::run($config);
		    }
		);
      
    });
});

/*
$app->group('/v1', function () use ($app) {
	$app->group('/get', function () use ($app) {
		$app->get('/succeed', function () use ($app) {
			$req = $app->request;
        	$config['v'] = 'v1';
        	$config['instance'] = 'test';
        	$config['action'] = 'getsucceed';
			ApiBase::run($config);
	    });
		
	    $app->get('/fail', function () use ($app) {
        	$config['v'] = 'v1';
        	$config['instance'] = 'test';
        	$config['action'] = 'getfail';
			ApiBase::run($config);
	    });
	    
    });
	$app->group('/post', function () use ($app) {
		$app->post('/succeed', function () use ($app) {
        	$config['v'] = 'v1';
        	$config['instance'] = 'test';
        	$config['action'] = 'postsucceed';
			ApiBase::run($config);

		});

	    $app->post('/fail', function () use ($app) {
        	$config['v'] = 'v1';
        	$config['instance'] = 'test';
        	$config['action'] = 'postfail';
			ApiBase::run($config);

	    });

	});
   
});
*/
//================================================================
$app->run();

