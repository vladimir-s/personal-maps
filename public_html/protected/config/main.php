<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Personal maps',

    'aliases' => array(
        'bootstrap' => realpath(__DIR__ . '/../extensions/yiistrap'), // change this if necessary
    ),

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
        'bootstrap.helpers.TbHtml',
	),

    'homeUrl'=>array('site/login'),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'12345',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
            'generatorPaths' => array('bootstrap.gii'),
        ),
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
                // REST patterns
                array('<controller>/list', 'pattern'=>'api/<controller:\w+>', 'verb'=>'GET'),
                array('<controller>/view', 'pattern'=>'api/<controller:\w+>/<id:\d+>', 'verb'=>'GET'),
                array('<controller>/update', 'pattern'=>'api/<controller:\w+>/<id:\d+>', 'verb'=>'PUT'),
                array('<controller>/delete', 'pattern'=>'api/<controller:\w+>/<id:\d+>', 'verb'=>'DELETE'),
                array('<controller>/create', 'pattern'=>'api/<controller:\w+>', 'verb'=>'POST'),
                // regular patterns
                '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
            'showScriptName'=>false,
		),
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=personalmaps',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'vvv',
			'charset' => 'utf8',
		),
        'bootstrap' => array(
            'class' => 'bootstrap.components.TbApi',
        ),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'vladimirsta@yandex.ru',
	),
);