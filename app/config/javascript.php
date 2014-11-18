<?php

return [

		'config' 		=> [
							'name'			=> 'Projo Pro',
							'debug'			=> Config::get('app.debug'),
							'apiUrl' 		=> Config::get('app.url') . 'api/',
							'partialsUrl'	=> Config::get('app.url') . 'partials/',
							'templatesDir'	=> 'templates/',
							'imagesUrl'		=> Config::get('app.url') . 'assets/images/',
				
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
											'shared/services/model.js',
											'shared/services/api.js',
											'shared/services/global.js',
											'projects/controllers.js',
											'projects/services.js',
										],


						],
		


];