<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTodoTasksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('todo_tasks', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('categoryId');
			$table->integer('milestoneId');
			$table->string('name');
			$table->text('notes');
			$table->timestamp('start');
            $table->timestamp('finish');
            $table->integer('status');
            $table->integer('priority');

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
		Schema::drop('todo_tasks');
	}

}
