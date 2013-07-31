<?php
    /* @var $this UsersController */
    /* @var $model Users */
?>

<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Create',
);

    $this->menu=array(
    array('label'=>'List Users', 'url'=>array('index')),
    array('label'=>'Manage Users', 'url'=>array('admin')),
    );
    ?>

    <h1>Create Users</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>