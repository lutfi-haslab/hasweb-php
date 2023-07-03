<?php

namespace app\core;

class Application
{
  public static string $ROOT_DIR;
  public string $layout = 'main';
  public Request $request;
  public Router $router;
  public View $view;
  public Response $response;
  public ?Controller $controller = null;
  public static Application $app;
  public function __construct($rootPath)
  {
    self::$ROOT_DIR = $rootPath;
    self::$app = $this;
    $this->request = new Request();
    $this->response = new Response();
    $this->router = new Router($this->request, $this->response);
    $this->view = new View();
  }

  public function run()
  {
    echo $this->router->resolve();
  }
}