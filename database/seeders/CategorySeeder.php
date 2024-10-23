<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name'=>'web design',
            'color'=>"green",
        ]);
        Category::create([
            'name'=>'Pendidikan',
            'color'=>"blue",
        ]);
        Category::create([
            'name'=>'Humor',
            "color"=>"yellow"
        ]);
        Category::create([
            'name'=>'Machine learning',
            "color"=>'red'
        ]);
    }
}
