<?php

use Illuminate\Database\Seeder;
use App\Comment;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comment::create([
            'user_id' => 2,
            'movie_id' => 3,
            'comment' => 'test comment'
        ]);

        Comment::create([
            'user_id' => 2,
            'movie_id' => 3,
            'comment' => 'test comment lagi'
        ]);
    }
}
