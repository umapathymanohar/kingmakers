<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
		$this->call('StudentregistrationsTableSeeder');
		$this->call('CoursecategoriesTableSeeder');
		$this->call('CoursemastersTableSeeder');
		$this->call('CoursebatchesTableSeeder');
		$this->call('OptionalsubjectsTableSeeder');
		$this->call('StudentregistrationsTableSeeder');
		$this->call('CoursecategoriesTableSeeder');
		$this->call('CoursemastersTableSeeder');
		$this->call('CoursebatchesTableSeeder');
		$this->call('OptionalsubjectsTableSeeder');
		$this->call('FeesmastersTableSeeder');
		$this->call('FeedetailsTableSeeder');
	}

}