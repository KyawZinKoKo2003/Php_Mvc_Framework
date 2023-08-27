<?php
use app\core\Application;

class m002_add_password_column{

  public function up(){
    $db=Application::$app->database;
    $SQL="ALTER TABLE users ADD COLUMN password VARCHAR(250) NOT NULL";
    $db->pdo->exec($SQL);
  }

  public function down(){
    $db=Application::$app->database;
    $SQL="ALTER TABLE users DROP COLUMN PASSWORD VARCHAR(250) NOT NULL";
    $db->pdo->exec($SQL);
  }
}

?>
