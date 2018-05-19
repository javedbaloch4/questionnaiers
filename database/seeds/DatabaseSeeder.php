<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run() {

		// no share :)
		\App\User::create( [
			'name'     => 'javed',
			'email'    => 'javed@gmail.com',
			'password' => bcrypt( 'password' )
		] );

		factory( \App\Questionnaire::class, 5 )->create();

	}
}
