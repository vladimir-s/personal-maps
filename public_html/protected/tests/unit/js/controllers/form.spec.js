describe('Places Form controller', function() {
    var scope, rootScope, location, routeParams, controller, places;

    beforeEach(function() {
        module('personalmaps', function($provide) {
            $provide.value('lang', '');
        });

        inject(function($rootScope, $controller, $routeParams, $location, lang) {
            rootScope = $rootScope;
            scope = $rootScope.$new();
            location = $location;
            routeParams = $routeParams;
            controller = $controller;

            places = jasmine.createSpyObj('Places', ['getAll', 'get', 'add', 'update', 'delete', 'save']);
        });
    });

    it('should redirect to /list on place:added', function() {
        controller('PlacesFormController', {$scope: scope, $rootScope: rootScope, 'Places': places, $routeParams: routeParams, $location: location});
        rootScope.$emit('place:added', {id: 3});
        expect(location.path()).toBe('/list');
    });

    it('should redirect to /add if place not found', function() {
        routeParams.placeId = 2;
        scope.place = null;
        controller('PlacesFormController', {$scope: scope, $rootScope: rootScope, 'Places': places, $routeParams: routeParams, $location: location});
        expect(location.path()).toBe('/add');
    });

    it('should set errors', function() {
        controller('PlacesFormController', {$scope: scope, $rootScope: rootScope, 'Places': places, $routeParams: routeParams, $location: location});
        rootScope.$emit('place:error', {errors: []});
        expect(scope.errors.length).toBe(0);
        rootScope.$emit('place:error', {errors: ['111', '222']});
        expect(scope.errors.length).toBe(2);
        rootScope.$emit('place:error', {errors: ['111', '222', ['333', '444']]});
        expect(scope.errors.length).toBe(4);
    });
});