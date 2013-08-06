'use strict';

var app = angular.module('personalmaps', ['ui.bootstrap', 'pascalprecht.translate'])
    .value('lang', lang);

//app.config(['$translateProvider', function($translateProvider) {
//    $translateProvider.useUrlLoader('foo/bar.json');
//    $translateProvider.preferredLanguage(lang);
//}]);
app.config(['$translateProvider', function($translateProvider) {
    // add translation table
    $translateProvider.translations(translations);
}]);

app.config(['$routeProvider', function($routeProvider) {
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

//app.run(['$translate', 'lang', function($translate, lang) {
//    $translate.uses(lang);
//}]);