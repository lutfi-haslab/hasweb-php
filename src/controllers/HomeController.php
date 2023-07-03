<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;

class HomeController extends Controller
{
  public function index()
  {
    return "Hello world dari Index!";
  }

  public function get(Request $request)
  {
    $body = $request->getBody();
    $isGet = $request->isGet();
    echo "<pre>";
    var_dump($body, $isGet);
    echo "</pre>";
  }
}