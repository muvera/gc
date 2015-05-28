<?php

class SizesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		 DB::table('sizes')->delete();

		$items = array(

['name'=>'10x7.5 Inch', 'description'=>'basic description'],
['name'=>'8 Inch', 'description'=>'basic description'],
['name'=>'2 Inch', 'description'=>'basic description'],
['name'=>'1.7 Inch', 'description'=>'basic description'],
['name'=>'10x2 Inch', 'description'=>'basic description']
		);

		// Uncomment the below to run the seeder
		 DB::table('sizes')->insert($items);
	}

}