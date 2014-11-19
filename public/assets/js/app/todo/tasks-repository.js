prpServices.factory('$todoTasks', [ '$q', 'api', 'RepositoryBlueprint', function($q, api, RepositoryBlueprint){
	var $this = RepositoryBlueprint.make('TodoTasks', 'todo/tasks/');
	$this.newModel = {};
	
	return $this.get();
	
}]);