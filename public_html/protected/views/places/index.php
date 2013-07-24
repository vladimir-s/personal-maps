<?php
Yii::app()->clientScript->registerScriptFile('js/angular.js', CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile('js/services/places.js', CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile('js/controllers/places.js', CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile('js/app.js', CClientScript::POS_END);
//Yii::app()->clientScript->registerScriptFile('js/require.js', CClientScript::POS_HEAD);
Yii::app()->clientScript->registerScript(
    'requiredScript'
    , 'angular.bootstrap(document, ["personalmaps"]);'
    , CClientScript::POS_END
);
?>
<div ng-controller="PlacesController">
{{ test }}
</div>