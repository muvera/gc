<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSizeStyleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('size_style', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('size_id')->unsigned()->index();
			$table->foreign('size_id')->references('id')->on('sizes')->onDelete('cascade');
			$table->integer('style_id')->unsigned()->index();
			$table->foreign('style_id')->references('id')->on('styles')->onDelete('cascade');
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
		Schema::drop('size_style');
	}

}
