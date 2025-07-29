<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ybazli\Faker\Facades\Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        for($i= 0; $i < 5; $i++) {
            DB::table('post_categories')->insert([
                'name' => Faker::paragraph(),
                'description' => Faker::paragraph(),
                'image' => 'image.fake.pnp',
                'slug' => 'this-is-slug-' . $i,
                'tags' => 'this is a tage' .$i
            ]);
        }
    }
}
