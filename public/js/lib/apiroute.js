var sma = sma || {};
sma.ApiRoute = sma.ApiRoute || {};

// endpoint
(function(root, $){
	root.endpoint = q.prop();
}(sma.ApiRoute, jQuery));

// route
(function(root, $){
	var route = function(){
		var response = JSON.parse($.ajax({
			type: "GET",
			url: root.endpoint(),
			async: false
		}).responseText);
		
		var links = function(obj){
			var result = {};
			result.obj = obj;
			
			result._with = Array();
			result.with = function(key, value){
				result._with.push({
					key: key,
					value: value
				});
				return result;
			};
			
			result.href = function(){ 
				var href = obj["href"]; 
				
				if(result._with.length > 0){
					href = q.sformat(href, result._with);
				}
				return href;
			};
			result.route = function(key){
				var url = result.href();
				if(result._with.length > 0){
					url = q.sformat(url, result._with);
				}
				
				var response = JSON.parse($.ajax({
					type: "GET",
					url: url,
					async: false
				}).responseText);
				if(key)
				{
					return links(response["_links"][key]);
				}
				else{
					return links(response["_links"]);
				}
			};
			result.part = function(key){
				return links(obj[key]);
			};
			return result;
		};
		
		var result = {
			obj : response,
			links : function(key){
				if(key){
					return links(response["_links"][key]);
				}
				else{
					return links(response["_links"]);
				}
			}
		};
		return result;
	};
	root.route = route;
}(sma.ApiRoute, jQuery));