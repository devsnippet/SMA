<?php

class UserController extends \BaseController {
	function __construct(){
		$this->rootUrl = \URL::to('/');	
	}
	private $rootUrl;
	public function post_login()
	{
		$username = Input::get("username");
		$password = Input::get("password");
		if($username == "admin" && $password == "password"){
			$user = array(
				"userid" => "154",
				"name" => "administrator"
			);
			Session::set('user_id', $user['userid']);
			$result = $this->constructResponse($user);
			$result["_links"]["next"] = array("href" => $this->rootUrl);
			return Response::json($result, 200);
		}
		else{
			$result = array(
				"message" => "Username or password incorrect",
				"embedded" => array(
					"username" => $username,
					"password" => $password
				)
			);
			return Response::json($result, 400);
		}
	}
	public function get_user($userid)
	{
		$user = array(
			"userid" => "154",
			"name" => "administrator"
		);
		return $this->constructResponse($user);
	}
	
	private function constructResponse($user){
		$result = array(
			'_links' => array(
				"self" => array( "href" => $this->rootUrl . '/api/user/' . $user['userid'] )
			),
			'embedded' => array(
				"ea:user" => array(
					"_links" => array(
						"self" => array( "href" => $this->rootUrl . '/api/user/' . $user['userid'] )
					),
					"userId" => $user['userid'],
					"userName" => $user['name']
				),
				"ea:menu" => array(
					array(
						"image" => "./images/home/tile-1.jpg",
						"button" => "View Students",
						"title" => "Students",
						"rel" => "student"
					),
					array(
						"image" => "./images/home/tile-2.jpg",
						"button" => "View Teachers",
						"title" => "Teachers",
						"rel" => "teacher"
					),
					array(
						"image" => "./images/home/tile-3.jpg",
						"button" => "View Exams",
						"title" => "Exams",
						"rel" => "exam"
					),
					array(
						"image" => "./images/home/tile-4.jpg",
						"button" => "View Events",
						"title" => "Events",
						"rel" => "event"
					)
				)
			)
		);
		return $result;
	}
}
