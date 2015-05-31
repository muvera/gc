<?php



class UsersTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		 DB::table('users')->delete();

		$items = array(
				'username'=>'muvera',
				'email'=>'muvera@gmail.com',
				'password'=>'$2y$10$if9747IYeQWeBq/t699MGeDORYvaSfBtVWEF56cuhTSuZUcY5DE8q'
		);

		// Uncomment the below to run the seeder
		 DB::table('users')->insert($items);
	}

}