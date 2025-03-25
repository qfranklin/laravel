<?php

namespace Database\Seeders;

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
        $this->call([
            CoreQuestionsSeeder::class,
            Type1QuestionsSeeder::class,
            Type2QuestionsSeeder::class,
            Type3QuestionsSeeder::class,
        ]);
    }
}
