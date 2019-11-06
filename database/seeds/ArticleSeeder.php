<?php

use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       //insert data ke table article
        DB::table('articles')->insert([
        	'title' => 'Migration Laravel',
        	'content' => 'Migration adalah sebuah fitur yang ada pada laravel, migration merupakan Control Version System untuk database. dengan menggunakan migration laravel, memungkinkan kita untuk mengelola database dengan lebih mudah'
        ]);
    }
}
