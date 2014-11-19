prpServices.factory('$projects', [ '$q', 'api', 'RepositoryBlueprint', function($q, api, RepositoryBlueprint){
	var $this = RepositoryBlueprint.make('Project', 'projects/');
	$this.newModel = { 
						urls	: {
									git 	: '',
									dev		: '',
									live	: ''

									} 

					 };
	
	return $this.get();
	
}]);