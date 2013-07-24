'use strict';

angular.module('personalmaps.controllers', [])
    .controller('PlacesController', ['$scope', 'Places', function($scope, Places) {

        Places.getAll();
}]);
