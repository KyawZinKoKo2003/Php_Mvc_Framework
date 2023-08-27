<?php
namespace app\core;
use app\core\Application;
use app\core\middlewares\BaseMiddleware;
class Controller{
  public string $layout= 'main';
  public string $action = '';
  protected array $middlewares = [];

  public  function setLayout($layout){
    $this->layout = $layout;
  }
  public  function render($view,$params=[]):string{
    return Application::$app->view->renderView($view,$params);
  }
  public function registerMiddleware(BaseMiddleware $middleware){

    $this->middlewares[]=$middleware;


  }

  public function getMiddleware(){
    return $this->middlewares;
  }

}
 ?>
