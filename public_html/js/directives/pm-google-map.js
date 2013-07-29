app.directive('pmGoogleMap', function factory($window, $rootScope, Places) {
    return {
        restrict: 'A',
        link: function(scope, element, attrs) {
            function setMapHeight() {
                var mapHeight = $window.innerHeight - $('header').height() - $('footer').height() - 20;
                element.css('height', mapHeight);
            }
            setMapHeight();

            var map = null;

            function initialize() {
                var defaults = {
                    center: new google.maps.LatLng(-34.397, 150.644),
                    zoom: 8,
                    panControl: true,
                    zoomControl: true,
                    scaleControl: true,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                map = new google.maps.Map(element[0], defaults);
            }
            if (map === null) {
                initialize();
            }

            function getDescription(place) {
                return '<h4>' + place.p_title + '</h4>' + markdown.toHTML(place.p_description);
            }

            function setMarkerOnClickEvent(marker) {
                google.maps.event.addListener(marker, 'click', function(event) {
                    var place = Places.get(marker.pid);
                    var latlng = new google.maps.LatLng(place.p_lat, place.p_lng);
                    infoBox.setContent(getDescription(place));
                    infoBox.setPosition(latlng);
                    infoBox.open(map);
                });
            }

            var markers = [];
            var infoBox = new google.maps.InfoWindow();

            $rootScope.$on('places:updated', function() {
                markers = [];
                infoBox.close();
                var bounds = new google.maps.LatLngBounds();
                angular.forEach(Places.getAll(), function(place) {
                    var latlng = new google.maps.LatLng(place.p_lat, place.p_lng);
                    bounds.extend(latlng);
                    var marker = new google.maps.Marker({
                        position: latlng,
                        map: map,
                        title: place.p_title,
                        pid: place.id
                    });
                    setMarkerOnClickEvent(marker);
                    markers.push(marker);
                });
                map.fitBounds(bounds);
            });

            $rootScope.$on('place:updated', function(event, place) {
                infoBox.close();
                angular.forEach(markers, function(marker) {
                    if (marker.pid == place.id) {
                        var latlng = new google.maps.LatLng(place.p_lat, place.p_lng);
                        marker.setTitle(place.p_title);
                        marker.setPosition(latlng);
                        map.setCenter(latlng);
                        infoBox.setContent(getDescription(place));
                        infoBox.setPosition(latlng);
                        infoBox.open(map);
                        return false;
                    }
                });
            });

            $rootScope.$on('place:added', function(event, place) {
                var latlng = new google.maps.LatLng(place.p_lat, place.p_lng);
                var marker = new google.maps.Marker({
                    position: latlng,
                    map: map,
                    title: place.p_title,
                    pid: place.id
                });
                setMarkerOnClickEvent(marker);
                markers.push(marker);
                infoBox.setContent(getDescription(place));
                infoBox.setPosition(latlng);
                infoBox.open(map);
                map.setCenter(latlng);
            });

            $rootScope.$on('place:show', function(event, place) {
                var latlng = new google.maps.LatLng(place.p_lat, place.p_lng);
                infoBox.setContent(getDescription(place));
                infoBox.setPosition(latlng);
                infoBox.open(map);
                map.setCenter(latlng);
            });

            $rootScope.$on('place:deleted', function(event, place) {
                infoBox.close();
                angular.forEach(markers, function(marker, i) {
                    if (marker.pid == place.id) {
                        marker.setMap(null);
                        markers.splice(i, 1);
                        return false;
                    }
                });
            });

            google.maps.event.addListener(map, 'click', function(event) {
                // $apply explanation http://jimhoskins.com/2012/12/17/angularjs-and-apply.html
                scope.$apply(function() {
                    $rootScope.$broadcast('map:pointSelected', {
                        p_lat: Math.round(event.latLng.lat() * 100) / 100,
                        p_lng: Math.round(event.latLng.lng() * 100) / 100
                    });
                });
            });
        }
    }
});