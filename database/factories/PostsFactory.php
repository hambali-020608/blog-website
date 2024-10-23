<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PostsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Posts::class;
    public function definition(): array
    {
        return [ 
        'title'=>fake()->sentence(),
        'content'=>fake()->text(),
        'category_id'=>Category::factory(),
        'author_id'=>User::factory(),


            //
        ];
    }
}
