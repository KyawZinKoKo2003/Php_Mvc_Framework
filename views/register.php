<?php
/** @var $this app\core\view **/
$this->title="Register"
 ?>
<h1 class="d-flex justify-content-center">Create An Account</h1>
<?php  $form=\app\core\form\Form::begin('','post'); ?>
<div class="row">
  <div class="col">
    <?php echo $form->field($model,'firstname'); ?>
  </div>
  <div class="col">
    <?php echo $form->field($model,'lastname'); ?>
  </div>
</div>
<?php echo $form->field($model,'email'); ?>
<?php echo $form->field($model,'password')->passwordField(); ?>
<?php echo $form->field($model,'confirmPassword')->passwordField(); ?>
<button class="btn btn-primary">Register</button>
<?php \app\core\form\Form::end(); ?>
