<?php
namespace app\controllers;
use app\core\Controller;
use app\core\Request;
use app\models\User;
use app\core\Response;
use app\core\Application;
use app\models\Login;
use app\core\middlewares\AuthMiddleware;
class AuthController extends Controller{
  public function __construct(){
    $this->registerMiddleware(new AuthMiddleware(['profile']));
  }
  public  function register(Request $request){
    $user = new User();
    if($request->isPost()){
    $user->loadData($request->getBody());

    if($user->validate() && $user->save() ){
      Application::$app->session->setFlash('success','Thank you for registering');
      Application::$app->response->redirect('/');
    }
    }
    $this->setLayout('auth');
    return $this->render('register',[
      'model' => $user
    ]);
  }
  public  function login(Request $request,Response $response){
    $loginForm=new Login();
    if($request->isPost()){
      $loginForm->loadData($request->getBody());
        if($loginForm->validate() && $loginForm->login()){
          $response->redirect('/');
          return;
        }

    }
    $this->setLayout('auth');
    return $this->render('login',[
      'model'=>$loginForm
    ]);
  }

  public function profile(){

    return $this->render('profile');
  }

  public function logout(Request $request,Response $response){
    Application::$app->logout();
    return $response->redirect('/');
  }
}
 ?>
