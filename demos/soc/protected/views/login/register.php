<?php
/* @var $this LoginController */
/* @var $model RegisterForm */
/* @var $form CActiveForm  */
?>

<h1>Register</h1>

<p>Please fill out the following form with your login credentials:</p>

<div class="form">
	<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'register-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
	
    <p class="note">Fields with <span class="required">*</span> are required.</p>
	
    <div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
    </div>
	
    <div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
    </div>
	
    <div class="row">
		<?php echo $form->labelEx($model,'password2'); ?>
		<?php echo $form->passwordField($model,'password2'); ?>
		<?php echo $form->error($model,'password2'); ?>
    </div>

    <div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
    </div>
	
    <div class="row buttons">
		<?php echo CHtml::submitButton('Register'); ?>
    </div>
	
	<?php $this->endWidget(); ?>
</div><!-- form -->
