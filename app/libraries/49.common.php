<?php
namespace lib;

	class Common{
		// function defination to convert array to xml
		public function arrayToXml($xml_data, &$xml) {
			foreach($xml_data as $key => $value) {
				if(is_array($value)) {
					if(!is_numeric($key)){
						$subnode = $xml->addChild("$key");
						$this->arrayToXml($value, $subnode);
					}
					else{
						$this->arrayToXml($value, $xml);
					}
				}
				else {
					$xml->addChild("$key","$value");
				}
			}
		}
		// function defination to convert array to xml
		public function arrayToSimpleXml($xml_data) {
			$xml = new \SimpleXMLElement('<root/>');
			$this->arrayToXml($xml_data, $xml);
			return $xml;
		}
		
		// function defination to convert array to json
		public function arrayToJSON($json_data) {
			$json = json_encode($json_data);
			return $json;
		}	
	}
?>