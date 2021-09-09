<?php


namespace myApp;


class Router
{
  public array $getRoutes = [];
  public array $postRoutes = [];

  public function get($url, $fn)
  {
    $this->getRoutes[$url] = $fn;
  }

  public function post($url, $fn)
  {
    $this->postRoutes[$url] = $fn;
  }

  public function resolve()
  {
    $request_method = $_SERVER['REQUEST_METHOD'];
    $request_url = $_SERVER['PATH_INFO'] ?? '/';
    if ($request_method === 'GET') {
      echo 'get';
      $fn = $this->getRoutes[$request_url] ?? null;
    } else {
      echo 'post';
      $fn = $this->postRoutes[$request_url] ?? null;
    }
    if (!$fn) {
      echo 'Page Not Found!';
      exit;
    }
    echo '<pre>';
    var_dump($fn);
    echo '</pre>';
//    die;
    echo call_user_func($fn);

  }
}