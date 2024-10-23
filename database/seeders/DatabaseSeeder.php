<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Posts;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,

        ]);
        Posts::factory(100)->recycle([
            User::all(),
            Category::all()])->create();
    }
}