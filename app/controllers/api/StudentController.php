<?php

class StudentController extends \BaseController {
	function __construct(){
		$this->rootUrl = \URL::to('/');	
	}
	private $rootUrl;
	public function get_list()
	{
		$result = array(
			'_links' => array(
				"self" => array( "href" => $this->rootUrl . '/api/student/list' ),
				"ea:one" => array( "href" => $this->rootUrl . '/api/student/{id}' )
			),
			'embedded' => array(
				"ea:students" => array(
					array(
						"_links" => array(
							"self" => array( "href" => $this->rootUrl . '/api/student/view/' . "151" )
						),
						"id" => "151",
						"name" => "Alice",
						"image" => "./images/student/151.jpg"
					),
					array(
						"_links" => array(
							"self" => array( "href" => $this->rootUrl . '/api/student/view/' . "152" )
						),
						"id" => "152",
						"name" => "Bob",
						"image" => "./images/student/152.jpg"
					),
					array(
						"_links" => array(
							"self" => array( "href" => $this->rootUrl . '/api/student/view/' . "153" )
						),
						"id" => "153",
						"name" => "Charlie",
						"image" => "./images/student/153.jpg"
					),
					array(
						"_links" => array(
							"self" => array( "href" => $this->rootUrl . '/api/student/view/' . "154" )
						),
						"id" => "154",
						"name" => "Dave",
						"image" => "./images/student/154.jpg"
					),
					array(
						"_links" => array(
							"self" => array( "href" => $this->rootUrl . '/api/student/view/' . "155" )
						),
						"id" => "155",
						"name" => "Elisa",
						"image" => "./images/student/155.jpg"
					)
				)
			)
		);
		return Response::json($result, 200);
	}
	
	public function get_student($id)
	{
		$result = array();
		if($id == 151){
			$result = array(
				'_links' => array(
					"self" => array( "href" => $this->rootUrl . '/api/student/' . $id )
				),
				"embedded" => array(
					"ea:student" => array(
						"id" => "151",
						"name" => "Alice",
						"image" => "./images/student/151.jpg"
					)
				)
			);
		}
		else if($id == 152){
			$result = array(
				'_links' => array(
					"self" => array( "href" => $this->rootUrl . '/api/student/' . $id )
				),
				"embedded" => array(
					"ea:student" => array(
						"id" => "152",
						"name" => "Bob",
						"image" => "./images/student/152.jpg"
					)
				)
			);
		}
		else if($id == 153){
			$result = array(
				'_links' => array(
					"self" => array( "href" => $this->rootUrl . '/api/student/' . $id )
				),
				"embedded" => array(
					"ea:student" => array(
						"id" => "153",
						"name" => "Charlie",
						"image" => "./images/student/153.jpg"
					)
				)
			);
		}
		else if($id == 154){
			$result = array(
				'_links' => array(
					"self" => array( "href" => $this->rootUrl . '/api/student/' . $id )
				),
				"embedded" => array(
					"ea:student" => array(
						"id" => "154",
						"name" => "Dave",
						"image" => "./images/student/154.jpg"
					)
				)
			);
		}
		else if($id == 155){
			$result = array(
				'_links' => array(
					"self" => array( "href" => $this->rootUrl . '/api/student/' . $id )
				),
				"embedded" => array(
					"ea:student" => array(
						"id" => "155",
						"name" => "Elisa",
						"image" => "./images/student/155.jpg"
					)
				)
			);
		}
		else{
			$result = array(
				'_links' => array(
					"self" => array( "href" => $this->rootUrl . '/api/student/' . $id )
				),
				"embedded" => array(
					"ea:input" => array(
						"id" => $id
					)
				)
			);
			return Response::json($result, 404);
		}
		
		return Response::json($result, 200);
	}
}
