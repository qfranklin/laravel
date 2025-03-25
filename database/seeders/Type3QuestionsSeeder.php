<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Epa608TestQuestion;

class Type3QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Epa608TestQuestion::create([
            'question' => 'Which of the following is a requirement for Type III certification?',
            'question_type' => 'type 3',
            'option_a' => 'Knowledge of low-pressure systems',
            'option_b' => 'Knowledge of high-pressure systems',
            'option_c' => 'Knowledge of medium-pressure systems',
            'option_d' => 'Knowledge of very high-pressure systems',
            'correct_answer' => 'Knowledge of low-pressure systems',
        ]);

        // Add more type 3 questions as needed
    }
}
