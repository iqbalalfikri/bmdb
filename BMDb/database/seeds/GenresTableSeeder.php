<?php

use Illuminate\Database\Seeder;
use App\Genre;


class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Genre::create([
            'name' => 'Action'
        ]);
        Genre::create([
            'name' => 'Adventure'
        ]);
        Genre::create([
            'name' => 'Comedy'
        ]);
        Genre::create([
            'name' => 'Crime'
        ]);
        Genre::create([
            'name' => 'Drama'
        ]);
        Genre::create([
            'name' => 'Fantasy'
        ]);
        Genre::create([
            'name' => 'Horror'
        ]);
        Genre::create([
            'name' => 'Mystery'
        ]);
        Genre::create([
            'name' => 'Romance'
        ]);
        Genre::create([
            'name' => 'Sci-Fi'
        ]);
        Genre::create([
            'name' => 'Thriller'
        ]);
    }
}
