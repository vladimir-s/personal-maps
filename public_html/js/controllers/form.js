'use strict';

app.controller('PlacesFormController'
    , ['$scope', '$rootScope', 'Places', '$routeParams', '$location'
    , function($scope, $rootScope, Places, $routeParams, $location) {

    $scope.place = {};
    $scope.isNew = true;
    $scope.saving = false;

    $scope.showErrors = false;
    $scope.errors = [];

    if ($routeParams.placeId !== undefined) {
        $scope.place = Places.get($routeParams.placeId);
        if (undefined === $scope.place || null === $scope.place) {
            //place with this id not found
            $location.path('/add').replace();
        }
        $scope.isNew = false;
    }

    $scope.save = function() {
        Places.save($scope.place);
        $scope.saving = true;
        $scope.showErrors = false;
    }

    $rootScope.$on('place:updated', function() {
        $scope.saving = false;
    });

    $rootScope.$on('place:added', function(event, data) {
        $scope.saving = false;
        $location.path('/list').replace();
    });

    $rootScope.$on('place:error', function(event, data) {
        $scope.showErrors = true;
        $scope.errors = [];
        angular.forEach(data.errors, function(error) {
            if (typeof error == 'object') {
                angular.forEach(error, function(err) {
                    $scope.errors.push(err);
                });
            }
            else {
                $scope.errors.push(error);
            }
        });
        $scope.saving = false;
    });

    $rootScope.$on('map:pointSelected', function(event, data) {
        $scope.place.p_lat = data.p_lat;
        $scope.place.p_lng = data.p_lng;
    });
}]);
