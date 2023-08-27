<?php
namespace app\core;

class View{
  public string $title='' ;

  public function renderView($view, array $params)
  {
    $viewContent = $this->renderOnlyContent($view ,$params);
      $renderLayout = $this->renderLayout();
      return str_replace('{{content}}', $viewContent, $renderLayout);
  }
  public function renderViewContent($viewContent){
    $renderLayout= $this->renderLayout();
    return str_replace('{{content}}', $viewContent, $renderLayout);
  }
  public function renderlayout()
  {
    $layout = Application::$app->layout;
    if(Application::$app->controller){
      $layout = Application::$app->controller->layout;
    }
      ob_start();
      require_once  Application::$rootPath . "/views/layout/$layout.php";
      return ob_get_clean();
  }
  public function renderOnlyContent($view,$params)
  {
       foreach ($params as $key => $value) {
         $$key=$value;
       }
       ob_start();
      require_once Application::$rootPath . "/views/$view.php";
      return ob_get_clean();
  }
}
?>
