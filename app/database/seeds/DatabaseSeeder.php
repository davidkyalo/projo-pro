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

		$cats = App::make('ToDoCategoriesRepo');
		$personal = $cats->create(['name' => 'Personal']);
		$gen = $cats->create(['name' => 'General']);
		$work = $cats->create(['name' => 'Work']);

		$clientsRepo =  App::make('ClientsRepo');
		if(!$clientsRepo->find(1)){
			$client = $clientsRepo->newOne();
			$client->id = 1;
			$client->name = 'Anonymous';
			$client->emails = [ 'anonymous@site.com', 'email@anonymous.com' ];
			$client->phones = [];
			$client->url = 'http://anonymous.com';
			$client->save();
		}
		$p_arr = [
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
		$miles = App::make('ProjectMilestonesRepo');
		$projects = App::make('ProjectsRepo');
		foreach ($p_arr as $projectD) {
			$project = $projects->create($projectD);
			$mile = $miles->newOne();
			$mile->name = $project->name;
			$mile->potion = 10;
			$mile->projectId = $project->id;
			$mile->notes = [];
			$mile->save();
			$project->milestoneId = $mile->id;
			$project->save();
			
		}
		// $this->call('UserTableSeeder');
	}

}
