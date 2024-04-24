<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Actor;

class ActorSeeder extends Seeder
{
    public function run()
    {
        Actor::factory(10)->create();
        // Create 10 actors using the Actor factory
    }
}
