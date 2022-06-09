<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
class PostSeeder extends Seeder
{
    
    public function run()
    {
        Post::create([
            'title'=>'first post',
            'content' => 'this my first dummy post for testting',
            'user_id' => '1',
            'cat_id' => '1'
        ]);
        Post::create([
            'title'=>'second post',
            'content' => 'this my second dummy post for testting',
            'user_id' => '2',
            'cat_id' => '2'
        ]);
        Post::create([
            'title'=>'third post',
            'content' => 'this my third dummy post for testting',
            'user_id' => '3',
            'cat_id' => '3'
        ]);
        Post::create([
            'title'=>'forth post',
            'content' => 'this my forth dummy post for testting',
            'user_id' => '4',
            'cat_id' => '4'
        ]);
        
        foreach (Post::all() as $post){
            $tags = \App\Models\Tag::inRandomOrder()->take(rand(1,3))->pluck('id');
            $post->tags()->attach($tags);
        }
    }
}
