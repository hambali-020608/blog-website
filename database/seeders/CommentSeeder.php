<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;
use App\Models\User;
use App\Models\Posts;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat 200 komentar, pastikan terkait dengan post dan author yang sudah ada
        Comment::factory(20)->make()->each(function ($comment) {
            // Ambil random post dan author yang sudah ada
            $comment->author_id = User::inRandomOrder()->first()->id;
            $comment->post_id = Posts::inRandomOrder()->first()->id;
            
            // Simpan komentar setelah mengisi author_id dan post_id
            $comment->save();
        });
    }
}
