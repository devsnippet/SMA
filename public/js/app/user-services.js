'use strict';

/* Services */

var userServices = angular.module('userServices', ['ngResource']);

userServices.factory('UserService', ['$resource',
	function($resource){
		var href = sma.ApiRoute.route().links("ea:user").with({ "id" : "154" }).href();
    	return $resource(href, {}, {
      		query: {method:'GET', isArray:true}
    	});
  	}]);