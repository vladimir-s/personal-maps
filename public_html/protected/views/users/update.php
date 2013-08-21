<?php
    /* @var $this UsersController */
    /* @var $model Users */
?>

<?php
$this->breadcrumbs=array(
    Yii::t('app', 'USERS')=>array('index'),
	$model->id=>array('view','id'=>$model->id),
    Yii::t('app', 'UPDATE'),
);

$this->menu=array(
    array('label'=>Yii::t('app', 'OPERATIONS')),
    array('label'=>Yii::t('app', 'LIST_USERS'), 'url'=>array('index')),
    array('label'=>Yii::t('app', 'CREATE_USERS'), 'url'=>array('create')),
    array('label'=>Yii::t('app', 'VIEW_USERS'), 'url'=>array('view', 'id'=>$model->id)),
    array('label'=>Yii::t('app', 'MANAGE_USERS'), 'url'=>array('admin')),
);
?>

    <h1><?php echo Yii::t('app', 'UPDATE_USERS'); ?> <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>