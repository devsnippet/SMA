<?php
	namespace lib;
	class Context{
		public static $current;
		public static function get(){
			if(Context::$current == NULL){
				Context::$current = new Context();
			}
			return Context::$current;
		}
		
		function __construct(){
			$this->rootUrl = \URL::to('/');
		}
		
		public $rootUrl;
	}
?>