var prpApp = angular.module('prpApp', ['ui.router', 'ngSanitize' ,'prpControllers', 'prpServices']);

prpApp.config(['$stateProvider', '$urlRouterProvider', '$locationProvider', function($stateProvider, $urlRouterProvider, $locationProvider) {
	
	var partialsUrl =  window.$appConfig.partialsUrl;
    var currentModuleDir = partialsUrl + 'projects/';
    //Sites States
    $stateProvider
    		//Parent
		    .state('projects', {
		            url         : '/projects',
		            abstract	: true,
		            controller  : 'projects.mainCtl',
					templateUrl : currentModuleDir + 'index.html',
					resolve     : {
				                    factory		: function(projectsFactory) {
					                       				return projectsFactory.get();
							                       },
							        projects 		: function(factory) {
							        					return factory.all();
							        				}
			                      },
			        data		: {
			        				displayData 	: { breadCrumb : 'Projects', icon : 'glyphicon glyphicon-user'}
			        				
			        			}
				})

			.state('projects.all', {
					parent		: 'projects',
		            url         : '/all',
		            controller  : 'projects.allCtl',
					templateUrl : currentModuleDir + 'all.html',
			        data		: {
			        				displayData 	: { breadCrumb : 'Projects / All', icon : 'glyphicon glyphicon-user'}
			        			}
				})

			.state('projects.add', {
					parent		: 'projects',
		            url         : '/add',
		            controller  : 'projects.addCtl',
					templateUrl : currentModuleDir + 'add.html',
			        data		: {
			        				displayData 	: { breadCrumb : 'Projects / Add', icon : 'glyphicon glyphicon-user'}
			        			}
				})
		
	
	 $urlRouterProvider.otherwise('/projects/all');
	// $locationProvider.html5Mode(true);
}]);


prpApp.run(['$rootScope', '$stateParams', '$window' , '$state', '$global', function ($rootScope, $stateParams, $window, $state, $global) {
	$rootScope.$state = $state;
	$rootScope.$global = $global;
    $rootScope.$stateParams = $stateParams;
   

}]);

prpApp.run(['$rootScope', '$global', function($rootScope, $global) {
	   $rootScope.$on('$stateChangeStart', function(event, toState, toParams, fromState, fromParams) {
	   		$global.loading.show();
	   });
	   $rootScope.$on('$stateChangeSuccess', function(event, toState, toParams, fromState, fromParams) {
	     	$global.loading.hide();

	   });
	}]);


prpApp.run(['$rootScope','$templateCache', '$global', function($rootScope, $templateCache, $global) {
	   $rootScope.$on('$stateChangeStart', function() {
		   	if($global.app.debug) {
		      $templateCache.removeAll();
		   	}
	   });
	}]);

var prpServices = angular.module('prpServices', []);
var prpControllers = angular.module('prpControllers', []);