<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'name' => 'faculty',
            ],
            [
                'name' => 'student',
            ],
            [
                'name' => 'organization',
            ],
            [
                'name' => 'admin',
            ],
            [
                'name' => 'developer',
            ]
        ]);
    }
}
