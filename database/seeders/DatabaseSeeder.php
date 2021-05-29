<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{Dimension, Question};

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Dimension::factory(10)
            ->has(Question::factory()->count(3))
            ->create();
    }
}
