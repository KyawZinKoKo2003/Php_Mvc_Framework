<?php
namespace app\core\form;

class TextArea extends BaseField {
  public function renderInput(){
    return sprintf('
    <textarea name="%s" class="form-control %s">%s</textarea>
    ',
    $this->attribute,
    $this->model->getFirstError($this->attribute) ? 'is-invalid' : null,
     $this->model->{$this->attribute}
  );
  }
}
 ?>
