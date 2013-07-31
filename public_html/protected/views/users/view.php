<?php
/* @var $this UsersController */
/* @var $model Users */
?>

<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List Users', 'url'=>array('index')),
array('label'=>'Create Users', 'url'=>array('create')),
array('label'=>'Update Users', 'url'=>array('update', 'id'=>$model->id)),
array('label'=>'Delete Users', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Users', 'url'=>array('admin')),
);
?>

<h1>View Users #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
'htmlOptions' => array(
'class' => 'table table-striped table-condensed table-hover',
),
'data'=>$model,
'attributes'=>array(
		'id',
		'u_name',
		'u_email',
		'u_pass',
),
)); ?>