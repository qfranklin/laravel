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
        Epa608TestQuestion::firstOrCreate([
            'question' => 'Which of the following is a requirement for Type III certification?',
            'question_type' => 'type 3',
            'option_a' => 'Knowledge of low-pressure systems',
            'option_b' => 'Knowledge of high-pressure systems',
            'option_c' => 'Knowledge of medium-pressure systems',
            'option_d' => 'Knowledge of very high-pressure systems',
            'correct_answer' => 'Knowledge of low-pressure systems',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'What is the maximum allowable annual leak rate for a low-pressure system used for comfort cooling containing 50 pounds or more of refrigerant?',
            'question_type' => 'type 3',
            'option_a' => '5% per year',
            'option_b' => '10% per year',
            'option_c' => '20% per year',
            'option_d' => '30% per year',
            'correct_answer' => '10% per year',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'What is the maximum allowable annual leak rate for a low-pressure system used in commercial refrigeration containing 50 pounds or more of refrigerant?',
            'question_type' => 'type 3',
            'option_a' => '5% per year',
            'option_b' => '10% per year',
            'option_c' => '20% per year',
            'option_d' => '30% per year',
            'correct_answer' => '20% per year',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'For an industrial process refrigeration system containing 50 pounds or more of refrigerant, what is the maximum allowable annual leak rate before repairs are required?',
            'question_type' => 'type 3',
            'option_a' => '10%',
            'option_b' => '20%',
            'option_c' => '30%',
            'option_d' => '40%',
            'correct_answer' => '30%',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'What type of certification is required to service or dispose of low-pressure appliances containing ozone-depleting refrigerants?',
            'question_type' => 'type 3',
            'option_a' => 'Type I',
            'option_b' => 'Type II',
            'option_c' => 'Type III',
            'option_d' => 'Universal',
            'correct_answer' => 'Type III',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'When recovering refrigerant from a low-pressure system, where should the vacuum pump service hose be connected?',
            'question_type' => 'type 3',
            'option_a' => 'Compressor discharge port',
            'option_b' => 'Evaporator outlet',
            'option_c' => 'Lowest access point on the system',
            'option_d' => 'Condenser inlet',
            'correct_answer' => 'Lowest access point on the system',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'Which component is used to prevent water from freezing in the chiller evaporator during low ambient conditions?',
            'question_type' => 'type 3',
            'option_a' => 'Expansion valve',
            'option_b' => 'Heater element',
            'option_c' => 'Crankcase heater',
            'option_d' => 'Liquid receiver',
            'correct_answer' => 'Heater element',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'What is the typical range of pressure inside an idle low-pressure chiller?',
            'question_type' => 'type 3',
            'option_a' => '10-15 psig',
            'option_b' => '0-5 psig',
            'option_c' => '20-30 psig',
            'option_d' => 'A vacuum',
            'correct_answer' => 'A vacuum',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'Which of the following actions should be taken if a low-pressure chiller has excessive moisture content in the system?',
            'question_type' => 'type 3',
            'option_a' => 'Purge the refrigerant and replace with new refrigerant',
            'option_b' => 'Recover and recharge the system immediately',
            'option_c' => 'Change the oil and filter-drier',
            'option_d' => 'Add more refrigerant to dilute the moisture',
            'correct_answer' => 'Change the oil and filter-drier',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'Which refrigerant is commonly used in low-pressure chillers?',
            'question_type' => 'type 3',
            'option_a' => 'R-134a',
            'option_b' => 'R-22',
            'option_c' => 'R-123',
            'option_d' => 'R-410A',
            'correct_answer' => 'R-123',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'Why should a recovery vessel for low-pressure refrigerants be kept under a vacuum before recovery?',
            'question_type' => 'type 3',
            'option_a' => 'To prevent excessive pressure buildup',
            'option_b' => 'To reduce recovery time',
            'option_c' => 'To remove non-condensables from the system',
            'option_d' => 'To prevent oil contamination',
            'correct_answer' => 'To reduce recovery time',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'What is the primary function of a purge unit on a low-pressure chiller?',
            'question_type' => 'type 3',
            'option_a' => 'To remove excess oil from the system',
            'option_b' => 'To remove non-condensable gases from the system',
            'option_c' => 'To add additional refrigerant when needed',
            'option_d' => 'To regulate evaporator temperature',
            'correct_answer' => 'To remove non-condensable gases from the system',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'What is the primary safety concern when working with low-pressure refrigeration systems?',
            'question_type' => 'type 3',
            'option_a' => 'High system pressure',
            'option_b' => 'Flammability of refrigerant',
            'option_c' => 'Asphyxiation due to refrigerant leaks',
            'option_d' => 'Electrical hazards',
            'correct_answer' => 'Asphyxiation due to refrigerant leaks',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'What should a technician do before opening a low-pressure refrigeration system for service?',
            'question_type' => 'type 3',
            'option_a' => 'Recover all refrigerant to the required vacuum level',
            'option_b' => 'Vent any excess refrigerant to the atmosphere',
            'option_c' => 'Add nitrogen to pressurize the system',
            'option_d' => 'Increase the system temperature to 150°F',
            'correct_answer' => 'Recover all refrigerant to the required vacuum level',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'What is the maximum allowable leak rate for a low-pressure system that is used in comfort cooling applications and contains 200 pounds of refrigerant?',
            'question_type' => 'type 3',
            'option_a' => '10% per year',
            'option_b' => '15% per year',
            'option_c' => '20% per year',
            'option_d' => '30% per year',
            'correct_answer' => '10% per year',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'When recovering refrigerant from a low-pressure system, which of the following must be done first?',
            'question_type' => 'type 3',
            'option_a' => 'Begin pulling a vacuum on the system',
            'option_b' => 'Isolate the system from other components',
            'option_c' => 'Start the recovery machine',
            'option_d' => 'Open the recovery vessel valve',
            'correct_answer' => 'Isolate the system from other components',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'Which refrigerant is most commonly used in large-scale low-pressure refrigeration systems?',
            'question_type' => 'type 3',
            'option_a' => 'R-12',
            'option_b' => 'R-123',
            'option_c' => 'R-134a',
            'option_d' => 'R-22',
            'correct_answer' => 'R-123',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'What should be done if a low-pressure system experiences an excessively high refrigerant temperature during recovery?',
            'question_type' => 'type 3',
            'option_a' => 'Continue with recovery to avoid system damage',
            'option_b' => 'Stop recovery, and allow the system to cool before proceeding',
            'option_c' => 'Purge the system immediately',
            'option_d' => 'Increase recovery speed to reduce the temperature',
            'correct_answer' => 'Stop recovery, and allow the system to cool before proceeding',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'What is the recommended way to check for leaks in a low-pressure refrigeration system?',
            'question_type' => 'type 3',
            'option_a' => 'Using a soap bubble solution',
            'option_b' => 'Using an electronic leak detector',
            'option_c' => 'Using a vacuum gauge',
            'option_d' => 'By visually inspecting the system components',
            'correct_answer' => 'Using an electronic leak detector',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'Which of the following is the primary purpose of a low-pressure compressor?',
            'question_type' => 'type 3',
            'option_a' => 'To circulate refrigerant through the system',
            'option_b' => 'To increase refrigerant pressure and temperature',
            'option_c' => 'To expel non-condensables from the system',
            'option_d' => 'To store excess refrigerant',
            'correct_answer' => 'To increase refrigerant pressure and temperature',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'In the event of a leak detection system failure, what is the next step a technician should take?',
            'question_type' => 'type 3',
            'option_a' => 'Replace the leak detector immediately',
            'option_b' => 'Report the failure to the building manager',
            'option_c' => 'Evacuate the system and begin manual inspection',
            'option_d' => 'Continue operation, as the system is still functioning',
            'correct_answer' => 'Report the failure to the building manager',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'How can the pressure inside a low-pressure system be reduced during a leak repair procedure?',
            'question_type' => 'type 3',
            'option_a' => 'By using a high-pressure nitrogen charge',
            'option_b' => 'By evacuating the system to a low vacuum level',
            'option_c' => 'By increasing the refrigerant charge',
            'option_d' => 'By closing the system valves',
            'correct_answer' => 'By evacuating the system to a low vacuum level',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'What is a major consequence of a low-pressure system having an excessive amount of refrigerant in the system?',
            'question_type' => 'type 3',
            'option_a' => 'Increased energy efficiency',
            'option_b' => 'Overheating of the compressor',
            'option_c' => 'Slower refrigerant circulation',
            'option_d' => 'Unnecessary expansion of the evaporator',
            'correct_answer' => 'Overheating of the compressor',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'When evacuating a low-pressure system, what is the minimum vacuum level that must be reached before it can be recharged?',
            'question_type' => 'type 3',
            'option_a' => '500 microns of mercury',
            'option_b' => '200 microns of mercury',
            'option_c' => '1,000 microns of mercury',
            'option_d' => '10,000 microns of mercury',
            'correct_answer' => '500 microns of mercury',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'What is the main risk of servicing a low-pressure refrigeration system without first recovering the refrigerant?',
            'question_type' => 'type 3',
            'option_a' => 'Excessive oil contamination',
            'option_b' => 'Release of non-condensable gases',
            'option_c' => 'Exposure to high refrigerant pressures',
            'option_d' => 'Refrigerant leakage into the environment',
            'correct_answer' => 'Refrigerant leakage into the environment',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'When servicing a low-pressure system, what is the best way to prevent the refrigerant from absorbing moisture?',
            'question_type' => 'type 3',
            'option_a' => 'Keep the system closed during service',
            'option_b' => 'Ensure the system is at room temperature',
            'option_c' => 'Use a vacuum pump before servicing',
            'option_d' => 'Maintain the system at a high pressure during service',
            'correct_answer' => 'Use a vacuum pump before servicing',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'What is the main purpose of using an evacuation pump on a low-pressure system?',
            'question_type' => 'type 3',
            'option_a' => 'To remove refrigerant from the system',
            'option_b' => 'To lower the temperature of the system',
            'option_c' => 'To create a vacuum and remove moisture',
            'option_d' => 'To charge the system with refrigerant',
            'correct_answer' => 'To create a vacuum and remove moisture',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'How should the recovery machine be connected when recovering refrigerant from a low-pressure system?',
            'question_type' => 'type 3',
            'option_a' => 'To the low side of the system only',
            'option_b' => 'To both the low and high sides of the system',
            'option_c' => 'Only to the high side of the system',
            'option_d' => 'Only to the compressor discharge line',
            'correct_answer' => 'To both the low and high sides of the system',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'Which of the following is true regarding a purge unit in a low-pressure system?',
            'question_type' => 'type 3',
            'option_a' => 'It removes non-condensable gases from the system',
            'option_b' => 'It is used to pump refrigerant back into the system',
            'option_c' => 'It maintains constant refrigerant pressure',
            'option_d' => 'It filters out any liquid refrigerant in the system',
            'correct_answer' => 'It removes non-condensable gases from the system',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'What is the best procedure to follow if a low-pressure system is suspected of having a leak?',
            'question_type' => 'type 3',
            'option_a' => 'Stop the compressor and recover the refrigerant',
            'option_b' => 'Test for leaks with a refrigerant sniffer or bubble solution',
            'option_c' => 'Increase refrigerant pressure to check for leaks',
            'option_d' => 'Open the system to air and inspect visually',
            'correct_answer' => 'Test for leaks with a refrigerant sniffer or bubble solution',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'When recovering refrigerant from a low-pressure system, what should you do if you experience an excessively high temperature in the recovery tank?',
            'question_type' => 'type 3',
            'option_a' => 'Increase the recovery rate',
            'option_b' => 'Stop recovery and allow the tank to cool',
            'option_c' => 'Purge the system to reduce pressure',
            'option_d' => 'Add more refrigerant to the tank',
            'correct_answer' => 'Stop recovery and allow the tank to cool',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'What should be done if the recovery machine stops working during the recovery process?',
            'question_type' => 'type 3',
            'option_a' => 'Shut down the system and wait for it to restart automatically',
            'option_b' => 'Inspect and repair the recovery machine before continuing',
            'option_c' => 'Continue recovery without interruption',
            'option_d' => 'Remove the recovery machine and replace it with a backup',
            'correct_answer' => 'Inspect and repair the recovery machine before continuing',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'What is a common method for checking the vacuum level in a low-pressure refrigeration system?',
            'question_type' => 'type 3',
            'option_a' => 'By using a compound pressure gauge',
            'option_b' => 'By inspecting the refrigerant compressor',
            'option_c' => 'By using a digital vacuum gauge',
            'option_d' => 'By observing the system’s internal temperature',
            'correct_answer' => 'By using a digital vacuum gauge',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'What is the key advantage of using a liquid receiver in a low-pressure refrigeration system?',
            'question_type' => 'type 3',
            'option_a' => 'It ensures proper refrigerant flow through the system',
            'option_b' => 'It helps control refrigerant pressure in the system',
            'option_c' => 'It prevents refrigerant from freezing during recovery',
            'option_d' => 'It removes non-condensable gases from the system',
            'correct_answer' => 'It helps control refrigerant pressure in the system',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'What must be done before starting refrigerant recovery from a low-pressure system with an operational compressor?',
            'question_type' => 'type 3',
            'option_a' => 'The compressor should be removed and replaced with a pump',
            'option_b' => 'The system should be isolated and all valves opened',
            'option_c' => 'The refrigerant should be vented into the atmosphere',
            'option_d' => 'The system should be cooled down to a lower temperature',
            'correct_answer' => 'The system should be isolated and all valves opened',
        ]);


    }
}
