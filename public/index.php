<?php
ini_set("display_errors", "On");
error_reporting(E_ALL);

try {

	/**
	 * Read the configuration
	 */
	$config = new Phalcon\Config\Adapter\Ini(__DIR__ . '/../apps/config/config.ini');

	$loader = new \Phalcon\Loader();
	/**
	 * We're a registering a set of directories taken from the configuration file
	 */
	$loader->registerNamespaces(
	    array(
	        "Apps\Controllers"      			=> $config->application->controllersDir,
	        "Apps\Models"                     	=> $config->application->modelsDir,
	        "Apps\Helper"						=> $config->application->helperDir,
	        "Apps\Library"						=> $config->application->libraryDir,
	        "Apps\Plugin"						=> $config->application->pluginDir,
	    )
	)->register();

	/**
	 * The FactoryDefault Dependency Injector automatically register the right services providing a full stack framework
	 */
	$di = new \Phalcon\DI\FactoryDefault();

	/**
	 * We register the events manager
	 */
	$di->set('dispatcher', function () {

        $dispatcher = new \Phalcon\Mvc\Dispatcher();
        $dispatcher->setDefaultNamespace('Apps\Controllers');

	    $eventsManager = new \Phalcon\Events\Manager();
	    $eventsManager->attach("dispatch:beforeDispatch", new Apps\Plugin\SecurityPlugin);
		$dispatcher->setEventsManager($eventsManager);

        return $dispatcher;
	});	

	/**
	 * The URL component is used to generate all kind of urls in the application
	 */
	$di->set('url', function() use ($config){
		$url = new \Phalcon\Mvc\Url();
		$url->setBaseUri($config->application->baseUri);
		return $url;
	});


	$di->set('view', function() use ($config) {

		$view = new \Phalcon\Mvc\View();

		$view->setViewsDir($config->application->viewsDir);

		$view->registerEngines(
			array(
				".volt" => function ($view, $di) {
	                    $volt = new \Phalcon\Mvc\View\Engine\Volt($view, $di);
	                    $volt->setOptions(
	                        array(
	                            "compiledPath" => '../cache/volt/',
	                            "compileAlways"=> true
	                        )
	                    );
	                    $compiler = $volt->getCompiler();
                    	$compiler->addFunction('in_array', 'in_array');
	                    return $volt;
	                }
	        )
	    );

        $view->disableLevel(
            array(
                \Phalcon\Mvc\View::LEVEL_LAYOUT => true,
                \Phalcon\Mvc\View::LEVEL_MAIN_LAYOUT => true
            )
        );

		return $view;
	});

	/**
	 * Database connection is created based in the parameters defined in the configuration file
	 */
	$di->set('db', function() use ($config) {
		return new \Phalcon\Db\Adapter\Pdo\Mysql(
			array(
				"host" => $config->database->host,
				"username" => $config->database->username,
				"password" => $config->database->password,
				"dbname" => $config->database->name,
				"options" => array(
	            	PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
	        	)
			)
		);
	});

	/**
	 * If the configuration specify the use of metadata adapter use it or use memory otherwise
	 */
	$di->set('modelsMetadata', function() use ($config) {
		return new Phalcon\Mvc\Model\Metadata\Memory();
	});

	/**
	 * Start the session the first time some component request the session service
	 */
	$di->set('session', function(){
		$session = new Phalcon\Session\Adapter\Files();
		$session->start();
		return $session;
	});

	$di->set('router', require "../apps/config/routes.php");

	$application = new \Phalcon\Mvc\Application();
	$application->setDI($di);
	echo $application->handle()->getContent();

} catch (Phalcon\Exception $e) {
	echo $e->getMessage();
} catch (PDOException $e){
	echo $e->getMessage();
}
