<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends AbstractSeeder
{

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::statement("SET foreign_key_checks = 0");

		Model::unguard();

		$this->call('CategoryTableSeeder');
	}

}
