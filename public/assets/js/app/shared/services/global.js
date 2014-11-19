if(typeof cnHelperServices == 'undefined')
	var cnHelperServices = angular.module('cnHelperServices', []);

cnHelperServices.factory('$global', ['$rootScope', '$timeout', '$state', '$window', function( $rootScope, $timeout, $state, $window ){
	var _app_ ;
	var _api_ ;

	var factory = {
			app 		: app(),
			api 		: api(),
			urls 		: urls(),
			alerts 		: alerts(),
			loading 	: loading(),
			routes		: routes()
	}

	function api(){
		if(typeof _api_ == 'object')
			return _api_;

		var $this = {};
		$this.statusMap = app().apiStatuses;

		$this.isStatus = function(response, status){
			return response.$status ==  $this.statusMap[status];
		}

		$this.isOk = function(response){
			return $this.isStatus(response, 'ok') || $this.isStatus(response, 'success');
		}

		$this.isSuccess = function(response){
			return $this.isStatus(response, 'success');
		}

		$this.isError = function(response){
			return $this.isStatus(response, 'error');
		}

		$this.isBad = function(response){
			return $this.isStatus(response, 'bad');
		}
		_api_ = $this;
		return $this;
	}


	function app(reset){
		reset = typeof reset == 'undefined' ? false : reset;
		if(typeof _app_ == 'object' && !reset)
			return _app_;

		var $this = {};
		
		$this.setVars = function(vars){
			var keys = Object.keys(vars);
			keys.forEach(function(key){
				$this[key] = vars[key];
			});
		}
		$this.setVars(typeof $window.$appConfig == 'undefined' ? {} : $window.$appConfig);

		_app_ = $this;
		return $this;
	}


	function routes(){
		var routes = {};

		routes.get = function(stateName){
			return makeRoute(stateName);
		}

		
		routes.currentRoute = changeCurrentRoute();
		
		routes.isActive = function(stateName, params){
			return $state.includes( stateName, params ) ? { 'active' : true } : { 'active' : false };
		}
		routes.current = function(){
			if(routes.currentRoute && $state.current && routes.currentRoute.uiState && routes.currentRoute.uiState.name == $state.current.name)
				return routes.currentRoute;

			return changeCurrentRoute();
		}

	

		

		//Private Methodes
		function changeCurrentRoute(){
			routes.currentRoute = $state.current ? routes.get($state.current.name) : routes.get("");
			
			return routes.currentRoute;
		}

		function getParent(route){
			return typeof route.uiState.parent ? routes.get(route.uiState.parent) : null;
		}

		function getState(stateName){
			return typeof stateName == 'object' ? stateName : $state.get(stateName);
		}

		function makeRoute(stateName){
			var $this = {};
			$this.uiState = getState(stateName);
			$this.displayData = getStateData('displayData', { breadCrumb: '', icon : '' });

			$this.setBreadCrumb = function(value){
				$this.displayData.breadCrumb = value;
			}

			$this.setIcon = function(value){
				$this.displayData.icon = value;
			}

			function getStateData(key, defaultValue){

				if($this.uiState == null)
					return defaultValue;

				if(typeof $this.uiState.data == 'undefined')
					return defaultValue;
				if(typeof $this.uiState.data[key] == 'undefined')
					return defaultValue;
				return $this.uiState.data[key];
			}

			$this.title = function(){
				var title = $this.displayData.breadCrumb.split('/');
				return title.length > 0 ? title[0] : '';
			}

			$this.breadCrumb = function(){
				return $this.displayData.breadCrumb.replace($this.title(), '');
			}

			$this.icon = function(){
				return  $this.displayData.icon;
			}

			$this.pageTitle = function(){
				var title = $this.title().length > 0 ? $this.title() + ': ' : '';
				return title + ' - ' + app().name;
			}

			return $this;
		}





		return routes;
	}

	function urls(){
		var $this = {};
		$this.api = app().apiUrl;	    
	    $this.partials = app().partialsUrl;
	    $this.templates =  $this.partials + app().templatesDir;
	    $this.images = app().imagesUrl;
	    $this.favicon = $this.images + 'favicon.ico';
	    $this.template = function(module){
	    	var tree = module.split('.');
	    	var path = $this.templates;
	    	for(var i = 0; i < tree.length - 1; i++){
	    		path = path + tree[i] + '/';
	    	}
	    	return path + tree[tree.length - 1] + '.html';
	    }
	    
	    return $this;
	}
	function loading(){
		var $this = {};
		$this.active = false;
		$this.show	= function(){
			$this.active = true;
			return $this;
		}
		$this.hide = function(){
			$this.active = false;
			return $this;
		}
		$this.isActive = function(){
			return $this.active;
		}
		return $this;
	}

	function alerts(){
		var alerts = {};
		
		alerts.defaults = {};
		alerts.defaults.success = {
									default 	: 'Success!!.',
									save 		: 'Saved successfully.',
									};
		alerts.defaults.error =  {
									default 	: 'Error!!.',
									save 		:	'Error while Saving.',
									};

		
		alerts.getDefault = function( type, context ){
			var messages = alerts.defaults[type];
			return typeof messages[context] == 'undefined' ? messages.default : messages[context];
		}

		alerts.setDefaults = function( messages, context){
			messages = typeof messages == 'object' ? messages : {};
			defaultKeys = Object.keys(alerts.defaults);
			defaultKeys.forEach(function(type){
				messages[type] = typeof messages[type] == 'undefined' 
										? alerts.getDefault(type, context)
										: messages[type];
			});
			return messages;
		}

		alerts.makeAlert = function(){
			var $this = {};
			$this.active = false;
			$this._message = '';
			$this.message = function(){
				return $this._message;
			}
			$this.show = function(theMsg, hide){
				hide = typeof hide == 'undefined' ? 3500 : hide;
				$this.setMessage(theMsg);
				$this.active = true;
				// if(hide !== false)
				// 	$this.hide(hide);
				return $this;
			}

			$this.setMessage = function(messages){
				var message = '';
				if(typeof messages == 'object'){
					var msgKeys = Object.keys(messages);
					msgKeys.forEach(function(msgKey){
						message += '<div class="alert-msg-group">'
									+'<span>' + msgKey + ':</span>'
									+ $this.messageStr(messages[msgKey])
									+ '</div>';
					});
					$this._message = message;
					return message;
				}
				$this._message = $this.messageStr(messages);
				return $this._message;

			}

			$this.messageStr = function(messages){
				var message = '';
				if(typeof messages == 'object'){
					messages.forEach(function(msg){
						message+='<li>' + msg + '</li>';
					});
					return '<ul>' + message + '</ul>';
				}
				return messages;
			}

			$this.hide = function(whenTo){
				whenTo = typeof whenTo == 'undefined' ? 0 : whenTo;
				$timeout(function(){
					$this._message = '';
					$this.active = false;
				}, whenTo);	
				return $this;
			}

			$this.isActive = function(){
				return $this.active;
			}
			return $this;
		}

		alerts.success = alerts.makeAlert();
		alerts.error = alerts.makeAlert();

		alerts.show = function(type, message, hide ){
			return alerts[type].show(message, hide);
		}


		alerts.serverResponse = function(responseData, messages, context, hide){
			var defaults = alerts.setDefaults( messages, context);
			messages = typeof responseData.messages != 'undefined' 
								?  responseData.messages
								: defaults;

			console.log(responseData.messages);
			
			if(api().isSuccess(responseData)){
				alerts.success.show(messages, hide);
			}
			else{
				alerts.error.show(messages, hide);
			}
		}

		alerts.saved = function(responseData, messages, hide){
			return alerts.serverResponse(responseData, messages, 'save', hide);
		}

		
		return alerts;

	}

		function arrayToList(arr){
			if(arr.length == 1)
				return arr[0];

			if(arr.length == 0)
				return '';

			var list = '';
			arr.forEach(function(item){
				list += '<li>' + item + '</li>';
			});
			return '<ul>' + list + '</ul>';
		}



	return factory;
}]);
