<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'users-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block"><?php echo Yii::t('app', 'REQUIRED_FIELDS'); ?></p>

    <?php echo $form->errorSummary($model); ?>

            <?php echo $form->textFieldControlGroup($model,'u_name',array('span'=>5,'maxlength'=>255)); ?>

            <?php echo $form->textFieldControlGroup($model,'u_email',array('span'=>5,'maxlength'=>255)); ?>

            <?php echo $form->passwordFieldControlGroup($model,'u_pass',array('span'=>5,'maxlength'=>255,'value'=>'')); ?>

            <?php echo $form->passwordFieldControlGroup($model,'u_pass_repeat',array('span'=>5,'maxlength'=>255,'value'=>'')); ?>

            <?php echo $form->dropDownListControlGroup($model, 'u_role', array('user'=>'user', 'admin'=>'admin'), array('class' => 'span5')); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? Yii::t('app', 'SAVE') : Yii::t('app', 'UPDATE'), array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->