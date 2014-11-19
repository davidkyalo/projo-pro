prpControllers.controller('projects.mainCtl', function( $scope, $rootScope, $projects, $global) {
	 $scope.projects = $projects.all();
	
});

prpControllers.controller('projects.allCtl', function( $scope, $rootScope, $projects, $global){


});

prpControllers.controller('projects.addCtl', function( $scope, $rootScope, $projects, $clients, $global){
	$scope.project = $projects.new();
	$scope.clients = $clients.all();

	$scope.create = function(){
		$global.loading.show();
		if($scope.projectForm.$invalid)
		{
			$global.alerts.error.show("Invalid Inputs");
			$global.loading.hide();
			return;
		}
		else{
			
			$projects.save($scope.project)
				.then(function(response){
					$global.loading.hide();
					$global.alerts.saved(response.data);
				});
		}
	}

});

