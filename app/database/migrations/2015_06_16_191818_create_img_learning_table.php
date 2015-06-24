<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateImgLearningTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('img_learning', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('img_id')->unsigned()->index();
			$table->foreign('img_id')->references('id')->on('imgs')->onDelete('cascade');
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
		Schema::drop('img_learning');
	}

}
