<?php
/** @var $this app\core\view **/
/** @var $model app\core\models\ContactForm **/
use app\core\form\TextArea;

$this->title= "Contact"
 ?>
<h1>contact</h1>
<?php $form=\app\core\form\Form::begin('','post') ?>
<?php echo $form->field($model,'subject');?>
<?php echo $form->field($model,'email');?>
<?php echo new TextArea($model,'body');?>
<button class="btn btn-primary">Send</button>
<?php echo \app\core\form\Form::end() ?>
