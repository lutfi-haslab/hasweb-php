<?php

namespace app\core;

class Request
{
  private array $routeParams = [];

  public function getMethod()
  {
    return strtolower($_SERVER['REQUEST_METHOD']);
  }

  public function getUrl()
  {
    $path = $_SERVER['REQUEST_URI'];
    $position = strpos($path, '?');
    if ($position !== false) {
      $path = substr($path, 0, $position);
    }
    return $path;
  }

  public function isGet()
  {
    return $this->getMethod() === 'get';
  }

  public function isPost()
  {
    return $this->getMethod() === 'post';
  }

  public function getBody()
  {
    $data = [];
    if (in_array($this->isGet(), ['get'])) {
      $input = file_get_contents('php://input');
      parse_str($input, $data);
    }
    if (in_array($this->isPost(), ['post'])) {
      $input = file_get_contents('php://input');
      parse_str($input, $data);
    }

    return $data;
  }

  public function setRouteParams($params)
  {
    $this->routeParams = $params;
    return $this;
  }

  public function getRouteParams()
  {
    return $this->routeParams;
  }

  public function getRouteParam($param, $default = null)
  {
    return $this->routeParams[$param] ?? $default;
  }
}