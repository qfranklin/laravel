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
        // Existing Unique Questions

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
            'question' => 'Which of the following is a requirement for obtaining EPA Section 608 certification?',
            'question_type' => 'type 1',
            'option_a' => 'Knowledge of small appliances',
            'option_b' => 'Knowledge of high-pressure systems',
            'option_c' => 'Knowledge of medium-pressure systems',
            'option_d' => 'Knowledge of very high-pressure systems',
            'correct_answer' => 'Knowledge of small appliances',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'What is the maximum allowable charge of refrigerant for small appliance systems?',
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
            'question' => 'Which instrument is most commonly used to measure refrigerant pressure in small appliance systems?',
            'question_type' => 'type 1',
            'option_a' => 'Digital thermometer',
            'option_b' => 'Manifold gauge',
            'option_c' => 'Multimeter',
            'option_d' => 'Barometer',
            'correct_answer' => 'Manifold gauge',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'What effect does an overcharged small appliance have on its performance?',
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

        Epa608TestQuestion::firstOrCreate([
            'question' => 'How often should you inspect a small appliance system for leaks?',
            'question_type' => 'type 1',
            'option_a' => 'Every month',
            'option_b' => 'Every six months',
            'option_c' => 'Annually',
            'option_d' => 'Only when a malfunction occurs',
            'correct_answer' => 'Annually',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'What is the purpose of using a leak detector when servicing small appliances?',
            'question_type' => 'type 1',
            'option_a' => 'To increase refrigerant charge',
            'option_b' => 'To identify refrigerant leaks',
            'option_c' => 'To calibrate the system pressure',
            'option_d' => 'To monitor energy consumption',
            'correct_answer' => 'To identify refrigerant leaks',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'Before beginning service on a small appliance, what is the most important safety step?',
            'question_type' => 'type 1',
            'option_a' => 'Disconnect power supply',
            'option_b' => 'Ensure proper personal protective equipment is worn',
            'option_c' => 'Check system pressure',
            'option_d' => 'Review the appliance warranty',
            'correct_answer' => 'Ensure proper personal protective equipment is worn',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'What does the term “recycling” mean in the context of refrigerant handling?',
            'question_type' => 'type 1',
            'option_a' => 'Reusing refrigerant without any processing',
            'option_b' => 'Reclaiming and reprocessing refrigerant for reuse',
            'option_c' => 'Disposing of refrigerant safely',
            'option_d' => 'Storing refrigerant for future use',
            'correct_answer' => 'Reclaiming and reprocessing refrigerant for reuse',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'In a small appliance system, which environmental factor is most concerning when refrigerant leaks occur?',
            'question_type' => 'type 1',
            'option_a' => 'Air quality',
            'option_b' => 'Water contamination',
            'option_c' => 'Soil erosion',
            'option_d' => 'Noise pollution',
            'correct_answer' => 'Air quality',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'What is the recommended procedure for evacuating a small appliance refrigerant system?',
            'question_type' => 'type 1',
            'option_a' => 'Performing a rapid evacuation without measuring the vacuum',
            'option_b' => 'Gradually pulling a deep vacuum to remove all air and moisture',
            'option_c' => 'Pressurizing the system with nitrogen first',
            'option_d' => 'Monitoring evaporation rates',
            'correct_answer' => 'Gradually pulling a deep vacuum to remove all air and moisture',
        ]);

        // Additional New Unique Questions

        Epa608TestQuestion::firstOrCreate([
            'question' => 'Which certification level specifically applies to small appliances?',
            'question_type' => 'type 1',
            'option_a' => 'Core',
            'option_b' => 'Small Appliance',
            'option_c' => 'Type II',
            'option_d' => 'Type III',
            'correct_answer' => 'Small Appliance',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'What is a primary risk associated with improper recovery procedures in small appliances?',
            'question_type' => 'type 1',
            'option_a' => 'Reduced cooling capacity',
            'option_b' => 'Environmental release of refrigerants',
            'option_c' => 'Increased energy consumption',
            'option_d' => 'Voiding equipment warranty',
            'correct_answer' => 'Environmental release of refrigerants',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'How does a manifold gauge set help diagnose issues in a small appliance system?',
            'question_type' => 'type 1',
            'option_a' => 'It measures electrical consumption',
            'option_b' => 'It displays precise pressure readings in the system',
            'option_c' => 'It controls refrigerant flow automatically',
            'option_d' => 'It reactivates the compressor',
            'correct_answer' => 'It displays precise pressure readings in the system',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'What environmental impact is minimized by using proper procedures in small appliance servicing?',
            'question_type' => 'type 1',
            'option_a' => 'Reduction in noise pollution',
            'option_b' => 'Minimization of greenhouse gas emissions',
            'option_c' => 'Decrease in water contamination',
            'option_d' => 'Mitigation of soil erosion',
            'correct_answer' => 'Minimization of greenhouse gas emissions',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'What is the recommended frequency for calibrating a manifold gauge set in small appliance systems?',
            'question_type' => 'type 1',
            'option_a' => 'Every week',
            'option_b' => 'Every month',
            'option_c' => 'Every six months',
            'option_d' => 'Annually',
            'correct_answer' => 'Every six months',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'Which component is essential for ensuring accurate pressure readings in a refrigerant recovery process?',
            'question_type' => 'type 1',
            'option_a' => 'A properly sealed hose',
            'option_b' => 'A calibrated gauge',
            'option_c' => 'An electronic sensor',
            'option_d' => 'A mechanical filter',
            'correct_answer' => 'A calibrated gauge',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'During service of a small appliance system, what role does nitrogen play in the evacuation process?',
            'question_type' => 'type 1',
            'option_a' => 'Acts as a refrigerant substitute',
            'option_b' => 'Helps remove moisture and non-condensable gases',
            'option_c' => 'Increases system pressure',
            'option_d' => 'Lubricates compressor components',
            'correct_answer' => 'Helps remove moisture and non-condensable gases',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'What is the key advantage of using digital leak detectors in modern small appliance servicing?',
            'question_type' => 'type 1',
            'option_a' => 'Improved accuracy and sensitivity',
            'option_b' => 'Lower cost compared to analog devices',
            'option_c' => 'Ease of use without training',
            'option_d' => 'No need for calibration',
            'correct_answer' => 'Improved accuracy and sensitivity',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'How can technicians ensure the longevity of refrigerant recovery equipment in small appliance systems?',
            'question_type' => 'type 1',
            'option_a' => 'By frequent replacement of components',
            'option_b' => 'By scheduled maintenance and proper calibration',
            'option_c' => 'By using it only in emergency situations',
            'option_d' => 'By operating it at maximum capacity at all times',
            'correct_answer' => 'By scheduled maintenance and proper calibration',
        ]);
    }
}
