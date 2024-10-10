<?php

namespace Database\Factories;

use App\Models\VaccineCenter;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VaccineCenter>
 */
class VaccineCenterFactory extends Factory
{
    protected $model = VaccineCenter::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $hospitalNames = [
            'City Hospital',
            '250 Bed',
            'Dhaka Medical College Hospital',
            'Sunrise Community Clinic',
            'Fatema Clinic',
            'Northwest Medical Plaza',
            'Central Health Clinic',
            'Shekorh Prosuti Sheba',
            'Islami Bank Hospital',
            'Doctors Point'
        ];

        return [
            'name' => $this->faker->unique()->randomElement($hospitalNames),
            'location' => $this->faker->address,
            'limit_per_day' => rand(1, 10)
        ];
    }
}
