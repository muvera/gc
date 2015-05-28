<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CategoriesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		 DB::table('categories')->delete();

		$items = array(

['name'=>'Birthday', 'description'=>'basic description']
		);

		// Uncomment the below to run the seeder
		 DB::table('categories')->insert($items);
	}

}

