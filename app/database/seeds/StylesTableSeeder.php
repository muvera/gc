<?php

class StylesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		 DB::table('styles')->delete();

		$items = array(

['name'=>'Rectangle', 'description'=>'basic description'],
['name'=>'Round', 'description'=>'basic description'],
['name'=>'Cupcakes', 'description'=>'basic description'],
['name'=>'Cookies', 'description'=>'basic description'],
['name'=>'Oreos', 'description'=>'basic description'],
['name'=>'Strips', 'description'=>'basic description']
		);

		// Uncomment the below to run the seeder
		 DB::table('styles')->insert($items);
	}

}