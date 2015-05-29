<?php

$router = new \Phalcon\Mvc\Router\Annotations(false);

$router->setDefaultNamespace('Apps\Controllers');

$router->addResource('Apps\Controllers\Index', '/');
$router->addResource('Apps\Controllers\User', '/user');
$router->addResource('Apps\Controllers\Session', '/session');

$router->notFound(
	array(
    	"controller" => "Error",
    	"action"     => "notFound"
	)
);

return $router;