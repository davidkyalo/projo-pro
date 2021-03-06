<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetFilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('asset_files', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('assetId');
			$table->string('source');
			$table->string('sourceType');
			
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
		Schema::drop('asset_files');
	}

}
