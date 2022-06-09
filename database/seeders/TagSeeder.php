<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;
class TagSeeder extends Seeder
{
    public function run()
    {
        Tag::create([
            'name' => 'sports',
        ]);
        Tag::create([
            'name' => 'policy',
        ]);
        Tag::create([
            'name' => 'history',
        ]);
        Tag::create([
            'name' => 'biology',
        ]);
    }
}
