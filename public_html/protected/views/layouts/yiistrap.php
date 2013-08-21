<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <meta name="description" content="<?php echo CHtml::encode($this->pageTitle); ?>">
    <meta name="viewport" content="width=device-width">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link href="favicon.ico" rel="icon" type="image/x-icon" />

    <?php Yii::app()->bootstrap->register(); ?>

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/app.css" />
    <base href="<?php echo Yii::app()->createAbsoluteUrl('/'); ?>/">
</head>
<body>
<!--[if lt IE 7]>
<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
<![endif]-->

<header class="navbar navbar-fixed-top navbar-inverse">
        <div class="navbar-inner">
            <div class="container">
            <span class="brand"><?php echo CHtml::encode(Yii::app()->name); ?></span>
            <?php $this->widget('zii.widgets.CMenu',array(
                'items'=>array(
                    array('label'=>Yii::t('app', 'PLACES'), 'url'=>array('/places/index'), 'visible'=>!Yii::app()->user->isGuest),
                    array('label'=>Yii::t('app', 'USERS'), 'url'=>array('/users/index'), 'visible'=>Yii::app()->user->checkAccess('admin')),
                    array('label'=>Yii::t('app', 'ABOUT'), 'url'=>array('/site/page', 'view'=>'about')),
                    array('label'=>Yii::t('app', 'CONTACT'), 'url'=>array('/site/contact')),
                    array('label'=>Yii::t('app', 'LOGIN'), 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                    array('label'=>Yii::t('app', 'LOGOUT').' ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
                ),
                'activeCssClass'=>'active',
                'htmlOptions'=>array(
                    'class'=>'nav',
                ),
            )); ?>
            </div>
        </div>
</header>

<div class="container">
    <?php echo $content; ?>
</div>

<footer class="navbar-fixed-bottom">
    <div class="container">
            <p class="text-center">&copy; <a href="http://www.simplecoding.org">SimpleCoding.org</a> <?php echo date('Y'); ?></p>
        </div>
</footer>

</body>
</html>
