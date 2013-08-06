describe('Places List controller', function() {
    var scope, rootScope, dialog, routeParams, controller, places;

    beforeEach(function() {
        module('personalmaps', function($provide) {
            $provide.value('lang', '');
        });

        inject(function($rootScope, $controller, $routeParams, $dialog, lang) {
            rootScope = $rootScope;
            scope = $rootScope.$new();
            dialog = $dialog;
            routeParams = $routeParams;
            controller = $controller;

            dialog = {
                messageBox: function() {}
            }
            spyOn(dialog, 'messageBox').andReturn({
                open: function() {
                    return {
                        then: function() {}
                    }
                }
            });

            places = jasmine.createSpyObj('Places', ['getAll', 'get', 'add', 'update', 'delete', 'save']);
        });
    });

    it('should call getAll', function() {
        controller('PlacesListController', {$scope: scope, $rootScope: rootScope, 'Places': places, $routeParams: routeParams, $dialog: dialog});
        expect(places.getAll).toHaveBeenCalled();
    });

    it('should call getAll on places:updated event', function() {
        controller('PlacesListController', {$scope: scope, $rootScope: rootScope, 'Places': places, $routeParams: routeParams, $dialog: dialog});
        rootScope.$emit('places:updated');
        expect(places.getAll.calls.length).toEqual(2);
    });

    it('should open dialog on confirm call', function() {
        controller('PlacesListController', {$scope: scope, $rootScope: rootScope, 'Places': places, $routeParams: routeParams, $dialog: dialog});
        scope.confirm();
        expect(dialog.messageBox).toHaveBeenCalled();
    });
});