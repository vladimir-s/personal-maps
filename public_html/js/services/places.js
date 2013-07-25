'use strict';

angular.module('personalmaps.services', [])
    .factory('Places', ['$http', '$rootScope', function($http, $rootScope) {

        var places = [];

        function getPlaces() {
            $http({method: 'GET', url: 'api/places'})
                .success(function(data, status, headers, config) {
                    places = data;
                    $rootScope.$broadcast('places:updated');
                })
                .error(function(data, status, headers, config) {
                    console.log(data);
                });
        }
        getPlaces();

        var service = {};

        service.getAll = function() {
            return places;
        }

        service.get = function(id) {
            var place = null;
            angular.forEach(places, function(value) {
                if (parseInt(value.id) === parseInt(id)) {
                    place = value;
                    return false;
                }
            });
            return place;
        }

        service.add = function(place) {
            $http({method: 'POST', url: 'api/places', data: place})
                .success(function(data, status, headers, config) {
                    places.push(place);
                    $rootScope.$broadcast('places:added');
                })
                .error(function(data, status, headers, config) {
                    console.log(data);
                });
        }

        service.update = function(place) {
            $http({method: 'PUT', url: 'api/places/' + place.id})
                .success(function(data, status, headers, config) {
                    $rootScope.$broadcast('places:updated');
                })
                .error(function(data, status, headers, config) {
                    console.log(data);
                });
        }

        service.delete = function(place) {
            $http({method: 'DELETE', url: 'api/places/' + place.id})
                .success(function(data, status, headers, config) {
                    angular.forEach(places, function(value, i) {
                        if (parseInt(value.id) === parseInt(place.id)) {
                            places.splice(i, 1);
                            return false;
                        }
                    });
                    $rootScope.$broadcast('places:deleted');
                })
                .error(function(data, status, headers, config) {
                    console.log(data);
                });
        }

        return service;
}]);
