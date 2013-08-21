<?php
/* @var $this UsersController */
/* @var $model Users */


$this->breadcrumbs=array(
	Yii::t('app', 'USERS')=>array('index'),
    Yii::t('app', 'MANAGE'),
);

$this->menu=array(
    array('label'=>Yii::t('app', 'OPERATIONS')),
    array('label'=>Yii::t('app', 'LIST_USERS'), 'url'=>array('index')),
    array('label'=>Yii::t('app', 'CREATE_USERS'), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$('#users-grid').yiiGridView('update', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1><?php echo Yii::t('app', 'MANAGE_USERS'); ?></h1>

<p>
    <?php echo Yii::t('app', 'YOU_MAY_ENTER_COMPARISON_OPERATOR'); ?> (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
        &lt;&gt;</b>
    <?php echo Yii::t('app', 'OR'); ?> <b>=</b>) <?php echo Yii::t('app', 'AT_THE_BEGINNING'); ?>.
</p>

<?php echo CHtml::link(Yii::t('app', 'ADVANCED_SEARCH'),'#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
    <?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'users-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
    'id',
    'u_name',
    'u_email',
    array(
        'class'=>'bootstrap.widgets.TbButtonColumn',
    ),
),
)); ?>