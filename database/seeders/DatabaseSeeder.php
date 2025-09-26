<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Employer;
use App\Models\Job;
use App\Models\Tag;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create a default test user
        User::factory()->create([
           'name' => 'John Doe',
    'email' => 'test@example.com',
        ]);

        // Create some tags
        $tags = Tag::factory(10)->create();

        // Create some employers
        $employers = Employer::factory(5)->create();

        // Create jobs and attach them to random employers & tags
        Job::factory(20)->create([
            'employer_id' => $employers->random()->id,
        ])->each(function ($job) use ($tags) {
            $job->tags()->attach($tags->random(2));
        });
    }
}
