<?php
session_start();
require 'vendor/autoload.php';

use App\Router;
use App\Config;

// load routes
$router = Router::setFromFile('routes.php');

// fix URI based on APPURL v2.0 - start
preg_match('/^([^:\/]+[s]?):\/\/([^\/]*)\/(.*)$/', Config::APPURL, $matches);
if (!isset($matches[3])) {
    $realURI = trim($_SERVER['REQUEST_URI'], '/');
} else {
    $baseConfigURL = $matches[3];
    $realURI = substr(trim($_SERVER['REQUEST_URI'], '/'), strlen($baseConfigURL) + 1);
}
// new global function to help create links and redirects
function route($uri)
{
    return Config::APPURL . '/' . $uri;
}
function redirect($uri)
{
    header('Location: ' . route($uri));
}
// fix URI based on APPURL v2.0 - end

// handle request
try {
    $router->direct(
        $realURI,
        isset($_POST['_method']) ? $_POST['_method'] : $_SERVER['REQUEST_METHOD']
    );
} catch (Exception $e) {
    header('HTTP/1.1 404 Not Found', true, 404);
    echo '<h1 style="text-align: center;">Not Found!</h1>';
    echo $e->getMessage();
}