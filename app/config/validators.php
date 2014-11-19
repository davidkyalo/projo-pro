<?php

return [
			'Project'	=> [
						'create'	=> [
						
								'name'        		=> 'required',
			                    'startedOn'         => 'date|date_format:Y-m-d',
			                    'deadline'          => 'required|date_format:Y-m-d',
			                    'finishedOn'		=> 'date|date_format:Y-m-d',
			                   // 'urls'      		=> '',
			                    'clientId'        	=> 'required|exists:clients,id',
			                    'budget'          	=> 'required|numeric'
							],
					],
	
	];