<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLearcategoryLearningTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('learcategory_learning', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('learcategory_id')->unsigned()->index();
			$table->foreign('learcategory_id')->references('id')->on('learcategories')->onDelete('cascade');
			$table->integer('learning_id')->unsigned()->index();
			$table->foreign('learning_id')->references('id')->on('learnings')->onDelete('cascade');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('learcategory_learning');
	}

}
