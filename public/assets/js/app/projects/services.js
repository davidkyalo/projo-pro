prpServices.factory('projectsFactory', [ '$q', 'api', 'modelBluePrint', function($q, api, modelBluePrint){
	var $f = modelBluePrint.make('project', 'projects/');

	$f.init();
	return $f;
	/*var $f = {
		get 	: get,
		all		: all,
		find	: find,
	};
	$f.api = api;
	$f.promise;
	$f.projects;

	function apiRoute(route){
		return  typeof route != 'undefined' ? 'projects/' + route : 'projects/';
	}

	function init(){
		 if(!$f.promise) {
          $f.promise = api.get( apiRoute() )
                        .then( function(response) {
                            return response.data;                            
                        }, function(response){
                             return $q.reject(response.data);
                        });
       		return $f.promise;
		}
	}

	function get() {
		return getProjects().then( function(projects){
			return $f;
		});
	}

	function getProjects(){
		if(!$f.promise)
			return init();
		return $f.promise;
	}

	function all(){
		return getProjects().then( function(projects){
			if(!$f.projects){
				$f.projects = {};
				projects.forEach(function(project){
					$f.projects[project.id] = makeProject(project);
				});
			}
			return $f.projects;
		});
	}

	function find(id){
		return getProjects().then( function(projects){
			$f.all();
			return $f.projects[id];
		});
	}

	function makeProject(project){
		var $this = project;
		return project;
	}

	init();

	return $f;*/
}]);