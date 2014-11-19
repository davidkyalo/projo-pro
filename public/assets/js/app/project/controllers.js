prpControllers.controller('project.mainCtl', function( $scope, $rootScope, $projects, project, $global) {
	 $scope.$projects = $projects;
	 $scope.project = project;
	
});

prpControllers.controller('project.overviewCtl', function( $scope, $rootScope, project, $global){

	 $scope.project = project;
});
