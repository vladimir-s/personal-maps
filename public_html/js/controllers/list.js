'use strict';

app.controller('PlacesListController', ['$scope', '$rootScope', 'Places', function($scope, $rootScope, Places) {
    $scope.places = Places.getAll();

    $rootScope.$on('places:updated', function() {
        $scope.places = Places.getAll();
    });

    $scope.isEmpty = function() {
        if ($scope.places.length === 0) {
            return true;
        }
        return false;
    }

    $scope.delete = function(place) {
        Places.delete(place);
    }

    $scope.show = function(place) {
        $rootScope.$broadcast('place:show', place);
    }
}]);
