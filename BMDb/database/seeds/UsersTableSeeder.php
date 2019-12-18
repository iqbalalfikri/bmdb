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

        User::create([
            'name' => 'Admin',
            'email' => 'admin@bmdb.com',
            'password' => bcrypt('admin123'),
            'gender' => 'Male',
            'address' => 'BMDb',
            'dob' => '1999-02-06',
            'picture' => 'default.png',
            'role_id' => 1,
            'remember_token' => str_random(60)
        ]);
        User::create([
            'name' => 'Iqbal Alfikri',
            'email' => 'iqbal.alfikri@binus.ac.id',
            'password' => bcrypt('iqbal123'),
            'gender' => 'Male',
            'address' => 'Depok',
            'dob' => '1999-06-02',
            'picture' => 'spiderman.jpg',
            'role_id' => 1,
            'remember_token' => str_random(60)
        ]);
        User::create([
            'name' => 'Hilmy Fadhila',
            'email' => 'hilmy.fadhila@binus.ac.id',
            'password' => bcrypt('hilmy123'),
            'gender' => 'Male',
            'address' => 'Bintaro',
            'dob' => '2000-02-03',
            'picture' => 'batman.png',
            'role_id' => 2,
            'remember_token' => str_random(60)
        ]);
        User::create([
            'name' => 'Randy Khengdy',
            'email' => 'randy.khengdy@binus.ac.id',
            'password' => bcrypt('randy123'),
            'gender' => 'Male',
            'address' => 'Syahdan',
            'dob' => '2000-01-22',
            'picture' => 'joker.jpg',
            'role_id' => 2,
            'remember_token' => str_random(60)
        ]);
        User::create([
            'name' => 'John',
            'email' => 'john@bmdb.com',
            'password' => bcrypt('john123'),
            'gender' => 'Male',
            'address' => 'California',
            'dob' => '2002-05-18',
            'picture' => 'default.png',
            'role_id' => 2,
            'remember_token' => str_random(60)
        ]);
        User::create([
            'name' => 'Freddie',
            'email' => 'freddie@bmdb.com',
            'password' => bcrypt('freddie123'),
            'gender' => 'Male',
            'address' => 'London',
            'dob' => '1988-11-07',
            'picture' => 'default.png',
            'role_id' => 2,
            'remember_token' => str_random(60)
        ]);
        User::create([
            'name' => 'Eisenberg',
            'email' => 'eisenberg@bmdb.com',
            'password' => bcrypt('eissenberg123'),
            'gender' => 'Male',
            'address' => 'New York',
            'dob' => '2000-01-02',
            'picture' => 'default.png',
            'role_id' => 2,
            'remember_token' => str_random(60)
        ]);
        User::create([
            'name' => 'Anthony',
            'email' => 'anthony@bmdb.com',
            'password' => bcrypt('anthony123'),
            'gender' => 'Male',
            'address' => 'Canada',
            'dob' => '1990-12-30',
            'picture' => 'default.png',
            'role_id' => 2,
            'remember_token' => str_random(60)
        ]);
    }
}
