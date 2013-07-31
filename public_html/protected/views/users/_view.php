<?php
/* @var $this UsersController */
/* @var $data Users */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('u_name')); ?>:</b>
	<?php echo CHtml::encode($data->u_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('u_email')); ?>:</b>
	<?php echo CHtml::encode($data->u_email); ?>
	<br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('u_role')); ?>:</b>
    <?php echo CHtml::encode($data->u_role); ?>
    <br />
</div>