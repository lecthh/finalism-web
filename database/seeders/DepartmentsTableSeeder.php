<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        // Truncate the colleges table
        DB::table('departments')->truncate();

        // Enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $departments = [
            ['deptid' => 1001, 'deptfullname' => 'Accountancy and Finance Department', 'deptshortname' => null, 'deptcollid' => 1],
            ['deptid' => 1002, 'deptfullname' => 'Business and Entrepreneurship Department', 'deptshortname' => null, 'deptcollid' => 1],
            ['deptid' => 1003, 'deptfullname' => 'Marketing and Human Resource Management Department', 'deptshortname' => null, 'deptcollid' => 1],
            ['deptid' => 1004, 'deptfullname' => 'Tourism and Hospitality Management Department', 'deptshortname' => 'THMD', 'deptcollid' => 1],
            ['deptid' => 2001, 'deptfullname' => 'Department of Communications, Language and Literature', 'deptshortname' => 'DLL', 'deptcollid' => 2],
            ['deptid' => 2002, 'deptfullname' => 'Department of Mathematics and Sciences', 'deptshortname' => 'DMS', 'deptcollid' => 2],
            ['deptid' => 2003, 'deptfullname' => 'Department of Social Sciences and Philosophy', 'deptshortname' => 'DSSP', 'deptcollid' => 2],
            ['deptid' => 2004, 'deptfullname' => 'Department of Psychology and Library Information Science', 'deptshortname' => 'DPLIS', 'deptcollid' => 2],
            ['deptid' => 3001, 'deptfullname' => 'Department of Civil Engineering', 'deptshortname' => null, 'deptcollid' => 3],
            ['deptid' => 3002, 'deptfullname' => 'Department of Computer Engineering', 'deptshortname' => null, 'deptcollid' => 3],
            ['deptid' => 3003, 'deptfullname' => 'Department of Electronics and Communications Engineering', 'deptshortname' => null, 'deptcollid' => 3],
            ['deptid' => 3004, 'deptfullname' => 'Department of Electrical Engineering', 'deptshortname' => null, 'deptcollid' => 3],
            ['deptid' => 3005, 'deptfullname' => 'Department of Industrial Engineering', 'deptshortname' => null, 'deptcollid' => 3],
            ['deptid' => 3006, 'deptfullname' => 'Department of Mechanical Engineering', 'deptshortname' => null, 'deptcollid' => 3],
            ['deptid' => 4001, 'deptfullname' => 'Department of Teacher Education', 'deptshortname' => null, 'deptcollid' => 4],
            ['deptid' => 4002, 'deptfullname' => 'Department of Physical Education', 'deptshortname' => null, 'deptcollid' => 4],
            ['deptid' => 4003, 'deptfullname' => 'Department of Special Education', 'deptshortname' => null, 'deptcollid' => 4],
            ['deptid' => 5001, 'deptfullname' => 'CS/IT Department', 'deptshortname' => null, 'deptcollid' => 5],
            ['deptid' => 6001, 'deptfullname' => 'Department of Nursing', 'deptshortname' => null, 'deptcollid' => 6],
        ];

        foreach ($departments as $department) {
            DB::table('departments')->updateOrInsert(['deptid' => $department['deptid']], $department);
        }
    }
}
//php artisan db:seed --class=DepartmentsTableSeeder
