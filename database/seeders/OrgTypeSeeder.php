<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class OrgTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('org_types')->insert([
            [
                'name' => 'Special Interest',
            ],
            [
                'name' => 'Academic',
            ],
            [
                'name' => 'Regional/Provincial',
            ],
            [
                'name' => 'Academic/Political',
            ],
        ]);
    }
}
