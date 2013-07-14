<?php
Yii::app()->clientScript->registerScriptFile('js/require.js', CClientScript::POS_HEAD);
Yii::app()->clientScript->registerScript( 'requiredScript', '
require.config({
    baseUrl: "js",
	shim: {
		"angular.min": {
			exports: "angular"
		}
	}
    });

    require(["angular", "app"],
        function() {
            angular.bootstrap(document, ["personalmaps"]);
        }
    );
', CClientScript::POS_END );
?>
<h1>Places</h1>