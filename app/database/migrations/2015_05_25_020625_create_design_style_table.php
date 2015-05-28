<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDesignStyleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('design_style', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('design_id')->unsigned()->index();
			$table->foreign('design_id')->references('id')->on('designs')->onDelete('cascade');
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
		Schema::drop('design_style');
	}

}
