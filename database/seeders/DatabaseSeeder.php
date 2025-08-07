<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Article;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
public function run(): void
{
    // Create admin user
    User::firstOrCreate(
        ['email' => 'admin@example.com'],
        [
            'name' => 'Admin User',
            'password' => bcrypt('admin123'),
            'email_verified_at' => now(),
        ]
    );

    // Create regular users
    User::factory(5)->create()->each(function ($user) {
        // Create 2-5 articles per user
        $user->articles()->createMany(
            Article::factory()->count(rand(2, 5))->make()->toArray()
        );
    });

    // Create featured articles
    Article::factory(3)->create([
        'title' => 'Featured: ' . fake()->sentence(),
        'body' => fake()->paragraphs(3, true),
    ]);
}


}

Article::factory()->featured()->count(3)->create();