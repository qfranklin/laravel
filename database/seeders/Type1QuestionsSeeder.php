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
        // Unique Type 1 Questions

        Epa608TestQuestion::firstOrCreate([
            'question' => 'Which type of refrigerant is most harmful to the ozone layer?',
            'question_type' => 'type 1',
            'option_a' => 'CFCs',
            'option_b' => 'HCFCs',
            'option_c' => 'HFCs',
            'option_d' => 'Ammonia',
            'correct_answer' => 'CFCs',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'What is the primary purpose of a recovery unit?',
            'question_type' => 'type 1',
            'option_a' => 'To remove refrigerant from a system',
            'option_b' => 'To add refrigerant to a system',
            'option_c' => 'To measure refrigerant levels',
            'option_d' => 'To clean refrigerant',
            'correct_answer' => 'To remove refrigerant from a system',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'Which of the following is a requirement for Type I certification?',
            'question_type' => 'type 1',
            'option_a' => 'Knowledge of small appliances',
            'option_b' => 'Knowledge of high-pressure systems',
            'option_c' => 'Knowledge of medium-pressure systems',
            'option_d' => 'Knowledge of very high-pressure systems',
            'correct_answer' => 'Knowledge of small appliances',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'What is the maximum allowable charge of refrigerant for Type I appliances?',
            'question_type' => 'type 1',
            'option_a' => '5 pounds',
            'option_b' => '10 pounds',
            'option_c' => '15 pounds',
            'option_d' => '20 pounds',
            'correct_answer' => '5 pounds',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'What is the primary purpose of the EPA Section 608 certification?',
            'question_type' => 'type 1',
            'option_a' => 'To regulate the use of refrigerants',
            'option_b' => 'To ensure safety in the workplace',
            'option_c' => 'To protect the environment',
            'option_d' => 'To improve energy efficiency',
            'correct_answer' => 'To protect the environment',
        ]);

        // Additional Unique Type 1 Questions

        Epa608TestQuestion::firstOrCreate([
            'question' => 'What safety precaution should be taken when servicing a small appliance refrigerant system?',
            'question_type' => 'type 1',
            'option_a' => 'Wearing protective gloves',
            'option_b' => 'Ensuring proper ventilation',
            'option_c' => 'Disconnecting power sources',
            'option_d' => 'All of the above',
            'correct_answer' => 'All of the above',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'Which instrument is most commonly used to measure refrigerant pressure in Type I systems?',
            'question_type' => 'type 1',
            'option_a' => 'Digital thermometer',
            'option_b' => 'Manifold gauge',
            'option_c' => 'Multimeter',
            'option_d' => 'Barometer',
            'correct_answer' => 'Manifold gauge',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'What effect does an overcharged Type I appliance have on its performance?',
            'question_type' => 'type 1',
            'option_a' => 'It improves cooling efficiency',
            'option_b' => 'It may reduce system efficiency and cause damage',
            'option_c' => 'It has no effect',
            'option_d' => 'It reduces energy consumption',
            'correct_answer' => 'It may reduce system efficiency and cause damage',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'When recovering refrigerant from a small appliance, why is it important to use an approved recovery machine?',
            'question_type' => 'type 1',
            'option_a' => 'To speed up the process',
            'option_b' => 'To ensure proper refrigerant recovery and prevent emissions',
            'option_c' => 'To avoid voiding warranty',
            'option_d' => 'To meet service time requirements',
            'correct_answer' => 'To ensure proper refrigerant recovery and prevent emissions',
        ]);
    }
}
