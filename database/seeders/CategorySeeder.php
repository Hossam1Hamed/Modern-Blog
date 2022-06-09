<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'sports',
        ]);
        Category::create([
            'name' => 'art',
        ]);
        Category::create([
            'name' => 'political',
        ]);
        Category::create([
            'name' => 'historical',
        ]);
    }
}
