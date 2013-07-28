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

            var markers = [];

            $rootScope.$on('places:updated', function() {
                markers = [];
                var bounds = new google.maps.LatLngBounds();
                angular.forEach(Places.getAll(), function(place) {
                    var latlng = new google.maps.LatLng(place.p_lat, place.p_lng);
                    bounds.extend(latlng);
                    markers.push(new google.maps.Marker({
                        position: latlng,
                        map: map,
                        title: place.p_title
                    }));
                });
                map.fitBounds(bounds);
            });

            var infoBox = new google.maps.InfoWindow();

            $rootScope.$on('place:show', function(event, place) {
                var latlng = new google.maps.LatLng(place.p_lat, place.p_lng);
                infoBox.setContent('<h3>' + place.p_title + '</h3>' + '<p>' + place.p_description + '</p>');
                infoBox.setPosition(latlng);
                infoBox.open(map);
                map.setCenter(latlng);
            });
        }
    }
});