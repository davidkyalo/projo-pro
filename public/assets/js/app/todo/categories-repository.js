prpServices.factory('$todoCategories', [ '$q', 'api', 'RepositoryBlueprint', function($q, api, RepositoryBlueprint){
	var $this = RepositoryBlueprint.make('TodoCategory', 'todo/categories/');
	$this.newModel = {};
	$this.modelRelations = function(model){
		
	}
	return $this.get();
	
}]);