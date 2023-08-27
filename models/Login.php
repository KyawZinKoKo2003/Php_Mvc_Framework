<?php

namespace app\models;
use app\core\Model;
use app\models\User;
use app\core\Application;
class Login extends Model{

  public string $email='';
  public string $password='';

  public  function rules(){
    return [
      'email' => [self::RULE_REQUIRED,self::RULE_EMAIL],
      'password' => [self::RULE_REQUIRED]
    ];
  }
   public  function tableName():string {
        return 'users';
    }

    public function attribute(): array {
        return ['email', 'password'];
    }


  public function labels(){
  return [
    'email' => 'Email',
    'password' => 'Password'
    ]  ;
  }

  public function login(){

    $user = User::findOne(['email'=>$this->email]);

    if(!$user){
      $this->addError('email','This email is not registered');
      return false;
    }
    if(!password_verify($this->password,$user->password)){
      $this->addError('password', 'invalid password');
      return false;
    }
    
  return Application::$app->login($user);

  }
}

 ?>
