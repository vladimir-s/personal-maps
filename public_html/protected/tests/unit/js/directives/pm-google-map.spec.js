describe('Google maps directive', function() {
    var elm, scope, $translate, $httpBackend;

    beforeEach(module('personalmaps', function ($provide) {
        var Places = {
            'get': function() {},
            'getAll': function() {},
            'add': function() {},
            'update': function() {},
            'delete': function() {},
            'save': function() {}
        };
        spyOn(Places, 'getAll').andReturn([
            {
                id: 1,
                p_title: '111',
                p_description: 'test 1',
                p_lat: 0,
                p_lng: 0
            },
            {
                id: 2,
                p_title: '222',
                p_description: 'test 2',
                p_lat: 10,
                p_lng: 10
            }
        ]);
        $provide.provider('Places', {
            $get: function() {
                return Places;
            }
        });
        $provide.value('lang', 'en_us');
    }));

    beforeEach(inject(function($injector, $rootScope, $compile, Places) {

        spyOn($rootScope, '$broadcast');

        elm = angular.element(
            '<div class="span9 map" pm-google-map></div>'
        );

        scope = $rootScope;
        $compile(elm)(scope);
        scope.$digest();

        spyOn(scope.map, 'setCenter');
    }));


    it('should call getAll on places:updated', inject(function($compile, $rootScope, Places) {
        $rootScope.$emit('places:updated');
        expect(Places.getAll).toHaveBeenCalled();
    }));

    it('should fill markers array with places on places:updated', inject(function($compile, $rootScope) {
        $rootScope.$emit('places:updated');
        expect(scope.markers.length).toBe(2);
    }));

    it('should broadcast map:pointSelected on click', inject(function($compile, $rootScope) {
        google.maps.event.trigger(scope.map, 'click', {
            latLng: {
                lat: function() {return 0;},
                lng: function() {return 0;}
            }
        });
        expect($rootScope.$broadcast).toHaveBeenCalled();
    }));

    it('should remove marker from array on place:deleted', inject(function($compile, $rootScope) {
        $rootScope.$emit('places:updated');
        $rootScope.$emit('place:deleted', {id: 1});
        expect(scope.markers.length).toBe(1);
    }));

    it('should create empty markers array', inject(function($compile, $rootScope) {
        expect(scope.markers.length).toBe(0);
    }));

    it('should add marker on place:added event', inject(function($compile, $rootScope) {
        $rootScope.$emit('place:added', {
            id: 1,
            p_title: '111',
            p_description: 'test',
            p_lat: 0,
            p_lng: 0
        });
        expect(scope.markers.length).toBe(1);
    }));

    it('should call map.setCenter on place:show', inject(function($compile, $rootScope) {
        $rootScope.$emit('place:show', {
            id: 1,
            p_title: '111',
            p_description: 'test',
            p_lat: 0,
            p_lng: 0
        });
        expect(scope.map.setCenter).toHaveBeenCalled();
    }));
});