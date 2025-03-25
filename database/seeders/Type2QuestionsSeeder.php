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
        Epa608TestQuestion::firstOrCreate([
            'question' => 'What is the maximum allowable charge of refrigerant for Type II appliances?',
            'question_type' => 'type 2',
            'option_a' => '50 pounds',
            'option_b' => '100 pounds',
            'option_c' => '200 pounds',
            'option_d' => '500 pounds',
            'correct_answer' => '50 pounds',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'What is the required evacuation level for an appliance using more than 200 pounds of refrigerant?',
            'question_type' => 'type 2',
            'option_a' => '0 inches of Hg',
            'option_b' => '10 inches of Hg',
            'option_c' => '15 inches of Hg',
            'option_d' => '20 inches of Hg',
            'correct_answer' => '15 inches of Hg',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'Which of the following refrigerants is classified as a high-pressure refrigerant?',
            'question_type' => 'type 2',
            'option_a' => 'R-22',
            'option_b' => 'R-123',
            'option_c' => 'R-134a',
            'option_d' => 'R-717',
            'correct_answer' => 'R-22',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'What is the primary purpose of a liquid receiver in a refrigeration system?',
            'question_type' => 'type 2',
            'option_a' => 'To store excess refrigerant',
            'option_b' => 'To filter refrigerant',
            'option_c' => 'To increase refrigerant pressure',
            'option_d' => 'To reduce refrigerant temperature',
            'correct_answer' => 'To store excess refrigerant',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'What is the maximum allowable leak rate for industrial process refrigeration equipment?',
            'question_type' => 'type 2',
            'option_a' => '10%',
            'option_b' => '15%',
            'option_c' => '20%',
            'option_d' => '30%',
            'correct_answer' => '30%',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'Which component is used to remove moisture and contaminants from refrigerant in a refrigeration system?',
            'question_type' => 'type 2',
            'option_a' => 'Accumulator',
            'option_b' => 'Receiver',
            'option_c' => 'Filter-drier',
            'option_d' => 'Condenser',
            'correct_answer' => 'Filter-drier',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'What is the primary function of a thermostatic expansion valve (TXV) in a refrigeration system?',
            'question_type' => 'type 2',
            'option_a' => 'To regulate refrigerant flow into the evaporator',
            'option_b' => 'To increase refrigerant pressure',
            'option_c' => 'To decrease refrigerant temperature',
            'option_d' => 'To store excess refrigerant',
            'correct_answer' => 'To regulate refrigerant flow into the evaporator',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'Which of the following is a common symptom of a refrigerant overcharge in a system?',
            'question_type' => 'type 2',
            'option_a' => 'Low suction pressure',
            'option_b' => 'High discharge pressure',
            'option_c' => 'Frost on the evaporator coil',
            'option_d' => 'Low discharge pressure',
            'correct_answer' => 'High discharge pressure',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'What is the purpose of a sight glass in a refrigeration system?',
            'question_type' => 'type 2',
            'option_a' => 'To measure refrigerant pressure',
            'option_b' => 'To observe the refrigerant flow',
            'option_c' => 'To filter refrigerant',
            'option_d' => 'To store excess refrigerant',
            'correct_answer' => 'To observe the refrigerant flow',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'Which of the following is a potential consequence of non-condensable gases in a refrigeration system?',
            'question_type' => 'type 2',
            'option_a' => 'Increased system efficiency',
            'option_b' => 'Decreased system pressure',
            'option_c' => 'Increased head pressure',
            'option_d' => 'Decreased refrigerant flow',
            'correct_answer' => 'Increased head pressure',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'What is the primary cause of liquid slugging in a refrigeration system?',
            'question_type' => 'type 2',
            'option_a' => 'Low refrigerant charge',
            'option_b' => 'Overheating of the compressor',
            'option_c' => 'Liquid refrigerant entering the compressor',
            'option_d' => 'High superheat',
            'correct_answer' => 'Liquid refrigerant entering the compressor',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'Which component in a refrigeration system is responsible for rejecting heat?',
            'question_type' => 'type 2',
            'option_a' => 'Evaporator',
            'option_b' => 'Compressor',
            'option_c' => 'Condenser',
            'option_d' => 'Expansion valve',
            'correct_answer' => 'Condenser',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'What must be done before disposing of a refrigerant container?',
            'question_type' => 'type 2',
            'option_a' => 'Ensure the container is completely empty and rendered useless',
            'option_b' => 'Release remaining refrigerant into the atmosphere',
            'option_c' => 'Fill it with water before disposal',
            'option_d' => 'Recycle the container without any special preparation',
            'correct_answer' => 'Ensure the container is completely empty and rendered useless',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'Which type of refrigerant leak detector is the most effective for pinpointing small leaks?',
            'question_type' => 'type 2',
            'option_a' => 'Ultrasonic detector',
            'option_b' => 'Electronic leak detector',
            'option_c' => 'Soap bubble method',
            'option_d' => 'Halide torch',
            'correct_answer' => 'Electronic leak detector',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'What is the primary function of a crankcase heater in a refrigeration system?',
            'question_type' => 'type 2',
            'option_a' => 'To heat the evaporator coil',
            'option_b' => 'To prevent refrigerant migration to the compressor',
            'option_c' => 'To increase system pressure',
            'option_d' => 'To cool the compressor motor',
            'correct_answer' => 'To prevent refrigerant migration to the compressor',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'What is the typical consequence of an undersized suction line in a refrigeration system?',
            'question_type' => 'type 2',
            'option_a' => 'Increased refrigerant flow',
            'option_b' => 'Excessive pressure drop and reduced capacity',
            'option_c' => 'Higher efficiency of the system',
            'option_d' => 'Lower compressor discharge temperature',
            'correct_answer' => 'Excessive pressure drop and reduced capacity',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'Why is it important to evacuate a refrigeration system before charging?',
            'question_type' => 'type 2',
            'option_a' => 'To remove non-condensable gases and moisture',
            'option_b' => 'To increase refrigerant pressure',
            'option_c' => 'To improve oil circulation',
            'option_d' => 'To lower system efficiency',
            'correct_answer' => 'To remove non-condensable gases and moisture',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'Which condition indicates that a refrigeration system may be operating with a low refrigerant charge?',
            'question_type' => 'type 2',
            'option_a' => 'High suction pressure',
            'option_b' => 'Low superheat',
            'option_c' => 'High discharge pressure',
            'option_d' => 'Low suction pressure',
            'correct_answer' => 'Low suction pressure',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'What is the function of a pressure relief valve in a refrigeration system?',
            'question_type' => 'type 2',
            'option_a' => 'To regulate refrigerant flow',
            'option_b' => 'To relieve excess system pressure',
            'option_c' => 'To increase compressor efficiency',
            'option_d' => 'To control refrigerant temperature',
            'correct_answer' => 'To relieve excess system pressure',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'What is the most accurate method to determine the full charge of a refrigeration system?',
            'question_type' => 'type 2',
            'option_a' => 'Measuring suction line temperature',
            'option_b' => 'Checking for frost buildup on the evaporator',
            'option_c' => 'Weighing the refrigerant charge',
            'option_d' => 'Monitoring the sight glass',
            'correct_answer' => 'Weighing the refrigerant charge',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'Which of the following factors can cause high superheat in a refrigeration system?',
            'question_type' => 'type 2',
            'option_a' => 'Overcharged system',
            'option_b' => 'Undercharged system',
            'option_c' => 'Dirty condenser coils',
            'option_d' => 'Restricted liquid line',
            'correct_answer' => 'Undercharged system',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'What is the main function of a hot gas bypass valve in a refrigeration system?',
            'question_type' => 'type 2',
            'option_a' => 'To relieve excess system pressure',
            'option_b' => 'To prevent evaporator freeze-up under low loads',
            'option_c' => 'To increase condenser efficiency',
            'option_d' => 'To separate oil from refrigerant',
            'correct_answer' => 'To prevent evaporator freeze-up under low loads',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'What type of oil is most commonly used with HFC refrigerants?',
            'question_type' => 'type 2',
            'option_a' => 'Mineral oil',
            'option_b' => 'Alkylbenzene oil',
            'option_c' => 'Polyolester (POE) oil',
            'option_d' => 'Paraffinic oil',
            'correct_answer' => 'Polyolester (POE) oil',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'Which of the following is the best method to prevent oil trapping in a refrigeration system\'s suction line?',
            'question_type' => 'type 2',
            'option_a' => 'Installing a larger liquid receiver',
            'option_b' => 'Using proper piping slopes and traps',
            'option_c' => 'Overcharging the system with refrigerant',
            'option_d' => 'Reducing system pressure',
            'correct_answer' => 'Using proper piping slopes and traps',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'What is the primary reason for using a vacuum pump in a refrigeration system?',
            'question_type' => 'type 2',
            'option_a' => 'To pressurize the system before charging',
            'option_b' => 'To remove moisture and non-condensable gases',
            'option_c' => 'To increase the refrigerant flow rate',
            'option_d' => 'To decrease system efficiency',
            'correct_answer' => 'To remove moisture and non-condensable gases',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'Which condition could lead to compressor overheating in a refrigeration system?',
            'question_type' => 'type 2',
            'option_a' => 'Excess refrigerant charge',
            'option_b' => 'High suction pressure',
            'option_c' => 'Low superheat',
            'option_d' => 'High discharge pressure',
            'correct_answer' => 'High discharge pressure',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'What should be done if a strong odor is detected when recovering refrigerant from a burned-out compressor?',
            'question_type' => 'type 2',
            'option_a' => 'Vent the refrigerant outdoors',
            'option_b' => 'Use the refrigerant in another system',
            'option_c' => 'Test the oil for acid buildup',
            'option_d' => 'Immediately recharge the system',
            'correct_answer' => 'Test the oil for acid buildup',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'Why is it important to measure both high-side and low-side pressures when troubleshooting a refrigeration system?',
            'question_type' => 'type 2',
            'option_a' => 'To determine the correct charge level',
            'option_b' => 'To check for proper superheat and subcooling',
            'option_c' => 'To evaluate compressor efficiency',
            'option_d' => 'All of the above',
            'correct_answer' => 'All of the above',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'What is the purpose of a capillary tube in a refrigeration system?',
            'question_type' => 'type 2',
            'option_a' => 'To regulate refrigerant flow into the evaporator',
            'option_b' => 'To increase compressor efficiency',
            'option_c' => 'To store excess refrigerant',
            'option_d' => 'To prevent oil migration',
            'correct_answer' => 'To regulate refrigerant flow into the evaporator',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'Which factor determines the required vacuum level for refrigerant recovery?',
            'question_type' => 'type 2',
            'option_a' => 'Type of compressor used',
            'option_b' => 'Amount of refrigerant charge',
            'option_c' => 'Type of refrigerant and system size',
            'option_d' => 'Operating temperature of the evaporator',
            'correct_answer' => 'Type of refrigerant and system size',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'What should be done if a refrigeration system is found to be leaking beyond the allowable leak rate?',
            'question_type' => 'type 2',
            'option_a' => 'Recharge the system without repair',
            'option_b' => 'Recover the refrigerant and replace the entire system',
            'option_c' => 'Repair the leak and verify the fix with a follow-up test',
            'option_d' => 'Vent the remaining refrigerant and start fresh',
            'correct_answer' => 'Repair the leak and verify the fix with a follow-up test',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'Which component prevents liquid refrigerant from reaching the compressor in a refrigeration system?',
            'question_type' => 'type 2',
            'option_a' => 'Thermal expansion valve',
            'option_b' => 'Suction accumulator',
            'option_c' => 'Liquid receiver',
            'option_d' => 'Evaporator coil',
            'correct_answer' => 'Suction accumulator',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'What is the primary indicator that a refrigeration system has non-condensable gases present?',
            'question_type' => 'type 2',
            'option_a' => 'Low suction pressure',
            'option_b' => 'High discharge pressure',
            'option_c' => 'Frost on the liquid line',
            'option_d' => 'Low refrigerant charge',
            'correct_answer' => 'High discharge pressure',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'Why should refrigerant be removed from the liquid line before opening the system for repair?',
            'question_type' => 'type 2',
            'option_a' => 'To reduce system efficiency',
            'option_b' => 'To prevent oil migration',
            'option_c' => 'To avoid refrigerant loss and potential frostbite',
            'option_d' => 'To maintain system balance',
            'correct_answer' => 'To avoid refrigerant loss and potential frostbite',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'Which of the following is a likely cause of excessive head pressure in an air-cooled refrigeration system?',
            'question_type' => 'type 2',
            'option_a' => 'Dirty condenser coils',
            'option_b' => 'Low refrigerant charge',
            'option_c' => 'Restricted evaporator coil',
            'option_d' => 'Faulty expansion valve',
            'correct_answer' => 'Dirty condenser coils',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'When performing a standing pressure test, what indicates the presence of a leak?',
            'question_type' => 'type 2',
            'option_a' => 'A rapid drop in system pressure',
            'option_b' => 'A steady increase in pressure',
            'option_c' => 'No change in pressure for 24 hours',
            'option_d' => 'A sudden rise in suction pressure',
            'correct_answer' => 'A rapid drop in system pressure',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'Which of the following is a proper method for detecting small leaks in a refrigeration system?',
            'question_type' => 'type 2',
            'option_a' => 'Listening for hissing noises',
            'option_b' => 'Applying soap bubbles to suspected areas',
            'option_c' => 'Feeling for cold spots on pipes',
            'option_d' => 'Visually inspecting for frost buildup',
            'correct_answer' => 'Applying soap bubbles to suspected areas',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'What is the maximum allowable refrigerant leak rate for an industrial process refrigeration system containing 500 pounds of refrigerant?',
            'question_type' => 'type 2',
            'option_a' => '10%',
            'option_b' => '15%',
            'option_c' => '20%',
            'option_d' => '30%',
            'correct_answer' => '20%',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'What is the purpose of a crankcase heater in a refrigeration system?',
            'question_type' => 'type 2',
            'option_a' => 'To increase compressor efficiency',
            'option_b' => 'To prevent refrigerant migration into the oil during off cycles',
            'option_c' => 'To increase system pressure during startup',
            'option_d' => 'To decrease the need for lubrication',
            'correct_answer' => 'To prevent refrigerant migration into the oil during off cycles',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'Which type of metering device adjusts automatically to changes in load conditions?',
            'question_type' => 'type 2',
            'option_a' => 'Capillary tube',
            'option_b' => 'Fixed orifice',
            'option_c' => 'Thermostatic expansion valve (TXV)',
            'option_d' => 'Piston-type metering device',
            'correct_answer' => 'Thermostatic expansion valve (TXV)',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'What should be done if a refrigeration system is opened for a major repair?',
            'question_type' => 'type 2',
            'option_a' => 'The refrigerant should be vented into the atmosphere',
            'option_b' => 'The system should be flushed with compressed air',
            'option_c' => 'The remaining refrigerant must be recovered before opening the system',
            'option_d' => 'Only the high side of the system needs to be evacuated',
            'correct_answer' => 'The remaining refrigerant must be recovered before opening the system',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'Which factor can cause excessive moisture accumulation in a refrigeration system?',
            'question_type' => 'type 2',
            'option_a' => 'Overcharging with refrigerant',
            'option_b' => 'Using an oversized compressor',
            'option_c' => 'A defective filter drier',
            'option_d' => 'A high-pressure cutout switch failure',
            'correct_answer' => 'A defective filter drier',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'Why is it important to evacuate a refrigeration system before charging it with refrigerant?',
            'question_type' => 'type 2',
            'option_a' => 'To reduce refrigerant charge size',
            'option_b' => 'To remove moisture and air from the system',
            'option_c' => 'To increase system efficiency by adding lubrication',
            'option_d' => 'To ensure the expansion valve operates correctly',
            'correct_answer' => 'To remove moisture and air from the system',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'What is the purpose of a receiver in a refrigeration system?',
            'question_type' => 'type 2',
            'option_a' => 'To separate oil from the refrigerant',
            'option_b' => 'To provide storage for excess liquid refrigerant',
            'option_c' => 'To improve heat transfer in the evaporator',
            'option_d' => 'To regulate refrigerant pressure',
            'correct_answer' => 'To provide storage for excess liquid refrigerant',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'Which action should be taken when recovering refrigerant from a system with a receiver?',
            'question_type' => 'type 2',
            'option_a' => 'Recover only from the liquid line',
            'option_b' => 'Recover only from the suction line',
            'option_c' => 'Recover from both the liquid and vapor sides to ensure complete removal',
            'option_d' => 'Drain the oil before recovery',
            'correct_answer' => 'Recover from both the liquid and vapor sides to ensure complete removal',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'What could cause a compressor to short-cycle?',
            'question_type' => 'type 2',
            'option_a' => 'A defective high-pressure switch',
            'option_b' => 'An overcharged system',
            'option_c' => 'A faulty low-pressure switch',
            'option_d' => 'All of the above',
            'correct_answer' => 'All of the above',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'Which condition would indicate that a system has a restricted liquid line?',
            'question_type' => 'type 2',
            'option_a' => 'Low suction pressure and high discharge pressure',
            'option_b' => 'High suction pressure and low discharge pressure',
            'option_c' => 'Low suction pressure and low discharge pressure',
            'option_d' => 'High suction pressure and high discharge pressure',
            'correct_answer' => 'Low suction pressure and low discharge pressure',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'Which safety precaution should be taken when working with liquid refrigerant?',
            'question_type' => 'type 2',
            'option_a' => 'Wear safety goggles and insulated gloves',
            'option_b' => 'Only work on systems when they are under pressure',
            'option_c' => 'Keep all doors and windows closed in the work area',
            'option_d' => 'Apply direct heat to the refrigerant cylinder for faster charging',
            'correct_answer' => 'Wear safety goggles and insulated gloves',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'Which method is best for removing ice buildup from an evaporator coil?',
            'question_type' => 'type 2',
            'option_a' => 'Using a hammer to break the ice off',
            'option_b' => 'Using a torch to melt the ice',
            'option_c' => 'Allowing the coil to defrost naturally or using warm air',
            'option_d' => 'Overcharging the system with refrigerant to create additional heat',
            'correct_answer' => 'Allowing the coil to defrost naturally or using warm air',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'Which action should be taken when a compressor burnout occurs?',
            'question_type' => 'type 2',
            'option_a' => 'Flush the system and replace the filter drier',
            'option_b' => 'Simply replace the compressor without additional steps',
            'option_c' => 'Vent the refrigerant and recharge with a fresh supply',
            'option_d' => 'Continue operating the system to burn off the contaminants',
            'correct_answer' => 'Flush the system and replace the filter drier',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'What should a technician do if they detect acid in a refrigeration system?',
            'question_type' => 'type 2',
            'option_a' => 'Recover and reuse the refrigerant without any additional steps',
            'option_b' => 'Replace the compressor and restart the system immediately',
            'option_c' => 'Flush the system, replace the filter drier, and recharge with new refrigerant',
            'option_d' => 'Add more refrigerant to dilute the acid',
            'correct_answer' => 'Flush the system, replace the filter drier, and recharge with new refrigerant',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'What is the most likely result of a clogged evaporator coil?',
            'question_type' => 'type 2',
            'option_a' => 'Higher than normal suction pressure',
            'option_b' => 'Increased system efficiency',
            'option_c' => 'Reduced heat transfer and potential system freeze-up',
            'option_d' => 'Higher than normal discharge pressure',
            'correct_answer' => 'Reduced heat transfer and potential system freeze-up',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'Which condition would indicate a system is overcharged with refrigerant?',
            'question_type' => 'type 2',
            'option_a' => 'High suction pressure and low discharge pressure',
            'option_b' => 'High discharge pressure and high suction pressure',
            'option_c' => 'Low suction pressure and low discharge pressure',
            'option_d' => 'Normal system pressures but poor cooling performance',
            'correct_answer' => 'High discharge pressure and high suction pressure',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'What is the recommended method for checking for refrigerant leaks in a system?',
            'question_type' => 'type 2',
            'option_a' => 'Using soap bubbles or an electronic leak detector',
            'option_b' => 'Checking for oil stains around fittings',
            'option_c' => 'Listening for hissing sounds near joints',
            'option_d' => 'Releasing a small amount of refrigerant to check for smell',
            'correct_answer' => 'Using soap bubbles or an electronic leak detector',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'Why is it important to replace the filter drier after a major system repair?',
            'question_type' => 'type 2',
            'option_a' => 'To prevent excess refrigerant from freezing',
            'option_b' => 'To remove moisture and contaminants from the system',
            'option_c' => 'To reduce system pressure and improve efficiency',
            'option_d' => 'To act as a refrigerant reservoir for system balance',
            'correct_answer' => 'To remove moisture and contaminants from the system',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'What is the purpose of superheat in a refrigeration system?',
            'question_type' => 'type 2',
            'option_a' => 'To increase liquid refrigerant in the evaporator',
            'option_b' => 'To ensure only vapor enters the compressor',
            'option_c' => 'To improve oil circulation in the system',
            'option_d' => 'To decrease system head pressure',
            'correct_answer' => 'To ensure only vapor enters the compressor',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'When recovering refrigerant from a system that has had a compressor burnout, what should be done?',
            'question_type' => 'type 2',
            'option_a' => 'Recover the refrigerant and reuse it immediately',
            'option_b' => 'Recover the refrigerant and filter it before reusing',
            'option_c' => 'Recover the refrigerant into a separate recovery cylinder and check for contamination',
            'option_d' => 'Vent the refrigerant into the atmosphere',
            'correct_answer' => 'Recover the refrigerant into a separate recovery cylinder and check for contamination',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'What is the primary purpose of an expansion valve in a refrigeration system?',
            'question_type' => 'type 2',
            'option_a' => 'To increase refrigerant pressure before entering the evaporator',
            'option_b' => 'To regulate the flow of refrigerant into the evaporator',
            'option_c' => 'To remove moisture from the refrigerant',
            'option_d' => 'To convert refrigerant from a gas to a liquid',
            'correct_answer' => 'To regulate the flow of refrigerant into the evaporator',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'Which component is responsible for removing heat from the refrigerant before it enters the expansion valve?',
            'question_type' => 'type 2',
            'option_a' => 'Evaporator coil',
            'option_b' => 'Condenser coil',
            'option_c' => 'Filter drier',
            'option_d' => 'Compressor',
            'correct_answer' => 'Condenser coil',
        ]);

        Epa608TestQuestion::firstOrCreate([
            'question' => 'What should be done if a system fails a standing pressure test?',
            'question_type' => 'type 2',
            'option_a' => 'Charge the system and restart it to verify the problem',
            'option_b' => 'Vent the refrigerant and replace all seals',
            'option_c' => 'Locate and repair the leak before proceeding with evacuation and charging',
            'option_d' => 'Add additional refrigerant to compensate for the leak',
            'correct_answer' => 'Locate and repair the leak before proceeding with evacuation and charging',
        ]);

    }
}
