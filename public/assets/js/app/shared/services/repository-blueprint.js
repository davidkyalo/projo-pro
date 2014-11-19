if(typeof cnHelperServices == 'undefined')
	var cnHelperServices = angular.module('cnHelperServices', []);

cnHelperServices.factory('RepositoryBlueprint', [ '$q', 'api', '$global', function($q, api, $global){
	function Repository(modelName, apiPrefix){
		var $this = this;
		$this.api = api;
		$this.promise;
		$this.models = {};

		$this.modelName = modelName;
		$this.apiPrefix = apiPrefix;
		$this.newModel = {};
		$this.routes  = { 
						 index		: '',
						 store		: 'store',
						 update		: 'update/:id',
						 destroy	: 'destroy/:id'
					};

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

		$this.fetch = function (){
			 if(!$this.promise) {
		          $this.promise = $this.api.get( $this.getRoute('index') )
			                        .then( function(response) {
			                        	return response.data;                            
			                        }, function(response){
			                             return $q.reject(response.data);
			                        });
		       		
			}
			
		}

		$this.get = function() {
			if(!$this.promise)
				$this.fetch();
			return $this.promise.then(function (response){
				if($global.api.isOk(response) && response.models){
					$this.models = {};
					response.models.forEach(function(model){
						$this.models[model.id] = $this.makeModel(model);
					});
				}
				
				return $this;
			});
		}

		$this.fetchModels = function(){
			if(!$this.promise)
				$this.fetch();
			return $this.promise;
		}

		$this.all = function (){
			return $this.models;
		}

		$this.find = function(id){
			return $this.models[id];
		}

		$this.makeModel = function(model){
			var $model = model;
			$this.modelRelations($model);
			return $model;
		}
		$this.modelRelations = function(model){
			return model;
		}

		$this.save = function (model){
			var route = model.id ? 'update' : 'store';
			var params = model.id ? { id : model.id } : {};
			
			return $this.api.post( $this.getRoute( route, params ) , model )
					.success(function(response){
						console.log(response);
						if($global.api.isOk(response) && response.model){
							$this.add(response.model);
						}
						return response;
					})
					.error(	function(response){
							console.log(response);
						        return response;
	                        });					
		}
		$this.add = function (model) {
			$this.models[model.id] = $this.makeModel(model);
		}

		$this.update = function(model){
			var params = { id : model.id };
			return $this.api.post( $this.getRoute('update', params) , model )
					.success(function(response){
						if(response.model){
							$this.add(response.model);
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
							$this.remove(id);
						}
						return response;
					})
					.error(	function(response){
						        return response;
	                        });
		}

		$this.remove = function (id){
			delete $this.models[id];	
		}

		$this.new = function (data){
			data = typeof data == 'object' ? data : $this.newModel;
			return $this.makeModel(data);
		}
		
	}
		return {
			make : function(modelName, apiPrefix){
				return new Repository(modelName, apiPrefix);
			}
		}
}]);