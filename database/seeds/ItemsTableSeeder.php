<?php

class ItemsTableSeeder extends seeder {

	public function run() {

		$faker= Faker\Factory::create();

		Item::trunicate();


		foreach(range (1,10) as $index) {

			Item::create ([

				'title' => $faker->sentence,

				'description' => $faker->paragraph(4)

				]);
		}
	}
}