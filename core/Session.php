<?php

 namespace App\core;

 class Session{
   protected const FLASH_KEY = 'flash_message';
   public function __construct(){
     session_start();
     $flashMessage= $_SESSION[self::FLASH_KEY] ?? [];
     foreach($flashMessage as $key=>&$message){
       $message['remove'] = true;
     }
     $_SESSION[self::FLASH_KEY] = $flashMessage;

   }

   public function setFlash($key,$message){
     $_SESSION[self::FLASH_KEY][$key] = [
       'remove' => false,
       'value' => $message
      ];

   }

   public function getFlash($key){
     return $_SESSION[self::FLASH_KEY][$key]['value'] ?? false;
   }



   public function get($key){

     return $_SESSION[$key] ?? false;
   }

   public function set($key,$value){
      $_SESSION[$key] = $value;

   }
   public function remove($key){
     unset($_SESSION[$key]);
   }

   public function __destruct(){
     $flashMessage= $_SESSION[self::FLASH_KEY] ?? [];
     foreach($flashMessage as $key=>&$message){
       if($message['remove']){
         unset($flashMessage[$key]);
       }
     }
     $_SESSION[self::FLASH_KEY] = $flashMessage;

   }
 }


 ?>
