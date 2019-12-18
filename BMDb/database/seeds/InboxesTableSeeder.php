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
            'sender_id' => 3,
            'receiver_id' => 2,
            'message' => 'Yo !'
        ]);

        Inbox::create([
            'sender_id' => 3,
            'receiver_id' => 2,
            'message' => 'How is it going ?'
        ]);

        Inbox::create([
            'sender_id' => 1,
            'receiver_id' => 2,
            'message' => "Yo ! How you doing ?"
        ]);

        Inbox::create([
            'sender_id' => 1,
            'receiver_id' => 2,
            'message' => "It's Good to see you man !"
        ]);
    }
}
