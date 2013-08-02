describe('Places Form controller', function() {
    var scope, rootScope, location, routeParams, controller, places;

    beforeEach(function() {
        module('personalmaps');

        inject(function($rootScope, $controller, $routeParams, $location) {
            rootScope = $rootScope;
            scope = $rootScope.$new();
            location = $location;
            routeParams = $routeParams;
            controller = $controller;

            places = jasmine.createSpyObj('Places', ['getAll', 'get', 'add', 'update', 'delete', 'save']);
        });
    });

//    it('should call getAll', function() {
//        expect(places.getAll).toHaveBeenCalled();
//    });
//
//    it('should call getAll on places:updated event', function() {
//        rootScope.$emit('places:updated');
//        expect(places.getAll.calls.length).toEqual(2);
//    });
//
//    it('should set Create mode on reset', function() {
//        scope.setCurrent({});
//        scope.reset();
//        expect(scope.mode).toEqual('Create');
//    });
//
//    it('should set Update mode on setCurrent', function() {
//        scope.reset();
//        scope.setCurrent({});
//        expect(scope.mode).toEqual('Update');
//    });
//
//    it('should return true if empty', function() {
//        scope.places = [];
//        expect(scope.isEmpty()).toEqual(true);
//        scope.places = [{}, {}];
//        expect(scope.isEmpty()).toEqual(false);
//    });

    it('should redirect to /edit/... on place:added', function() {
        controller('PlacesFormController', {$scope: scope, $rootScope: rootScope, 'Places': places, $routeParams: routeParams, $location: location});
        rootScope.$emit('place:added', {id: 3});
        expect(location.path()).toBe('/edit/3');
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