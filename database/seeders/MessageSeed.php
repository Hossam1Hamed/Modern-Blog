<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Message;
class MessageSeed extends Seeder
{
    
    public function run()
    {
        Message::create([
            'content'=>'first message',
            'user_id'=>1,
        ]);
        Message::create([
            'content'=>'second message',
            'user_id'=>2,
        ]);
        Message::create([
            'content'=>'third message',
            'user_id'=>3,
        ]);
        Message::create([
            'content'=>'forth message',
            'user_id'=>7,
        ]);
    }
}
