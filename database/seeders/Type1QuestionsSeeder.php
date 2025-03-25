<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Epa608TestQuestion;

class Type1QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Epa608TestQuestion::create([
            'question' => 'Which type of refrigerant is most harmful to the ozone layer?',
            'question_type' => 'type 1',
            'option_a' => 'CFCs',
            'option_b' => 'HCFCs',
            'option_c' => 'HFCs',
            'option_d' => 'Ammonia',
            'correct_answer' => 'CFCs',
        ]);

        // Add more type 1 questions as needed
    }
}
