<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class Article extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //insert data ke table article
        // DB::table('articles')->insert([
        // 	'title' => 'Migration Laravel',
        // 	'content' => 'Migration adalah sebuah fitur'

    	$faker = Faker::create('id_ID');

    	for ($i = 1; $i <= 10; $i++) { 
    	
    	//insert data ke tabel artcile dengan faker
    	DB::table('articles')->insert([
            'title'   => $faker->country,
            'author'  => $faker->name,
    		'content' => $faker->text
    	]);


    	}

    }
}
