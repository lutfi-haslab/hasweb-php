<?php

namespace app\core;

use app\core\Request;

class Router
{
  private Request $request;
  private Response $response;
  private array $routeMap = [];
  /**
   * Summary of __construct
   * @param \app\core\Request $request
   * @param \app\core\Response $response
   */
  public function __construct(Request $request, Response $response)
  {
    $this->request = $request;
    $this->response = $response;
  }
  public function get(string $url, $callback)
  {
    $this->routeMap['get'][$url] = $callback;
  }

  public function post(string $url, $callback)
  {
    $this->routeMap['post'][$url] = $callback;
  }

  public function getRouteMap($method): array
  {
    return $this->routeMap[$method] ?? [];
  }
  public function resolve()
  {
    $method = $this->request->getMethod();
    $url = $this->request->getUrl();
    $callback = $this->routeMap[$method][$url] ?? false;
    if ($callback === false) {
      $this->response->setStatusCode(404);
      return "<h1>Not found</h1>";
    }

    if (is_string($callback)) {
      return $this->renderView($callback);
    }

    if (is_array($callback)) {
      $controller = new $callback[0];
      $controller->action = $callback[1];
      Application::$app->controller = $controller;
      $callback[0] = $controller;
    }

    return call_user_func($callback, $this->request, $this->response);
    // echo '<pre>';
    // var_dump($callback, $this->request);
    // echo '</pre>';
    // exit;
  }

  public function renderView($view, $params = [])
  {
    return Application::$app->view->renderView($view, $params);
  }

  public function renderViewOnly($view, $params = [])
  {
    return Application::$app->view->renderViewOnly($view, $params);
  }
}