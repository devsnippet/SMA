var sma = sma || {};
sma.user = sma.user || {};

// login
(function(root, $){
	var login = function($form){
		var username = $form.find("input[name='username']").val();
		var password = $form.find("input[name='password']").val();
		$.ajax({
			data: {
				username: username,
				password: password
			},
			url: sma.ApiRoute.route().links("ea:login").href(),
			method: 'post',
			success: function(data){
				if(data["_links"] && data["_links"]["next"]){
					window.location = data["_links"]["next"]["href"];
				}
			},
			error: function(data){
				window.location = "./account/" + username + "/not_match";	
			}
		});
	};
	root.login = login;
}(sma.user, jQuery));