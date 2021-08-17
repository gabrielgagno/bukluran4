<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolesTableSeeder::class,
            OrgTypeSeeder::class,
            CollegeSeeder::class,
            
            // unregistered users
            StudentSeeder::class,
            OrganizationSeeder::class,
            FacultySeeder::class,

            //registered users
            UsersTableSeeder::class,
        ]);
    }
}
