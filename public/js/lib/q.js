var q = q || {};

// prop
(function(root, $){
	var prop = function(){
		var _prop = null;
		var handler = function(end){
			if(arguments.length > 0){
				_prop = end;	
			}
			else{
				return _prop;	
			}
		};
		return handler;
	};
	q.prop = prop;
}(q, jQuery));

// sformat
(function(root, $){
	var sformat = function(source, params) {
		var s = source;
		for (var i = 0; i < params.length; i++) {
			var reg = new RegExp("\\{" + params[i].key + "\\}", "gm");
			s = s.replace(reg, params[i].value);
		}
		
		return s;
	}
	q.sformat = sformat;
}(q, jQuery));