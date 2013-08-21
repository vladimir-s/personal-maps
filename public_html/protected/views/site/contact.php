<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - ' . Yii::t('app', 'CONTACT_US');
$this->breadcrumbs=array(
    Yii::t('app', 'CONTACT'),
);
?>

<h1><?php echo Yii::t('app', 'CONTACT_US'); ?></h1>

<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>

<div class="form-horizontal">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contact-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="muted"><?php echo Yii::t('app', 'REQUIRED_FIELDS'); ?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="control-group">
		<?php echo $form->labelEx($model,'name', array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name', array('class'=>'text-error')); ?></div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'email', array('class'=>'control-label')); ?>
        <div class="controls"><?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email', array('class'=>'text-error')); ?></div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'subject', array('class'=>'control-label')); ?>
        <div class="controls"><?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'subject', array('class'=>'text-error')); ?></div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'body', array('class'=>'control-label')); ?>
        <div class="controls"><?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'body', array('class'=>'text-error')); ?></div>
	</div>

	<?php if(CCaptcha::checkRequirements()): ?>
	<div class="control-group">
		<?php echo $form->labelEx($model,'verifyCode', array('class'=>'control-label')); ?>
		<div class="controls">
		<?php $this->widget('CCaptcha'); ?>
		<?php echo $form->textField($model,'verifyCode'); ?>
        <?php echo $form->error($model,'verifyCode', array('class'=>'text-error')); ?>
        </div>
        <div class="muted controls"><?php echo Yii::t('app', 'ENTER_LETTERS_FROM_IMAGE'); ?>.
            <br/><?php echo Yii::t('app', 'LETTERS_NOT_CASE_SENSITIVE'); ?>.</div>
	</div>
	<?php endif; ?>

	<div class="control-group">
        <div class="controls"><?php echo CHtml::submitButton(Yii::t('app', 'SUBMIT'), array('class'=>'btn btn-success')); ?></div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>