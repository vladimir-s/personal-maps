<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - ' . Yii::t('app', 'LOGIN');
$this->breadcrumbs=array(
    Yii::t('app', 'LOGIN'),
);
?>

<h1><?php echo Yii::t('app', 'LOGIN'); ?></h1>

<div class="form-horizontal">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="muted"><?php echo Yii::t('app', 'REQUIRED_FIELDS'); ?></p>

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
			<?php echo Yii::t('app', 'YOU_MAY_LOGIN_WITH'); ?>
            <code>user1/user1</code> <?php echo Yii::t('app', 'OR'); ?>
            <code>user2/user2</code> <?php echo Yii::t('app', 'OR'); ?>
            <code>user3/user3</code>.
		</p></div>
	</div>

	<div class="control-group">
        <div class="controls"><?php echo $form->checkBox($model,'rememberMe'); ?>
        <?php echo $form->label($model,'rememberMe', array('class'=>'checkbox inline')); ?>
		<?php echo $form->error($model,'rememberMe', array('class'=>'text-error')); ?></div>
	</div>

	<div class="control-group">
        <div class="controls"><?php echo CHtml::submitButton(Yii::t('app', 'LOGIN'), array('class'=>'btn btn-success')); ?></div>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
