'use strict';

/* Controllers */

var smaControllers = angular.module('smaControllers', []);

smaControllers.controller('userHomeCtrl', ['$scope', '$routeParams', 'UserService',
function($scope, $routeParams, UserService) {
	$scope.obj = UserService.get(function(user) {
		$scope.menus = user["embedded"]["ea:menu"];
    });
	
	$scope.menuUrl = function(menu){
		if(menu.rel == "student"){
			return "#/students";
		}
		else if(menu.rel == "teacher"){
			return "#/teachers";
		}
		else if(menu.rel == "exams"){
			return "#/exams";
		}
		else if(menu.rel == "events"){
			return "#/events";
		}
		else{
			return "#/";
		}
	};
	
	(function($){
		$('.bxslider').bxSlider({
			autoStart:true,
			auto: true,
			speed:500,
			mode: 'fade',
			captions: false,
			pager: false
		});
	}(jQuery));
}]);

smaControllers.controller('studentListCtrl', ['$scope', '$routeParams', 'StudentListService',
function($scope, $routeParams, StudentListService) {
	$scope.obj = StudentListService.get(function(student) {
		$scope.students = student["embedded"]["ea:students"];
		$scope.studentRows = studentsToRowCol($scope.students);
    });
	
	var studentsToRowCol = function(students){
		var i;
		var j;
		var rows = Array();
		for(i = 0; i < Math.ceil(students.length / 3) ; i++){
			var row = Array();
			for(j = i*3; j < Math.min(students.length, i * 3 + 3); j++){
				row.push(students[j]);
			}
			rows.push({ students: row });
		}
		return rows;
	};
}]);

smaControllers.controller('studentCtrl', ['$scope', '$routeParams', 'StudentService',
function($scope, $routeParams, StudentService) {
	$scope.obj = StudentService.get({id: $routeParams.id}, function(student) {
		console.log(student);
		$scope.name = student["embedded"]["ea:student"]["name"];
		$scope.image = student["embedded"]["ea:student"]["image"];
    });
}]);