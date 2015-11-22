'use strict';

/* Services */

var studentServices = angular.module('studentServices', ['ngResource']);

studentServices.factory('StudentListService', ['$resource',
	function($resource){
		var href = sma.ApiRoute.route().links("ea:student").href();
    	return $resource(href, {}, {
      		query: {method:'GET', isArray:true}
    	});
  	}]);

studentServices.factory('StudentService', ['$resource',
	function($resource){
		var href = sma.ApiRoute.route().links("ea:student").route("ea:one").with("id", ":id").href();
    	return $resource(href, {}, {
      		query: {method:'GET', params:{'id' : ''} , isArray:true}
    	});
  	}]);