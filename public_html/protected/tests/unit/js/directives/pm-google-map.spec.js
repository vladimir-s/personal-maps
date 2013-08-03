describe('Google maps directive', function() {
    var elm, scope;

//    var Places = jasmine.createSpyObj('Places', ['getAll', 'get', 'add', 'update', 'delete', 'save']);

    // load the tabs code
    beforeEach(module('personalmaps', function ($provide) {
        $provide.provider('Places', {
            $get: function() { return {}; },
            getAll: function () { return {}; },
            get: function () { return {}; },
            add: function () { return {}; },
            update: function () { return {}; },
            delete: function () { return {}; },
            save: function () { return {}; }
        })}
    ));

    beforeEach(inject(function($rootScope, $compile, Places) {
        // we might move this tpl into an html file as well...
        elm = angular.element(
            '<div class="span9 map" pm-google-map></div>'
        );

        scope = $rootScope;
        $compile(elm)(scope);
        scope.$digest();
    }));


    it('should work', inject(function($compile, $rootScope) {
        expect(true).toBe(true);
    }));
});