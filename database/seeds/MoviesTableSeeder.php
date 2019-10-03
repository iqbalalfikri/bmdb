<?php

use Illuminate\Database\Seeder;
use App\Movie;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Movie::create([
            'title' => 'Once Upon a Time ... in Hollywoord',
            'posted_by' => 'Admin',
            'genre_id' => 3,
            'description' => "A faded television actor and his stunt double strive to achieve fame and success in the film industry during the final years of Hollywood's Golden Age in 1969 Los Angeles.",
            'rating' => 8.4,
            'picture' => 'https://m.media-amazon.com/images/M/MV5BOTg4ZTNkZmUtMzNlZi00YmFjLTk1MmUtNWQwNTM0YjcyNTNkXkEyXkFqcGdeQXVyNjg2NjQwMDQ@._V1_UX182_CR0,0,182,268_AL_.jpg'
        ]);

        Movie::create([
            'title' => 'The Boys',
            'posted_by' => 'Admin',
            'genre_id' => 3,
            'description' => "A group of vigilantes set out to take down corrupt superheroes who abuse their superpowers.",
            'rating' => 9,
            'picture' => 'https://m.media-amazon.com/images/M/MV5BMjdjOTliZTQtM2FhNS00Mjk3LWJiOTgtMWJlMTg4MDgyNzc1XkEyXkFqcGdeQXVyODk4OTc3MTY@._V1_UX182_CR0,0,182,268_AL_.jpg'
        ]);

        Movie::create([
            'title' => 'Orange is the New Black',
            'posted_by' => 'Admin',
            'genre_id' => 3,
            'description' => "Convicted of a decade old crime of transporting drug money to an ex-girlfriend, normally law-abiding Piper Chapman is sentenced to a year and a half behind bars to face the reality of how life-changing prison can really be.",
            'rating' => 8.1,
            'picture' => 'https://m.media-amazon.com/images/M/MV5BYjYyM2FmMmMtZDgyZi00NGU3LWI3NzktODllZDY0YzQyNzgyXkEyXkFqcGdeQXVyMTkxNjUyNQ@@._V1_UX182_CR0,0,182,268_AL_.jpg'
        ]);

        Movie::create([
            'title' => 'Suits',
            'posted_by' => 'Admin',
            'genre_id' => 3,
            'description' => "On the run from a drug deal gone bad, Mike Ross, a brilliant college dropout, finds himself a job working with Harvey Specter, one of New York City's best lawyers.",
            'rating' => 8.5,
            'picture' => 'https://m.media-amazon.com/images/M/MV5BNmVmMmM5ZmItZDg0OC00NTFiLWIxNzctZjNmYTY5OTU3ZWU3XkEyXkFqcGdeQXVyMTQxNzMzNDI@._V1_UY268_CR0,0,182,268_AL_.jpg'
        ]);
    }
}
