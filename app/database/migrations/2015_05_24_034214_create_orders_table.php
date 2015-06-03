<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('invoice');
			$table->text('items');
			$table->string('mc_gross');
			$table->string('protection_eligibility');
			$table->string('address_status');
			$table->string('payer_id');
			$table->string('tax');
			$table->string('address_street');
			$table->string('payment_date');
			$table->string('payment_status');
			$table->string('address_zip');
			$table->string('mc_handling');
			$table->string('first_name');
			$table->string('address_country_code');
			$table->string('address_name');
			$table->string('payer_status');
			$table->string('address_country');
			$table->string('num_cart_items');
			$table->string('address_city');
			$table->string('payer_email');
			$table->string('verify_sign');
			$table->string('payment_type');
			$table->string('last_name');
			$table->string('address_state');
			$table->string('receiver_email');
			$table->string('residence_country');
			$table->string('payment_gross');
			$table->string('auth');
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
		Schema::drop('orders');
	}

}
