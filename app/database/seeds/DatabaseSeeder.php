<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
	/*	$clientsRepo =  App::make('clientsRepo');
		$client = $clientsRepo->newOne();
		$client->id = 1;
		$client->name = 'Anonymous';
		$client->save();
*/
		$p_arr = [
					[
						'name' 		=> 'Projo Pro',
						'clientId'	=> 1,
						'details'	=> 'Project Management App.',
						'done'		=> 1,
						'budget'	=> 500.00,
						'paid'		=> 0.00,
						'urls'		=> [
										'dev'		=> 'http://projo-pro.cn',
										'github'	=> 'https://github.com/davidmkyalo/projo-pro'
										]
					],
					[
						'name' 		=> 'Village Craft',
						'clientId'	=> 1,
						'details'	=> 'E-commerce site.',
						'done'		=> 10,
						'budget'	=> 800.00,
						'paid'		=> 800.00,
						'urls'		=> [
										'dev'		=> 'http://villagecraft.cn',
										'github'	=> 'https://github.com/davidmkyalo/projo-pro'
										]
					],
					[
						'name' 		=> 'Social Trafic Commando',
						'clientId'	=> 1,
						'details'	=> 'Get Traffic from social media.',
						'done'		=> 8,
						'budget'	=> 400.00,
						'paid'		=> 0.00,
						'urls'		=> [
										'dev'		=> 'http://wp-central.cn',
										'github'	=> 'https://github.com/davidmkyalo/projo-pro'
										]
					],

				];
		$projects = App::make('projectsRepo');
		foreach ($p_arr as $projectD) {
			$project = $projects->newOne();
			$project->name = $projectD['name'];
			$project->clientId = $projectD['clientId'];
			$project->details = $projectD['details'];
			$project->done =  $projectD['done'];
			$project->budget =  $projectD['budget'];
			$project->paid =  $projectD['paid'];
			$project->urls =  $projectD['urls'];
			$project->save();
		}
		// $this->call('UserTableSeeder');
	}

}
