angular.module('map', [])
    .controller('MapController', function($scope, $rootScope, $compile) {
        function initialize() {

            $scope.map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                center: { lat: 43.658298, lng: -79.380783 }
            });

            $scope.cities =
                 { title: 'Ryerson', lat: 43.658298, lng: -79.380783 };

                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng($scope.cities.lat, $scope.cities.lng),
                    map: $scope.map,
                    title: $scope.cities.title
                });
        }
        google.maps.event.addDomListener(window, 'load', initialize);

    });
