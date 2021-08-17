<?php

namespace Database\Factories;

use App\Models\Faculty;
use App\Models\Organization;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'username' => $this->faker->userName(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    public function faculty()
    {
        return $this->state(function (array $attributes) {
            return [
                'role_id' => 1,
                'userable_id' => Faculty::factory(),
                'userable_type' => Faculty::class,
            ];
        });
    }

    public function student()
    {
        return $this->state(function (array $attributes) {
            return [
                'role_id' => 2,
                'userable_id' => Student::factory(),
                'userable_type' => Student::class,
            ];
        });
    }

    public function organization()
    {
        return $this->state(function (array $attributes) {
            return [
                'role_id' => 3,
                'userable_id' => Organization::factory(),
                'userable_type' => Organization::class,
            ];
        });
    }

    public function admin()
    {
        return $this->state(function (array $attributes) {
            return [
                'role_id' => 4,
            ];
        });
    }

    public function developer()
    {
        return $this->state(function (array $attributes) {
            return [
                'role_id' => 5,
            ];
        });
    }
}
