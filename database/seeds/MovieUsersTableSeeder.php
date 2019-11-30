<?php

use App\MovieUser;
use Illuminate\Database\Seeder;

class MovieUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MovieUser::create([
            'user_id' => 2,
            'movie_id' => 1
        ]);

        MovieUser::create([
            'user_id' => 2,
            'movie_id' => 2
        ]);

        MovieUser::create([
            'user_id' => 3,
            'movie_id' => 3
        ]);

        MovieUser::create([
            'user_id' => 3,
            'movie_id' => 4
        ]);
    }
}
