'use strict';

angular.module('personalmaps.controllers', [])
    .controller('PlacesController', ['$scope', '$rootScope', 'Places', function($scope, $rootScope, Places) {
        $scope.places = Places.getAll();

        $scope.place = {};
        $scope.mode = 'Create';

        $rootScope.$on('places:updated', function() {
            $scope.places = Places.getAll();
        });

        $scope.isEmpty = function() {
            if ($scope.places.length === 0) {
                return true;
            }
            return false;
        }

        $scope.save = function() {
            Places.save($scope.place);
        }

        $scope.reset = function() {
            $scope.place = {};
            $scope.mode = 'Create';
        }

        $scope.setCurrent = function(place) {
            $scope.place = place;
            $scope.mode = 'Update';
        }
}]);
