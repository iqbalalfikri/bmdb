<?php

use Illuminate\Database\Seeder;
use App\Inbox;

class InboxesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Inbox::create([
            'sender_id' => 1,
            'receiver_id' => 2,
            'message' => 'Test 123'
        ]);

        Inbox::create([
            'sender_id' => 1,
            'receiver_id' => 2,
            'message' => 'Test 456'
        ]);

        Inbox::create([
            'sender_id' => 2,
            'receiver_id' => 1,
            'message' => 'Test 321'
        ]);
    }
}
