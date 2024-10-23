<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'hambali',
            'email'=>'hambali@gmail.com',
            'password'=>'12345678',
            'role'=>'admin'
        ]);
        User::create([
            'name'=>'bastian',
            'email'=>'bastian@gmail.com',
            'password'=>'12345678',
            'role'=>'user'
        ]);
        User::factory(10)->create();
    }
}
