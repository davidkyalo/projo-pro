<?php

return [
		'api_url'				=> 'http://closure-compiler.appspot.com/compile',
		'http_headers'			=> [
									'Content-type' 		=> 'application/x-www-form-urlencoded'
									],
		'compilation_level' 	=> 'SIMPLE_OPTIMIZATIONS',
		'output_info'			=> [ 
									'compiled_code', 
									'warnings', 
									'errors', 
									'statistics' 
									],
		'output_format'			=> 'json',




];