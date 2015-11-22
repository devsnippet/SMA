(function(root, $){
	root.endpoint("http://localhost:8888/sma/public/api");
}(sma.ApiRoute, jQuery));


(function(root, $){
	var result = root.route();
	console.log(result);
}(sma.ApiRoute, jQuery));


//with part
(function(root, $){
	var result = root.route().links().part("ea:login");
	console.log(result);
}(sma.ApiRoute, jQuery));

(function(root, $){
	var result = root.route().links().part("ea:login").href();
	console.log(result);
}(sma.ApiRoute, jQuery));


//without part
(function(root, $){
	var result = root.route().links("ea:login");
	console.log(result);
}(sma.ApiRoute, jQuery));

(function(root, $){
	var result = root.route().links("ea:login").href();
	console.log(result);
}(sma.ApiRoute, jQuery));



//deep route without part
(function(root, $){
	var result = root.route().links("ea:user")
		.with("id", "154")
		.route("self")
		.href();
	console.log(result);
}(sma.ApiRoute, jQuery));


//deep route without part
(function(root, $){
	var result = root.route().links("ea:student");
	console.log(result.href());
	result = result
		.with("id", ":id")
		.route("ea:one").href();
	console.log(result);
}(sma.ApiRoute, jQuery));