<?php
	namespace lib;
	
	class Linq {
		public static function where($data, $handler){
			$result = array();
			for($i = 0; $i < count($data); $i++){
				if($handler($data[$i])){
					array_push($result, $data[$i]);
				}
			}
			return $result;
		}
		
		public static function select($data, $handler){
			$result =  array();
			for($i = 0; $i < count($data); $i++){
				$items = $handler($data[$i]);
				if($items != null){
					array_push($result, $items);
				}
			}
			return $result;
		}
		
		public static function firstOrNull($data, $handler){
			return Linq::firstOrDefault($data, $handler, NULL);
		}
		
		public static function firstOrDefault($data, $handler, $default = NULL){
			for($i = 0; $i < count($data); $i++){
				if($handler($data[$i])){
					return $data[$i];
				}
			}
			if(func_num_args() > 2){
				func_get_arg(2);
			}
			else{
				return $default;
			}
		}
		
		public static function any($data, $handler){
			for($i = 0; $i < count($data); $i++){
				if($handler($data[$i])){
					return true;
				}
			}
			return false;
		}
		
		public static function orderBy($data, $handler){
			if(count($data) <= 1){
				return $data;
			}
			$result = array_values($data);
			for($i=1; $i < count($result); $i++){
				$j = $i - 1;
				$key = $result[$i];
				while($j>=0 && !$handler($result[$j], $key)){
					$result[$j + 1] = $result[$j];
					$result[$j]= $key;
					$j= $j - 1;
				}
			}
			
			return $result;
		}
		
		public static function sum($data, $handler){
			$result =  0;
			for($i = 0; $i < count($data); $i++){
				$num = (float)$handler($data[$i]);
				$result += $num;
			}
			return $result;
		}
		
		public static function max($data, $handler){
			if(count($data) == 0){
				return null;
			}
			else if(count($data) == 1){
				return (float)$handler($data[0]);
			}
			$result = (float)$handler($data[0]);
			
			for($i = 1; $i < count($data); $i++){
				$num = (float)$handler($data[$i]);;
				$result = $result < $num ? $num : $result;
			}
			return $result;
		}
		
		public static function min($data, $handler){
			if(count($data) == 0){
				return null;
			}
			else if(count($data) == 1){
				return (float)$handler($data[0]);;
			}
			$result = (float)$handler($data[0]);;
			
			for($i = 1; $i < count($data); $i++){
				$num = (float)$handler($data[$i]);;
				$result = $result > $num ? $num : $result;
			}
			return $result;
		}
		
		public static function distinct($data, $handler){
			if(count($data) == 1){
				return $data;
			}
			$result = array();
			for($i = 0; $i < count($data); $i++){
				$exists = false;
				for($j = 0; $j < count($result); $j++){
					$exists = $handler($data[$i], $result[$j]);
					if($exists){ break; }
				}
				if(!$exists){
					array_push($result, $data[$i]);
				}
			}
			return $result;
		}
		
		// return a new array that has been aggregated by handler
		public static function aggregate($data, $handler){
			$result = NULL;
			if(count($data) == 0){
				return $data;
			}
			else if(count($data) == 1){
				return $data[0];
			}
			else{
				for($i = 0; $i < count($data) - 1; $i++){
					if($i == 0){
						$result = $handler($data[$i], $data[$i+1]);
					}
					else{
						$result = $handler($result, $data[$i+1]);
					}
				}
			}
			return $result;
		}
		
		// return a new array which has same fields as source,
		// then override and append from additional
		public static function extend($source, $additional){
			$result = new stdClass();
			
			foreach(array_keys((array)$source) as $key){
				$result->$key = $source->$key;
			}
			foreach(array_keys((array)$additional) as $key){
				$result->$key = $additional->$key;
			}
			return $result;
		}
		
		// return a new array which has same fields as source, 
		// and modified by additional value if any
		public static function appendLeft($source, $additional){
			$result = new stdClass();
			
			foreach(array_keys((array)$source) as $key){
				if(isset($additional->$key)){
					$result->$key = $additional->$key;
				}
				else{
					$result->$key = $source->$key;
				}
			}
			return $result;
		}
		
		public static function contains($source, $key){
			return	in_array($key, $source);
		}
	}
	
	class Enum {
		public function __construct($data){
			$this->data = $data;
		}
		public $data;
		
		public function where($handler){
			$this->data = Linq::where($this->data, $handler);
			return $this;
		}
		
		public function select($handler){
			$this->data = Linq::select($this->data, $handler);
			return $this;
		}
		
		public function any($handler){
			$this->data = Linq::any($this->data, $handler);
			return $this;
		}
		
		public function orderBy($handler){
			$this->data = Linq::orderBy($this->data, $handler);
			return $this;
		}
		
		public function firstOrDefault($handler, $default){
			$this->data = Linq::firstOrDefault($this->data, $handler, $default);
			return $this;
		}
		
		public function firstOrNull($handler){
			$this->data = Linq::firstOrNull($this->data, $handler);
			return $this;
		}
	
		public function sum($handler){
			$this->data = Linq::sum($this->data, $handler);
			return $this;
		}
	
		public function max($handler){
			$this->data = Linq::max($this->data, $handler);
			return $this;
		}
	
		public function min($handler){
			$this->data = Linq::min($this->data, $handler);
			return $this;
		}
		
		public function distinct($handler){
			$this->data = Linq::distinct($this->data, $handler);
			return $this;
		}
		
		public function extend($additional){
			$this->data = Linq::extend($this->data, $additional);
			return $this;
		}
		
		public function contains($key){
			return Linq::contains($this->data, $key);
		}
		
		public function value(){
			return $this->data;
		}
		
		public function val(){
			return $this->data;
		}
		
		public function result(){
			return $this->data;
		}
	}
?>