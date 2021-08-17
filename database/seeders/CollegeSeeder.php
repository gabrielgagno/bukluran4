<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CollegeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('colleges')->insert([
            [
                'name' => 'College of Fine Arts',
                'short_name' => 'CFA'
            ],
            [
                'name' => 'College of Engineering',
                'short_name' => 'CoE'
            ],
            [
                'name' => 'Virata School of Business (College of Business Administration)',
                'short_name' => 'VSB/CBA'
            ],
            [
                'name' => 'College of Education',
                'short_name' => 'Educ'
            ],
            [
                'name' => 'College of Music',
                'short_name' => 'CMu'
            ],
            [
                'name' => 'National College of Public Administration and Governance',
                'short_name' => 'NCPAG'
            ],
            [
                'name' => 'School of Statistics',
                'short_name' => 'Stat'
            ],
            [
                'name' => 'UPD Extension Program in Pampanga',
                'short_name' => 'UPDEPP'
            ],
            [
                'name' => 'School of Labor and Industrial Relations',
                'short_name' => 'SOLAIR'
            ],
            [
                'name' => 'Asian Center',
                'short_name' => 'AC'
            ],
            [
                'name' => 'College of Architecture',
                'short_name' => 'CA'
            ],
            [
                'name' => 'College of Home Economics',
                'short_name' => 'CHE'
            ],
            [
                'name' => 'College of Social Work and Community Development',
                'short_name' => 'CSWCD'
            ],
            [
                'name' => 'School of Library and Information Studies',
                'short_name' => 'SLIS'
            ],
            [
                'name' => 'College of Mass Communication',
                'short_name' => 'CMC'
            ],
            [
                'name' => 'School of Economics',
                'short_name' => 'Econ'
            ],
            [
                'name' => 'School of Urban and Regional Planning',
                'short_name' => 'SURP'
            ],
            [
                'name' => 'Institute of Islamic Studies',
                'short_name' => 'IIS'
            ],
            [
                'name' => 'Asian Institute of Tourism',
                'short_name' => 'AIT'
            ],
            [
                'name' => 'College of Human Kinetics',
                'short_name' => 'CHK'
            ],
            [
                'name' => 'College of Arts and Letters',
                'short_name' => 'CAL'
            ],
            [
                'name' => 'College of Science',
                'short_name' => 'CS'
            ],
            [
                'name' => 'College of Social Sciences and Philosophy',
                'short_name' => 'CSSP'
            ],
            [
                'name' => 'Technological Management Center',
                'short_name' => 'TMC'
            ],
            [
                'name' => 'Archaeological Studies Program',
                'short_name' => 'ASP'
            ],
        ]);
    }
}
