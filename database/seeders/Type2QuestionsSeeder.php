<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Epa608TestQuestion;

class Type2QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Epa608TestQuestion::create([
            'question' => 'What is the maximum allowable charge of refrigerant for Type II appliances?',
            'question_type' => 'type 2',
            'option_a' => '50 pounds',
            'option_b' => '100 pounds',
            'option_c' => '200 pounds',
            'option_d' => '500 pounds',
            'correct_answer' => '50 pounds',
        ]);

        // Add more type 2 questions as needed
    }
}
