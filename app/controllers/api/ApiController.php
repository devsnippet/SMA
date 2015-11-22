<?php

class ApiController extends \BaseController {
	function __construct(){
		$this->rootUrl = \URL::to('/');	
	}
	private $rootUrl;
	public function get(){
		$route = array(			
			'_links' => array(
				"self" => array( "href" => $this->rootUrl ),
				"ea:login" => array(
					'href' => $this->rootUrl . '/api/login'
				),
				"ea:user" => array(
					'href' => $this->rootUrl . '/api/user/{id}'
				),
				"ea:student" => array(
					'href' => $this->rootUrl . '/api/students'
				)
			)
		);
		$json = \q::z()->arrayToJSON($route);
		return Response::make($json, '200')->header('Content-Type', 'application/hal+json');
	}
}
