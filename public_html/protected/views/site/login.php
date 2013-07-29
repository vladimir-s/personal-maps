<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<h1>Login</h1>

<p>Please fill out the following form with your login credentials:</p>

<div class="form-horizontal">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="muted">Fields with <span class="required">*</span> are required.</p>

	<div class="control-group">
		<?php echo $form->labelEx($model,'username', array('class'=>'control-label')); ?>
        <div class="controls"><?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username', array('class'=>'text-error')); ?></div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'password', array('class'=>'control-label')); ?>
        <div class="controls"><?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password', array('class'=>'text-error')); ?>
		<p class="muted">
			Hint: You may login with <code>demo/demo</code> or <code>admin/admin</code>.
		</p></div>
	</div>

	<div class="control-group">
        <div class="controls"><?php echo $form->checkBox($model,'rememberMe'); ?>
        <?php echo $form->label($model,'rememberMe', array('class'=>'checkbox inline')); ?>
		<?php echo $form->error($model,'rememberMe', array('class'=>'text-error')); ?></div>
	</div>

	<div class="control-group">
        <div class="controls"><?php echo CHtml::submitButton('Login', array('class'=>'btn btn-success')); ?></div>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
