<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->student()->create();
        User::factory(10)->faculty()->create();
        User::factory(10)->organization()->create();
        User::factory(10)->admin()->create();
        User::factory(10)->developer()->create();
    }
}
