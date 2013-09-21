describe('Places service', function() {
    var $httpBackend, injector;

    var response = [
        {
            'id': 1,
            'p_title': 'title 1',
            'p_description': 'desc 1',
            "p_lng": 50.4,
            "p_lat": 30.76,
            'p_user': 1
        },
        {
            'id': 2,
            'p_title': 'title 2',
            'p_description': 'desc 2',
            "p_lng": 50.4,
            "p_lat": 30.76,
            'p_user': 2
        }
    ];

    var newPlace = {
        'id': '3',
        'p_title': 'title 3',
        'p_description': 'desc 3',
        'p_lng': '50.4',
        'p_lat': '30.76',
        'p_user': 1
    };

    beforeEach(function() {
        module('personalmaps', function($provide) {
            $provide.value('lang', '');
        });

        inject(function($injector, lang) {
            injector = $injector;
            $httpBackend = $injector.get('$httpBackend');
            $httpBackend.when('GET', 'api/places').respond(response);
            $httpBackend.when('POST', 'api/places').respond(newPlace);
            $httpBackend.when('PUT', 'api/places/2').respond(response[1]);
            $httpBackend.when('PUT', 'api/places/5').respond(response[1]);
            $httpBackend.when('DELETE', 'api/places/2').respond('');
            $httpBackend.when('GET', 'foo/bar.json?lang=en').respond('[]');
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

    it('returns false for unknown places', function() {
        var places = injector.get('Places');
        $httpBackend.flush();
        expect(places.get('43534535')).toBe(null);
    });

    it('returns particular place', function() {
        var places = injector.get('Places');
        $httpBackend.flush();
        expect(places.get('1')).toEqual(response[0]);
    });

    it('returns all places', function() {
        var places = injector.get('Places');
        $httpBackend.flush();
        expect(places.getAll()).toEqual(response);
    });

    it('should update places from controller', function() {
        var places = injector.get('Places');
        $httpBackend.flush();
        var allPlaces = places.getAll();
        var firstPlace = places.get('1');
        firstPlace.p_title = 'test';
        expect(firstPlace).toEqual(allPlaces[0]);
    });

    it('should add new places', function() {
        var places = injector.get('Places');
        $httpBackend.flush();
        var allPlaces = places.getAll();
        $httpBackend.expectPOST('api/places');
        places.add(newPlace);
        $httpBackend.flush();
        expect(places.getAll().length).toEqual(3);
    });

    it('should update places', function() {
        var places = injector.get('Places');
        $httpBackend.flush();
        var secondPlace = places.get(2);
        secondPlace.p_title = 'test';
        $httpBackend.expectPUT('api/places/2');
        places.update(secondPlace);
        $httpBackend.flush();
        expect(places.get(2)).toEqual(secondPlace);
    });

    it('should delete places', function() {
        var places = injector.get('Places');
        $httpBackend.flush();
        var secondPlace = places.get(2);
        $httpBackend.expectDELETE('api/places/2');
        places.delete(secondPlace);
        $httpBackend.flush();
        expect(places.get(2)).toEqual(null);
    });

    it('should add places without id', function() {
        var places = injector.get('Places');
        $httpBackend.flush();
        $httpBackend.expectPOST('api/places');
        places.save({
            'p_title': 'some title'
        });
        $httpBackend.flush();
    });

    it('should update places with id', function() {
        var places = injector.get('Places');
        $httpBackend.flush();
        $httpBackend.expectPUT('api/places/5');
        places.save({
            'id': 5,
            'p_title': 'some title'
        });
        $httpBackend.flush();
    });
});