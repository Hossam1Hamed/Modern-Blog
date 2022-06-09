<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Profile;
class ProfileSeeder extends Seeder
{
    public function run()
    {
        Profile::create([
            'user_id'=>1,
        ]);
        Profile::create([
            'user_id'=>2,
        ]);
        Profile::create([
            'user_id'=>3,
        ]);
        Profile::create([
            'user_id'=>4,
        ]);
        Profile::create([
            'user_id'=>5,
        ]);
    }
}
