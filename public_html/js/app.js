'use strict';

var app = angular.module('personalmaps', ['ui.bootstrap'])
    .config(['$routeProvider', 'baseUrl', function($routeProvider, baseUrl) {
        $routeProvider.when('/list', {
            templateUrl: baseUrl + '/partials/list.html',
            controller: 'PlacesListController'
        });
        $routeProvider.when('/add', {
            templateUrl: baseUrl + '/partials/form.html',
            controller: 'PlacesFormController'
        });
        $routeProvider.when('/edit/:placeId', {
            templateUrl: baseUrl + '/partials/form.html',
            controller: 'PlacesFormController'
        });
        $routeProvider.otherwise({
            redirectTo: '/list'
        });
    }]);
