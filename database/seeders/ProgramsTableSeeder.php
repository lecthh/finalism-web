<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Disable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        // Truncate the programs table
        DB::table('programs')->truncate();

        $programs = [
            ['progid' => 1001, 'progfullname' => 'Bachelor of Science in Accountancy', 'progshortname' => 'BSA', 'progcollid' => 1, 'progcolldeptid' => 1001],
            ['progid' => 1002, 'progfullname' => 'Bachelor of Science in Management Accounting', 'progshortname' => 'BSMA', 'progcollid' => 1, 'progcolldeptid' => 1001],
            ['progid' => 1003, 'progfullname' => 'Bachelor of Science in Business Administration Major in Operation Management', 'progshortname' => 'BSBA-OM', 'progcollid' => 1, 'progcolldeptid' => 1003],
            ['progid' => 1004, 'progfullname' => 'Bachelor of Science in Business Administration Major in Human Resource Development Management', 'progshortname' => 'BSBA-HRDM', 'progcollid' => 1, 'progcolldeptid' => 1003],
            ['progid' => 1005, 'progfullname' => 'Bachelor of Science in Business Administration Major in Marketing Management', 'progshortname' => 'BSBA-MM', 'progcollid' => 1, 'progcolldeptid' => 1003],
            ['progid' => 1006, 'progfullname' => 'Bachelor of Science in Business Administration Major in Financial Management', 'progshortname' => 'BSBA-FM', 'progcollid' => 1, 'progcolldeptid' => 1001],
            ['progid' => 1007, 'progfullname' => 'Bachelor of Science in Entrepreneurship', 'progshortname' => 'BS-Entrepreneurship', 'progcollid' => 1, 'progcolldeptid' => 1002],
            ['progid' => 1008, 'progfullname' => 'Bachelor of Science in Hospitality Management', 'progshortname' => 'BSHM', 'progcollid' => 1, 'progcolldeptid' => 1004],
            ['progid' => 1009, 'progfullname' => 'Bachelor of Science in Hospitality Management Major in Food and Beverage', 'progshortname' => 'BSHM-FB', 'progcollid' => 1, 'progcolldeptid' => 1004],
            ['progid' => 1010, 'progfullname' => 'Associate in Hospitality Management', 'progshortname' => 'AHM', 'progcollid' => 1, 'progcolldeptid' => 1004],
            ['progid' => 1011, 'progfullname' => 'Associate in Tourism', 'progshortname' => 'ATourism', 'progcollid' => 1, 'progcolldeptid' => 1004],
            ['progid' => 1012, 'progfullname' => 'Bachelor of Arts in Communication', 'progshortname' => 'ABComm', 'progcollid' => 2, 'progcolldeptid' => 2001],
            ['progid' => 1013, 'progfullname' => 'Bachelor of Arts in English Language Studies', 'progshortname' => 'ABELS', 'progcollid' => 2, 'progcolldeptid' => 2001],
            ['progid' => 1014, 'progfullname' => 'Bachelor of Arts in Journalism', 'progshortname' => 'ABJournalism', 'progcollid' => 2, 'progcolldeptid' => 2001],
            ['progid' => 1015, 'progfullname' => 'Bachelor of Arts in Marketing Communication', 'progshortname' => 'ABMarComm', 'progcollid' => 2, 'progcolldeptid' => 2001],
            ['progid' => 1016, 'progfullname' => 'Bachelor of Science in Biology Major in Medical Biology', 'progshortname' => 'BSBio-MB', 'progcollid' => 2, 'progcolldeptid' => 2002],
            ['progid' => 1017, 'progfullname' => 'Bachelor of Science in Biology Major in Microbiology', 'progshortname' => 'BSBio-Microbio', 'progcollid' => 2, 'progcolldeptid' => 2002],
            ['progid' => 1018, 'progfullname' => 'Bachelor of Arts in Political Science', 'progshortname' => 'ABPolSci', 'progcollid' => 2, 'progcolldeptid' => 2003],
            ['progid' => 1019, 'progfullname' => 'Bachelor of Arts in International Studies', 'progshortname' => 'ABIS', 'progcollid' => 2, 'progcolldeptid' => 2003],
            ['progid' => 1020, 'progfullname' => 'Bachelor of Arts in Philosophy', 'progshortname' => 'ABPhilo', 'progcollid' => 2, 'progcolldeptid' => 2003],
            ['progid' => 1021, 'progfullname' => 'Bachelor of Science in Psychology', 'progshortname' => 'BSPsych', 'progcollid' => 2, 'progcolldeptid' => 2004],
            ['progid' => 1022, 'progfullname' => 'Bachelor of Science in Civil Engineering', 'progshortname' => 'BSCE', 'progcollid' => 3, 'progcolldeptid' => 3001],
            ['progid' => 1023, 'progfullname' => 'Bachelor of Science in Computer Engineering', 'progshortname' => 'BSCpE', 'progcollid' => 3, 'progcolldeptid' => 3002],
            ['progid' => 1024, 'progfullname' => 'Bachelor of Science in Electronics and Communications Engineering', 'progshortname' => 'BSECE', 'progcollid' => 3, 'progcolldeptid' => 3003],
            ['progid' => 1025, 'progfullname' => 'Bachelor of Science in Electrical Engineering', 'progshortname' => 'BSEE', 'progcollid' => 3, 'progcolldeptid' => 3004],
            ['progid' => 1026, 'progfullname' => 'Bachelor of Science in Industrial Engineering', 'progshortname' => 'BSIE', 'progcollid' => 3, 'progcolldeptid' => 3005],
            ['progid' => 1027, 'progfullname' => 'Bachelor of Science in Mechanical Engineering', 'progshortname' => 'BSME', 'progcollid' => 3, 'progcolldeptid' => 3006],
            ['progid' => 1028, 'progfullname' => 'Bachelor of Elementary Education', 'progshortname' => 'BEEEd', 'progcollid' => 4, 'progcolldeptid' => 4001],
            ['progid' => 1029, 'progfullname' => 'Bachelor of Early Childhood Education', 'progshortname' => 'BECE', 'progcollid' => 4, 'progcolldeptid' => 4001],
            ['progid' => 1030, 'progfullname' => 'Bachelor of Physical Education', 'progshortname' => 'BPE', 'progcollid' => 4, 'progcolldeptid' => 4002],
            ['progid' => 1031, 'progfullname' => 'Bachelor of Secondary Education Major in English', 'progshortname' => 'BSEd-English', 'progcollid' => 4, 'progcolldeptid' => 4001],
            ['progid' => 1032, 'progfullname' => 'Bachelor of Secondary Education Major in Filipino', 'progshortname' => 'BSEd-Filipino', 'progcollid' => 4, 'progcolldeptid' => 4001],
            ['progid' => 1033, 'progfullname' => 'Bachelor of Secondary Education Major in Mathematics', 'progshortname' => 'BSEd-Mathematics', 'progcollid' => 4, 'progcolldeptid' => 4001],
            ['progid' => 1034, 'progfullname' => 'Bachelor of Secondary Education Major in Science', 'progshortname' => 'BSEd-Science', 'progcollid' => 4, 'progcolldeptid' => 4001],
            ['progid' => 1035, 'progfullname' => 'Bachelor of Special Needs Education - Generalist', 'progshortname' => 'BSNE-General', 'progcollid' => 4, 'progcolldeptid' => 4003],
            ['progid' => 1036, 'progfullname' => 'Bachelor of Special Needs Education Major in Early Childhood Education', 'progshortname' => 'BSNE-ECE', 'progcollid' => 4, 'progcolldeptid' => 4003],
            ['progid' => 1037, 'progfullname' => 'Bachelor of Special Needs Education Major in Elementary School Teaching', 'progshortname' => 'BSNE-EST', 'progcollid' => 4, 'progcolldeptid' => 4003],
            ['progid' => 1038, 'progfullname' => 'Bachelor of Science in Computer Science', 'progshortname' => 'BSCS', 'progcollid' => 5, 'progcolldeptid' => 5001],
            ['progid' => 1039, 'progfullname' => 'Bachelor of Science in Information Technology', 'progshortname' => 'BSIT', 'progcollid' => 5, 'progcolldeptid' => 5001],
            ['progid' => 1040, 'progfullname' => 'Bachelor of Science in Information Systems', 'progshortname' => 'BSIS', 'progcollid' => 5, 'progcolldeptid' => 5001],
            ['progid' => 1041, 'progfullname' => 'Bachelor of Science in Entertainment and Multimedia Computing', 'progshortname' => 'BSEMC', 'progcollid' => 5, 'progcolldeptid' => 5001],
            ['progid' => 1042, 'progfullname' => 'Bachelof of Science in Nursing', 'progshortname' => 'BSN', 'progcollid' => 6, 'progcolldeptid' => 6001],

        ];

        foreach ($programs as $program) {
            DB::table('programs')->updateOrInsert(['progid' => $program['progid']], $program);
        }
        
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
//php artisan db:seed --class=ProgramsTableSeeder
