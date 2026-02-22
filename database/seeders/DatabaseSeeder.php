<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Article;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // إنشاء مستخدم أدمن
        User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => bcrypt('admin123'),
                'email_verified_at' => now(),
                'role' => 'admin',
            ]
        );

        // إنشاء مستخدمين عاديين
        User::factory(5)->create(['role' => 'user'])->each(function ($user) {
            // إنشاء 2-5 مقالات لكل مستخدم
            $user->articles()->createMany(
                Article::factory()->count(rand(2, 5))->make()->toArray()
            );
        });

        // إنشاء مقالات متميزة
        Article::factory(3)->create([
            'title' => 'مقالة متميزة: ' . fake()->sentence(),
            'body' => fake()->paragraphs(3, true),
        ]);
    }
}
