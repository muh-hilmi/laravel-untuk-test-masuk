<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\Blog::factory()->create([
            'name' => 'Test User',
            'title' => 'test@example.com',
            'desc' => 'test@example.com',
            'suhtor' => 'test@example.com',
        ]);
    }
}
