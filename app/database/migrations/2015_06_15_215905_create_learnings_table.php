<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLearningsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('learnings', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('category_id');
			$table->string('title');
			$table->string('description');
			$table->text('body');
			$table->string('slug');
			$table->string('tags');
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
		Schema::drop('learnings');
	}

}
