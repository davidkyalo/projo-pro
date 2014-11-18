prpServices.factory('modelBluePrint', [ '$q', 'api', function($q, api){
	function Model(modelName, apiPrefix){
		var $this = this;
		$this.api = api;
		$this.promise;
		$this.models;

		//Sungular Name
		$this.modelName = modelName;
		//Plural Name
		$this.apiPrefix = apiPrefix;

		$this.routes  = { 
						'index'		: '',
						'create'	: 'create',
						'update'	: 'update/:id',
						'destroy'	: 'destroy/:id'
					};
		
		/*$this.apiPrefix = function(){
			return $this.pModelName + '/';
		}*/


		$this.apiRoute = function (route, prefix){
			prefix = typeof prefix == 'undefined' ? $this.apiPrefix : prefix;
			return  typeof route != 'undefined' ? prefix + route : prefix;
		}
		$this.getRoute = function (routeName, params, prefix){
			var route = typeof $this.routes[routeName] != 'undefined' ? $this.routes[routeName] : '';
			params = typeof params != 'object' ? {} : params;
			var keys = Object.keys(params);
			keys.forEach(function(key){
				route = route.replace(':' + key, params[key]);
			});
			return $this.apiRoute(route, prefix);
		}

		$this.init = function (){
			 if(!$this.promise) {
		          $this.promise = $this.api.get( $this.getRoute('index') )
			                        .then( function(response) {
			                        	console.log(response);
			                            return response.data;                            
			                        }, function(response){
			                             return $q.reject(response.data);
			                        });
		       		
			}
			
		}

		$this.get = function() {
			return $this.getModels().then( function(models){
				return $this;
			});
		}

		$this.getModels = function(){
			if(!$this.promise)
				$this.init();
			return $this.promise;
		}

		$this.all = function (){
			return $this.getModels().then( function(models){
				if(!$this.models){
					$this.models = {};
					models.forEach(function(model){
						$this.models[model.id] = $this.makeModel(model);
					});

				}
				return $this.models;
			});
		}

		$this.find = function(id){
			return $this.getModels().then( function(models){
				$this.all();
				return $this.models[id];
			});
		}

		$this.makeModel = function(model){
			var $model = model;
			return $model;
		}

		$this.create = function (model){
			return $this.api.post( $this.getRoute('create') , model )
					.success(function(response){
						if(response.model){
							$this.models[response.model.id] = $this.makeModel(response.model);
						}
						return response;
					})
					.error(	function(response){
						        return response;
	                        });					
		}

		$this.update = function(model){
			var params = { id : model.id };
			return $this.api.post( $this.getRoute('update', params) , model )
					.success(function(response){
						if(response.model){
							$this.models[response.model.id] = $this.makeModel(response.model);
						}
						return response;
					})
					.error(	function(response){
						        return response;
	                        });
		}

		$this.destroy = function (id){
			var params = { id : id };
			return $this.api.get( $this.getRoute('destroy', params))
					.success(function(response){
						if(response.id){
							delete $this.models[id];	
						}
						return response;
					})
					.error(	function(response){
						        return response;
	                        });
		}
	}
		return {
			make : function(modelName, apiPrefix){
				return new Model(modelName, apiPrefix);
			}
		}
}]);