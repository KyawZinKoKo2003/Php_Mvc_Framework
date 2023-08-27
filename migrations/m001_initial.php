<?php
use app\core\Application;
class m001_initial{
  public function up(){
    $db=Application::$app->database;
    $SQL="CREATE TABLE users(
      id INT PRIMARY KEY AUTO_INCREMENT,
      firstname VARCHAR(250) NOT NULL,
      lastname VARCHAR(250) NOT NULL,
      email VARCHAR(250) NOT NULL,
      status TINYINT ,
      created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=INNODB";
    $db->pdo->exec($SQL);
  }
  public function down(){
    $db= Application::$app->database;
    $SQL="DROP TABLE users";
    $db->pdo->exec($SQL);
  }
}
?>
