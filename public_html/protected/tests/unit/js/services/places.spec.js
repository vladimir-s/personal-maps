describe('Places service', function() {
    it('simply running', function() {
        expect(true).toBe(true);
    });

    var $httpBackend, injector;

    beforeEach(function() {
        module('personalmaps.services');

        inject(function($injector) {
            injector = $injector;
            $httpBackend = $injector.get('$httpBackend');
            $httpBackend.when('GET', 'api/places').respond([]);
        });
    });

    afterEach(function() {
        $httpBackend.verifyNoOutstandingExpectation();
        $httpBackend.verifyNoOutstandingRequest();
    });

    it('calls api/places', function() {
        $httpBackend.expectGET('api/places');
        injector.get('Places');
        $httpBackend.flush();
    });
});