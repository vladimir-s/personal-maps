<?php
Yii::app()->clientScript->registerScriptFile('//maps.googleapis.com/maps/api/js?sensor=false', CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/markdown.js', CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile('//ajax.googleapis.com/ajax/libs/angularjs/1.0.7/angular.min.js', CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/ui-bootstrap-tpls-0.4.0.min.js', CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/app.js', CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/services/places.js', CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/controllers/list.js', CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/controllers/form.js', CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/directives/pm-google-map.js', CClientScript::POS_END);
Yii::app()->clientScript->registerScript(
    'requiredScript'
    , '
    angular.bootstrap(document, ["personalmaps"]);
    '
    , CClientScript::POS_END
);
?>
<div class="row-fluid">

    <div class="span9 map" pm-google-map>

    </div>

    <div class="span3" ng-view></div>
</div>
