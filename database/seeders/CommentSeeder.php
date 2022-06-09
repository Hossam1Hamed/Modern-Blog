<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;
class CommentSeeder extends Seeder
{
    
    public function run()
    {
        Comment::create([
            'content'=>'my first comment',
            'post_id'=>'2',
        ]);
        Comment::create([
            'content'=>'my second comment',
            'post_id'=>'2',
        ]);
        Comment::create([
            'content'=>'my 19928 comment',
            'post_id'=>'3',
        ]);
        Comment::create([
            'content'=>'my puasdu1 comment',
            'post_id'=>'1',
        ]);
    }
}
