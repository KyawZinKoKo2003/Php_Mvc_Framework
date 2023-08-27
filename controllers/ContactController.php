<?php
  namespace app\controllers;
  use app\core\Application;
  use app\core\Controller;
  use app\core\Request;
  use app\core\Response;
  use app\models\ContactForm;
  class ContactController extends Controller{

      public  function home(){
        $params = [
          'name' => 'Kyaw Zin Ko Ko'
        ];
        return $this->render('home',$params);
      }

    public function contact(Request $request, Response $response){
      $contactForm = new ContactForm();
      if($request->isPost()){
        $contactForm->loadData($request->getBody());
        if($contactForm->validate() && $contactForm->send()){
          Application::$app->session->setFlash('success','Thank for contacting us');
          $response->redirect('/contact');
        }

      }
      return $this->render('contact',[
        'model' => $contactForm
      ]);
    }
  }
 ?>
