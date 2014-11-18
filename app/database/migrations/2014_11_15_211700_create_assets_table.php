<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('assets', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('projectId');
            $table->string('name');
            $table->string('outputFile');
            $table->string('outputDir');
            $table->text('config');
            $table->timestamp('compiledAt');
            $table->text('lastCompilation');
            
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
		Schema::drop('assets');
	}

}
