'use strict';

app.factory('Places', ['$http', '$rootScope', function($http, $rootScope) {

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
                places.push(data);
                $rootScope.$broadcast('place:added', data);
            })
            .error(function(data, status, headers, config) {
                $rootScope.$broadcast('place:error', data);
            });
    }

    service.update = function(place) {
        $http({method: 'PUT', url: 'api/places/' + place.id, data: place})
            .success(function(data, status, headers, config) {
                $rootScope.$broadcast('place:updated', data);
            })
            .error(function(data, status, headers, config) {
                $rootScope.$broadcast('place:error', data);
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
                $rootScope.$broadcast('place:deleted', data);
            })
            .error(function(data, status, headers, config) {
                $rootScope.$broadcast('place:error', data);
            });
    }

    service.save = function(place) {
        if (undefined !== place.id && parseInt(place.id) > 0) {
            service.update(place);
        }
        else {
            service.add(place);
        }
    }

    return service;
}]);
