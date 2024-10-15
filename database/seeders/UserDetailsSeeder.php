<?php

namespace Database\Seeders;

use App\Models\UserDetails;
use Illuminate\Database\Seeder;

class UserDetailsSeeder extends Seeder
{
    public function run(): void
    {
        UserDetails::create([
            'name' => 'sundar',
            'bio' => 'Turning dreams into plans, one step at a time. I believe in the power of kindness and strive to make the world a better place, one smile at a time. Join me on this journey of positivity and growth!',
            'user_id' => 1,
            'role' => 'admin'
        ]);

        UserDetails::create([
            'name' => 'Developer',
            'bio' => 'Creating my own sunshine ☀️ while wandering where the WiFi is weak. A tech geek by day and a star gazer by night, I love exploring the wonders of life beyond the screen.',
            'user_id' => 2,
            'role' => 'developer'
        ]);

        UserDetails::create([
            'name' => 'audit',
            'bio' => 'Setting trends instead of following them! With a crown of confidence, I embrace my snarky side and aim to inspire others to do the same. Let’s rock this journey together!',
            'user_id' => 3,
            'role' => 'audit'
        ]);
    }
}
