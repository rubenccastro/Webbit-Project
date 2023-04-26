<?php
namespace App;

use \Exception;

class Router
{
  protected $routes = [];

  public static function setFromFile($file) {
    $router = new static;
    require $file;
    return $router;
  }

  public function get($uri, $callback) {
    $this->routes['GET'][$uri] = $callback; 
  }

  public function post($uri, $callback) {
    $this->routes['POST'][$uri] = $callback; 
  }

  public function delete($uri, $callback) {
    $this->routes['DELETE'][$uri] = $callback; 
  }

  public function patch($uri, $callback) {
    $this->routes['PATCH'][$uri] = $callback; 
  }

  public function direct($uri,$method) {
    if (!empty($this->routes[$method])) {
      foreach ($this->routes[$method] as $route => $callback) {
        $route = '/^' . str_replace('/', '\/', $route) . '$/';
        if (preg_match($route, $uri, $params)) {
          array_shift($params);
          return call_user_func_array($callback, array_values($params));
        }
      }
    }
    throw new Exception('No route found');
  }
}
