describe('Places controller', function() {
    var scope, rootScope, ctrl, places;

    beforeEach(function() {
        module('personalmaps.controllers');

        inject(function($rootScope, $controller) {
            rootScope = $rootScope;
            scope = $rootScope.$new();

            places = jasmine.createSpyObj('Places', ['getAll', 'get', 'add', 'update', 'delete', 'save']);
            ctrl = $controller('PlacesController', {$scope: scope, 'Places': places});

        });
    });

    it('should call getAll', function() {
        expect(places.getAll).toHaveBeenCalled();
    });

    it('should call getAll on places:updated event', function() {
        rootScope.$emit('places:updated');
        expect(places.getAll.calls.length).toEqual(2);
    });

    it('should set Create mode on reset', function() {
        scope.setCurrent({});
        scope.reset();
        expect(scope.mode).toEqual('Create');
    });

    it('should set Update mode on setCurrent', function() {
        scope.reset();
        scope.setCurrent({});
        expect(scope.mode).toEqual('Update');
    });

    it('should return true if empty', function() {
        scope.places = [];
        expect(scope.isEmpty()).toEqual(true);
        scope.places = [{}, {}];
        expect(scope.isEmpty()).toEqual(false);
    });
});