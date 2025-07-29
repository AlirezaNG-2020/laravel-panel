<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // for($i = 0; $i < 90; $i++) {
        //     DB::table('categories')->insert([
        //         'name' => 'رکورد تستی' . ' ' . $i,
        //         'description' => 'توضیحات' . ' ' . $i,
        //         'cat_id' => 1,
        //         'status' => 1,
        //         'created_at' => Carbon::now()
        //     ]);
        // }
    }
}
