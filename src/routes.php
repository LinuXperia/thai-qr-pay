<?php

use \Slim\Http\Request;
use \Slim\Http\Response;

// get path
/** @var Slim\Container $container */
$path = $container->get('request')->getUri()->getPath();
$pathArray = explode('/', $path);

// split route by path
switch ($pathArray[1]) {
    case 'qr' : {
        $app->group('/user', function () use ($container) {
            require_once $_SERVER['DOCUMENT_ROOT'] . '/src/routes/qr.php';
        });
        break;
    }
    default : {

        $app->get('[/]', function (Request $request, Response $response, $args) {
            phpinfo();
            exit(0);
        });

        break;
    }
}

$app->add($trailingSlash);