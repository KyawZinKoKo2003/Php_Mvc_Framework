<?php

namespace app\core;
use app\core\exception\NotFoundException;
use app\core\Application;
class Router
{
    public Request $request;
    public Response $response;
    protected array $routes = [];
    public string $title = 'title';
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }
    public function get($path, $callBack)
    {
        $this->routes['get'][$path] = $callBack;
    }
    public function post($path, $callBack)
    {
        $this->routes['post'][$path] = $callBack;
    }
    public function resolve()
    {
        $path = $this->request->getPath();

        $method = $this->request->method();
        $callBack = $this->routes[$method][$path] ?? false;
        if ($callBack === false) {
            throw new NotFoundException();
        }
        if (is_string($callBack)) {
            return Application::$app->view->renderView($callBack);
        }
        if(is_array($callBack)){
          $controller = new $callBack[0]();
          Application::$app->controller=$controller;
          $controller->action = $callBack[1];
          foreach ($controller->getMiddleware() as $middleware) {
            $middleware->execute();

          }
          $callBack[0] = $controller;
        }

        return call_user_func($callBack,$this->request,$this->response);
    }
}
