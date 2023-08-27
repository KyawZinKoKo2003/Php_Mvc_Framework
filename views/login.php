<?php
/** @var $this app\core\view **/
$this->title= "Login"
 ?>
<h1 class="d-flex justify-content-center">Login</h1>
<?php  $form=\app\core\form\Form::begin('','post'); ?>
<?php echo $form->field($model,'email'); ?>
<?php echo $form->field($model,'password')->passwordField(); ?>

<button class="btn btn-primary">Login</button>
<?php \app\core\form\Form::end(); ?>
