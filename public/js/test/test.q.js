(function(root, $){
	var ori = "http://localhost/url/user/{id}/{name}";
	var params = Array();
	params.push({key: "id", value: "154"});
	params.push({key: "name", value: "administrator"});
	
	var result = q.sformat(ori, params);
	
	console.log(ori);
	console.log(result);
}(q, jQuery));