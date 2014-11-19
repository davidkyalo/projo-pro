<?php

return [

		'config' 		=> [
							'name'			=> 'Projo Pro',
							'debug'			=> Config::get('app.debug'),
							'apiUrl' 		=> Config::get('app.url') . 'api/',
							'partialsUrl'	=> Config::get('app.url') . 'partials/',
							'templatesDir'	=> 'templates/',
							'imagesUrl'		=> Config::get('app.url') . 'assets/images/',
							'apiStatuses'	=> [
												'success' 	=> 'success',
												'error'		=> 'error',
												'bad'		=> 'bad',
												'ok'		=> 'ok'
											]
				
						],

		'files'			=> [
							'vendor' 	=> [
											'jquery-1.11.1.min.js',
											'angular.min.js',
											'angular-ui-router.min.js',
											'angular-resource.min.js',
											'angular-sanitize.min.js',				
										],
										
							'lib'		=> [],

							'app'		=> [
											'app.js',
											'shared/services/repository-blueprint.js',
											'shared/services/api.js',
											'shared/services/global.js',
											'projects/controllers.js',
											'projects/projects-repository.js',
											'project/controllers.js',
											'clients/clients-repository.js'
										],


						],
		


];