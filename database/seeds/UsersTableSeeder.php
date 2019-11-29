<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::create([
        //     'name' => 'Iqbal Alfikri',
        //     'email' => 'iqbal.alfikri@binus.ac.id',
        //     'password' => bcrypt('iqbal123'),
        //     'gender' => 'Male',
        //     'address' => 'Depok',
        //     'dob' => '1999-06-02',
        //     'picture' => 'https://wegotthiscovered.com/wp-content/themes/wgtc_v2/resizer/resizer.php?file=uploads/2019/08/1564699032_629045_1564699999_noticia_normal-e1566428684766-640x321.jpg&height=650&width=1269.4394213382&action=resize',
        //     'role_id' => 1,
        //     'remember_token' => str_random(60)
        // ]);
        // User::create([
        //     'name' => 'Hilmy Fadhila',
        //     'email' => 'hilmy.fadhila@binus.ac.id',
        //     'password' => bcrypt('hilmy123'),
        //     'gender' => 'Male',
        //     'address' => 'Bintaro',
        //     'dob' => '2000-02-03',
        //     'picture' => 'https://media.vanityfair.com/photos/5cc30fdbb48e472f83da591e/16:9/w_2560,c_limit/gotham-series-finale-batman-reveal.png',
        //     'role_id' => 2,
        //     'remember_token' => str_random(60)
        // ]);
        // User::create([
        //     'name' => 'Randy Khengdy',
        //     'email' => 'randy.khengdy@binus.ac.id',
        //     'password' => bcrypt('randy123'),
        //     'gender' => 'Male',
        //     'address' => 'Syahdan',
        //     'dob' => '2000-01-22',
        //     'picture' => 'https://m.ayobandung.com/images-bandung/post/articles/2019/10/07/66164/joker-2019.jpg',
        //     'role_id' => 2,
        //     'remember_token' => str_random(60)
        // ]);
    }
}
