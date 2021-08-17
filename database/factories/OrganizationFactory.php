<?php

namespace Database\Factories;

use App\Models\Organization;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrganizationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Organization::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company(),
            'org_code' => $this->faker->unique()->lexify('?????'),
            'short_name' => $this->faker->lexify('????'),
            'description' => $this->faker->realText(100),
            'address' => 'UP Diliman',
            'date_established' => $this->faker->dateTime(),
            'is_sec_registered' => (bool) rand(0, 1),
            'comments' => $this->faker->realText(100),
            'org_type_id' => rand(1, 4),
        ];
    }
}
