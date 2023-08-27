<?php

namespace app\core;

use app\core\db\DbModel;
use app\core\db\Database;
class Application
{
    public static string $rootPath;
    public string $userClass;
    public string $layout='main';
    public Router  $router;
    public Request $request;
    public Response $response;
    public Database $database;
    public Session $session;
    public ?UserModel $user;
    public static Application $app;
    public Controller $controller;
    public View $view;
    public function __construct($path,array $config)
    {
        self::$rootPath = $path;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->controller = new Controller();
        $this->view = new View();
        $this->router = new Router($this->request, $this->response);
        $this->database= new Database($config['db']);
        $this->userClass = $config['userClass'];

        $primaryValue = $this->session->get('user');

        if($primaryValue){
          $primaryKey=$this->userClass::primaryKey();
          $this->user=$this->userClass::findOne([$primaryKey => $primaryValue]);
          return true;
        }
        else{
          $this->user= null;
        }
    }

    public function run()
    {
      try {
          echo $this->router->resolve();
      } catch (\Exception $e) {
        $this->response->setStatusCode($e->getCode());
        echo $this->view->renderView('_error',[
          'errors' =>$e
        ]);
      }


    }

    public static function isGuest(){
      return !self::$app->user;
    }

    public function login(UserModel $user){
      $this->user = $user;
      $primaryKey = $this->userClass::primaryKey();
      $primaryValue=$user->{$primaryKey};
      $this->session->set('user',$primaryValue);
      return true;
    }

    public function logout(){
      $this->user=null;
      $this->session->remove('user');
    }
}
