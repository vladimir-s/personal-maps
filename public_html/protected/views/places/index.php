<?php
Yii::app()->clientScript->registerScriptFile('js/require.js', CClientScript::POS_HEAD);
Yii::app()->clientScript->registerScript('requiredScript', '
require.config({
    baseUrl: "js",
	shim: {
		"angular": {
			exports: "angular"
		}
	}
    });

    require(["angular", "app", "controllers/places"],
        function() {
            angular.bootstrap(document, ["personalmaps"]);
        }
    );
', CClientScript::POS_END);
?>
<div ng-controller="PlacesController">
{{ test }}
</div>