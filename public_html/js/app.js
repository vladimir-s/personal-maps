'use strict';

var app = angular.module('personalmaps', ['ui.bootstrap'])
    .config(['$routeProvider', function($routeProvider) {
        $routeProvider.when('/list', {
            templateUrl: 'partials/list.html',
            controller: 'PlacesListController'
        });
        $routeProvider.when('/add', {
            templateUrl: 'partials/form.html',
            controller: 'PlacesFormController'
        });
        $routeProvider.when('/edit/:placeId', {
            templateUrl: 'partials/form.html',
            controller: 'PlacesFormController'
        });
        $routeProvider.otherwise({
            redirectTo: '/list'
        });
    }]);
