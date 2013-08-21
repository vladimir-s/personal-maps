<?php
/* @var $this UsersController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('app', 'Users'),
);

$this->menu=array(
    array('label'=>Yii::t('app', 'Operations')),
    array('label'=>Yii::t('app', 'Create Users'),'url'=>array('create')),
    array('label'=>Yii::t('app', 'Manage Users'),'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'USERS'); ?></h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
)); ?>