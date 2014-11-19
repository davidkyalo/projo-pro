<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectMilestonesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('project_milestones', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('parentId');
			$table->integer('projectId');
			$table->string('name');
			$table->integer('done');
			$table->integer('potion');
			$table->text('notes');
			
			$table->dateTime("created_at");
	      	$table->dateTime("updated_at");
	      	$table->dateTime("deleted_at");
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('project_milestones');
	}

}
