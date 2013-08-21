<?php
    /* @var $this UsersController */
    /* @var $model Users */
?>

<?php
$this->breadcrumbs=array(
    Yii::t('app', 'USERS')=>array('index'),
    Yii::t('app', 'CREATE'),
);

$this->menu=array(
    array('label'=>Yii::t('app', 'OPERATIONS')),
    array('label'=>Yii::t('app', 'LIST_USERS'), 'url'=>array('index')),
    array('label'=>Yii::t('app', 'MANAGE_USERS'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'CREATE_USERS'); ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>