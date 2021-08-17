<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->student()->create();
        \App\Models\User::factory(10)->faculty()->create();
        \App\Models\User::factory(10)->organization()->create();
        \App\Models\User::factory(10)->admin()->create();
        \App\Models\User::factory(10)->developer()->create();
    }
}
