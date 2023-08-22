<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class GeneralQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \DB::table('general_questions')->delete();

        $questions = [
            ['name' => 'Correct staffing levels at attraction with required uniform (season shirt, badge)', 'type' => 'Attendant'],
            ['name' => 'Is the information correctly displayed at the entrance (height board-Arabic and English, rules and regulations, attendant in position checking and explaining restrictions-height, weight, pregnancy, visible injuries)', 'type' => 'Attendant'],
            ['name' => 'Attendant at the swiper/pay point tapping/ scanning pay card or wristband before guests enter attraction, control inflow of customers, prevent queue jumping', 'type' => 'Attendant'],
            ['name' => 'Platform attendants’ direct guests onto platform and instruct guests where to place loose articles in designated areas', 'type' => 'Attendant'],
            ['name' => 'Attendants are communicating effectively with the correct hand signals (Open restraints, close restraints, assistance needed, emergency stop, ride stop, safe to dispatch)', 'type' => 'Attendant'],
            ['name' => 'Attendant instructs guests on how to safely exit the attraction', 'type' => 'Attendant'],
            ['name' => 'Has the Pre-opening checklist and test cycles been completed correctly and signed off', 'type' => 'Operator'],
            ['name' => 'Operator/s are always in the proper location to assist and observe', 'type' => 'Operator'],
            ['name' => 'Operator is checking if guests are wearing appropriate clothing and PPEs before using the attraction (Life jackets, harnesses, etc.) (where applicable)', 'type' => 'Operator'],
            ['name' => 'Staff following procedures (hazard zone handling, balancing of the ride)', 'type' => 'Operator'],
            ['name' => 'Operator is communicating effectively with the correct hand signals (OK Signal) and ensuring no unauthorized personnel are in or around the attraction, payboxes or back of house', 'type' => 'Operator'],
            ['name' => 'All Evacuation Equipment is stored correctly at the attraction and is easily accessible', 'type' => 'Operator'],
            ['name' => 'Operator observes guests as they use the attraction (monitoring of guest behavior, fainting, cell phones, guests in distress, abnormal occurrences)', 'type' => 'Operator'],
            ['name' => 'SOPs and Risk Assessments at the attraction', 'type' => 'Reporting and Documentation'],
            ['name' => 'OPS and Tech sheets along with radio and iPad are in the paybox / at the Control Panel', 'type' => 'Reporting and Documentation'],
            ['name' => 'Incidents (Guests complaints / Medicals / Downtimes) are recorded on iPad and relevant    documentation and reported to relevant parties', 'type' => 'Reporting and Documentation'],
            ['name' => 'Are all Team Members appropriately presentable including uniform and overall appearance?', 'type' => 'General Remarks'],
            ['name' => 'Is the attraction clear of trash (walkways are clear of obstructions), front of house wiped clean-seats, gates, gondolas', 'type' => 'General Remarks'],
            ['name' => 'Is all the attraction signage visible and in good condition.', 'type' => 'General Remarks'],
            ['name' => 'Is the operator playing the approved playlist (where applicable)', 'type' => 'General Remarks'],
            ['name' => 'Is the required Evacuation Equipment correct for the attraction', 'type' => 'Attraction Specific'],
            [
                'name' => 'Are all staff members on their positions (entrance and exit gate, designated positions around the
            Platform)',
                'type' => 'Attraction Specific'
            ],
            ['name' => 'Has all faults/aesthetics and general comments to maintenance been shared?', 'type' => 'Attraction Specific'],
            ['name' => 'Are the attendants using the push and pull technique on the restraints / checking seat belts / lap bars (where applicable)', 'type' => 'Attraction Specific'],
            ['name' => 'Is the right number of staff present and signed in?', 'type' => 'Attraction Specific'],
            ['name' => 'Is the ride perimeter secured?', 'type' => 'Attraction Specific'],
            ['name' => 'Are the attendant’s instructing the customers where to be seated.', 'type' => 'Attraction Specific'],
            ['name' => 'Guests welcomed in a friendly manner', 'type' => 'Guest Service'],
            ['name' => 'Guests interacted with and entertained throughout the ride cycle - music is playing(attraction sound effects and jingles), microphone is used (where applicable)', 'type' => 'Guest Service'],
            ['name' => 'Guest complaints/requests/queries are handled in a professional friendly manner', 'type' => 'Guest Service'],
            ['name' => 'Guests sent off in a pleasant manner', 'type' => 'Guest Service'],


        ];

        DB::table('general_questions')->insert($questions);
    }
}
 
