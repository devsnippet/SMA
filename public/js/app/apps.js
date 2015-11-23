'use strict';

/* App Module */

var smaApp = angular.module('smaApp', [
  'ngRoute',
  'smaControllers',
  'userServices',
  'studentServices'  
]);

smaApp.config(['$routeProvider',
  function($routeProvider) {
    $routeProvider.
      when('/', {
        templateUrl: 'ng/user.home.html',
        controller: 'userHomeCtrl'
      }).
      when('/students', {
        templateUrl: 'ng/studentlist.html',
        controller: 'studentListCtrl'
      }).
      when('/student/:id', {
        templateUrl: 'ng/student.html',
        controller: 'studentCtrl'
      }).
      otherwise({
		templateUrl : 'ng/404.html',
        controller : 'notFoundCtrl'
      });
  }]);