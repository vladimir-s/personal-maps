'use strict';

app.controller('PlacesFormController', ['$scope', '$rootScope', 'Places', '$routeParams', '$location', function($scope, $rootScope, Places, $routeParams, $location) {
    $scope.place = {};
    $scope.isNew = true;
    if ($routeParams.placeId !== undefined) {
        $scope.place = Places.get($routeParams.placeId);
        if (null === $scope.place) {
            //place with this id not found
            $location.path('/add').replace();
        }
        $scope.isNew = false;
    }

    $scope.save = function() {
        Places.save($scope.place);
    }
}]);
