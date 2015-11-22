<?php
	namespace lib;
	
	class ApiRoute{
		function __construct($context){
			$this->context = $context;
		}
		private $context;
		
		function get($module, $access = NULL){
			$result = $this->context->apiRoute;
			if(empty($access)){
				return $result[$module];
			}
			else{
				$resultEnum = \q::enum($result[$module]);
				return $resultEnum->where(function($k) use ($access) {
					return \q::enum($access)->contains($k['link']['rel']);
				})->val();
			}
		}
	}
?>