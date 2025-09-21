<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employer;
use App\Models\Job;
use App\Models\Tag;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $tags = Tag::factory(10)->create();

        Job::factory(20)->create()->each(function($job) use ($tags) {
            $job->tags()->attach($tags->random(2));
        });
    }
}
