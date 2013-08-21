<?php
/* @var $this UsersController */
/* @var $model Users */
?>

<?php
$this->breadcrumbs=array(
    Yii::t('app', 'USERS')=>array('index'),
	$model->id,
);

$this->menu=array(
    array('label'=>Yii::t('app', 'OPERATIONS')),
    array('label'=>Yii::t('app', 'LIST_USERS'), 'url'=>array('index')),
    array('label'=>Yii::t('app', 'CREATE_USERS'), 'url'=>array('create')),
    array('label'=>Yii::t('app', 'UPDATE_USERS'), 'url'=>array('update', 'id'=>$model->id)),
    array('label'=>Yii::t('app', 'DELETE_USERS'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>Yii::t('app', 'CONFIRM_DELETE'))),
    array('label'=>Yii::t('app', 'MANAGE_USERS'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'USER'); ?> #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
'htmlOptions' => array(
    'class' => 'table table-striped table-condensed table-hover',
),
'data'=>$model,
'attributes'=>array(
    'id',
    'u_name',
    'u_email',
    'u_role',
),
)); ?>