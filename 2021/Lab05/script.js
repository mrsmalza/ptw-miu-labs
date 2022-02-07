
var scotchApp = angular.module('scotchApp' , ['ngRoute']);
scotchApp.config(function($routeProvider){
	$routeProvider
	.when('/', {
		templateUrl : 'pages/home.html' ,
		controller : 'mainController'
	})
	.when('/about', {
		templateUrl: 'pages/about.html' ,
		controller: 'aboutController'
	})
	.when('/contact', {
		templateUrl : 'pages/contact.html' ,
		controller : 'contactController'
	})
	.when('/cv', {
		templateUrl : 'pages/cv.html' ,
		controller : 'cvController'
	});
});
scotchApp.controller('mainController' , function($scope) {
	$scope.message = 'Witaj na mojej stronie !';
});

scotchApp.controller('aboutController' , function($scope) {
	$scope.message = 'Tu powiem coś więcej o mnie!';
});
scotchApp.controller('contactController' , function($scope) {
	$scope.message = 'Tu cos jest o kontakcie !';
});
scotchApp.controller('cvController' , function($scope) {
	$scope.message = 'Tu cos o cv !';
});
