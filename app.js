 var app = angular.module("myApp", ["ngRoute"]);
 app.config(function($routeProvider) {
     $routeProvider
     .when("/", {
         templateUrl : "main.php"
     })
     .when("/database", {
         templateUrl : "cart.php"
     })
     .when("/signup", {
         templateUrl : "signup.php"
     })
     .when("/services", {
         templateUrl : "services.html"
     })
     .when("/signin", {
        templateUrl : "signin.php"
    })
    .when("/rideToDest", {
        templateUrl : "rideToDestination.php"
    })
    .when("/ride&deliver", {
        templateUrl : "ride&deliver.php"
    })
    .when("/choice", {
        templateUrl : "choice.html"
    })
    .when("/ridegreenb", {
        templateUrl : "ridegreenb.php"
    })
    .when("/ridegreena", {
        templateUrl : "ridegreena.php"
    })
    .when("/comparea", {
        templateUrl : "comparea.php"
    })
    .when("/compareb", {
        templateUrl : "compareb.php"
    })
    .when("/rentcar", {
        templateUrl : "rentacar.php"
    })
    .when("/review", {
        templateUrl : "review.php"
    })
 });
