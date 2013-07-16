define(['app'], function(app) {
    app.factory('Places', ['$http', '$rootScope', function($http, $rootScope) {

        var places = [];

        function getPlaces() {
            $http({method: 'GET', url: 'api/places'}).
                success(function(data, status, headers, config) {
                    places = data;
                    $rootScope.$broadcast('places:updated');
                }).
                error(function(data, status, headers, config) {
                    console.log(data);
                });
        }
        getPlaces();



        var service = {};

        service.getAll = function() {
            return places;
        }

        service.get = function(id) {
            var place;
            angular.forEach(places, function(value) {
                if (parseInt(value.id) === parseInt(id)) {
                    place = value;
                    return false;
                }
            });
            return place;
        }

        return service;
    }]);
});