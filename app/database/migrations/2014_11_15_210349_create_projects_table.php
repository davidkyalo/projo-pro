<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('projects', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('clientId');
            $table->string('name');
            $table->text('details');
            $table->string('status');
            $table->date('startedOn');
            $table->date('deadline')->nullable();
            $table->date('finishedOn')->nullable();
            $table->integer('milestoneId');
            $table->float('budget');
            $table->float('paid');
            $table->text('urls');
            
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
		Schema::drop('projects');
	}

}
