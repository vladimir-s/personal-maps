<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Contact Us';
$this->breadcrumbs=array(
	'Contact',
);
?>

<h1>Contact Us</h1>

<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>

<p>
If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
</p>

<div class="form-horizontal">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contact-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="muted">Fields with <span class="required">*</span> are required.</p>

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
        <div class="muted controls">Please enter the letters as they are shown in the image above.
            <br/>Letters are not case-sensitive.</div>
	</div>
	<?php endif; ?>

	<div class="control-group">
        <div class="controls"><?php echo CHtml::submitButton('Submit', array('class'=>'btn btn-success')); ?></div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>