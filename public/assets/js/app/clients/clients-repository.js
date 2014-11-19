prpServices.factory('$clients', [ '$q', 'api', 'RepositoryBlueprint', function($q, api, RepositoryBlueprint){
	var $this = RepositoryBlueprint.make('Client', 'clients/');
	
	return $this.get();
	
}]);