<?php

return [
			'Project'	=> [
						'create'	=> [
								'name'        		=> 'required',
			                  //  'startedOn'         => '',
			                    'deadline'          => 'required',
			                   // 'urls'      		=> '',
			                    'clientId'        	=> 'required|exists:clients,id',
			                    'budget'          	=> 'required|numeric'
							],
					],
	
	];