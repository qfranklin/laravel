<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Epa608TestQuestion;

class CoreQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Epa608TestQuestion::create([
            'question' => 'What is the primary purpose of the EPA Section 608 certification?',
            'question_type' => 'core',
            'option_a' => 'To regulate the use of refrigerants',
            'option_b' => 'To ensure safety in the workplace',
            'option_c' => 'To protect the environment',
            'option_d' => 'To improve energy efficiency',
            'correct_answer' => 'To protect the environment',
        ]);

        // Add more core questions as needed
    }
}
