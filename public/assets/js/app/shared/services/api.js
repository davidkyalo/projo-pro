if(typeof cnHelperServices == 'undefined')
	var cnHelperServices = angular.module('cnHelperServices', []);

cnHelperServices.factory('api', ['$http', '$q', '$global', function($http, $q, $global){
	var api = {};
	api.url = $global.urls.api;

	api.get = function(route, data, vars) {
		return api.request({ 
							method	: "GET",
	                        url 	: api.getUrl(route, vars),
	                        data    : data
		                    });

	}
	api.post = function(route, data, vars) {
		return api.request({ 
							method	: "POST",
	                        url 	: api.getUrl(route, vars),
	                        data 	: data
					 });
	}

	api.getUrl = function(route, vars) {
		var url = typeof route != 'undefined' ? api.url + route : api.url;
		var strVars = api.stringfyVars(vars);
		url += strVars != null ? '?' + strVars : '';
		
		return url;
	}

	/*api.makeEncodedUrl = function(action ,data) {
		strData = api.stringfyData(data);
		if(strData.length > 0)
		{
			strData = '&' + strData;
		}
		var url = api.getUrl(action) + strData;
		console.log('Raw: ' + url);
		console.log('Encoded: ' + encodeURIComponent(url));
		return encodeURIComponent(url);
	}
*/
	api.stringfyData = function(data) {
		var str = '';
		if(typeof data != 'undefined' || data.length == 0 ){
			return str;
		}
		var count = data.length - 1;
		data.forEach(function(item, key){
			str+= key + '=' + item;
			if(count > 0){
				str += '&';
			}
			count -=1;
		});
		return str;
	}
	api.stringfyVars = function(vars) {
		if(typeof vars != 'object' || vars.length == 0 )
			return null;
		var keys = Object.keys(vars);
		var str = ''
		var varCount = keys.length;
		keys.forEach(function(item, key){
			str += key + '=' + item;
			str += varCount > 1 ? '&' : '';
			varCount -=1;
		});
		return str;
	}
	api.request = function(params) {
		return $http(params);
	}

	return api;

}]);