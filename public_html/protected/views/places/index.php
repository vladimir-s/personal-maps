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
    <div id="placesList">

        <ul>
            <li ng-repeat="place in places">{{ place.p_title }}</li>
        </ul>

        <span ng-show="isEmpty()">No places</span>

    </div>

    <form name="place" novalidate>

        <label>Title *:<br><input type="text" ng-model="place.p_title" name="pTitle" required>
        <span class="text-error" ng-show="place.$dirty && place.pTitle.$error.required">This field shouldn't be empty.</span></label>

        <label>Description:<br><textarea ng-model="place.p_description"></textarea></label>

        <label>Coordinates:<br><input type="text" ng-model="place.p_coords"></label>

        <button type="submit" ng-disabled="place.$invalid" ng-click="save()" class="btn btn-primary">{{ mode }}</button>
        <button type="reset" ng-click="clear()" class="btn">Reset</button>

    </form>
</div>