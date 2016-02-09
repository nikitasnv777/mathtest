<?php

use Illuminate\Database\Seeder;

class CountriesCitiesLanguagesTablesSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::table('countries')->insert([
			 ['id' => 1, 'name' => 'Беларусь'],
			 ['id' => 2, 'name' => 'Бельгия'],
			 ['id' => 3, 'name' => 'Германия'],
			 ['id' => 4, 'name' => 'Украина'],
		]);

		DB::table('cities')->insert([
			 ['id' => 1, 'country_id' => 1, 'name' => 'Минск'],
			 ['id' => 2, 'country_id' => 2, 'name' => 'Брюссель'],
			 ['id' => 3, 'country_id' => 3, 'name' => 'Берлин'],
			 ['id' => 4, 'country_id' => 4, 'name' => 'Львов'],
			 ['id' => 5, 'country_id' => 4, 'name' => 'Запорожье'],
		]);

		DB::table('city_language')->insert([
			 ['city_id' => 1, 'language_id' => 1],
			 ['city_id' => 1, 'language_id' => 2],
			 ['city_id' => 2, 'language_id' => 3],
			 ['city_id' => 2, 'language_id' => 4],
			 ['city_id' => 2, 'language_id' => 5],
			 ['city_id' => 3, 'language_id' => 5],
			 ['city_id' => 4, 'language_id' => 6],
			 ['city_id' => 5, 'language_id' => 2],
			 ['city_id' => 5, 'language_id' => 6],
		]);

		DB::table('languages')->insert([
			 ['id' => 1, 'name' => 'белорусский'],
			 ['id' => 2, 'name' => 'русский'],
			 ['id' => 3, 'name' => 'французский'],
			 ['id' => 4, 'name' => 'нидерландский'],
			 ['id' => 5, 'name' => 'немецкий'],
			 ['id' => 6, 'name' => 'украинский'],
		]);
	}

}
