<?php

namespace app\core;

class Response
{
    public function setStatusCode(int $code)
    {
      var_dump($code);
        http_response_code($code);
    }
    public function redirect(string $url){
      header('Location: '.$url);
    }
}
