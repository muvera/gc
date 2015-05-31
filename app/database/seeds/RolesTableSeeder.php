<?php



class RolesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		 DB::table('roles')->delete();

		$items = array(
			['name'=>'admin'],
			['name'=>'customer'],
			['name'=>'guest']

		);

		// Uncomment the below to run the seeder
		 DB::table('roles')->insert($items);
	}

}