<?php
class q{
	public static function z(){
	    return new \lib\Common();	
	}
	public static function enum($array){
	    return new \lib\Enum($array);
	}
	public static function context(){
	    return \lib\Context::get();	
	}
	public static function apiRoute(){
		return new \lib\ApiRoute(q::context());
	}
}
?>