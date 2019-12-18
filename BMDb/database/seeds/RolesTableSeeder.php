<?php

use App\Roles;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Roles::create([

            'name' => 'Admin',
        ]);
        Roles::create([
            'name' => 'Member',
        ]);
    }
}
