<?php

namespace Database\Factories;

use App\Models\FakeNidRecord;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FakeNidRecord>
 */
class FakeNidRecordFactory extends Factory
{
    protected $model = FakeNidRecord::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'nid' => $this->faker->unique()->numerify('###########'),
            'date_of_birth' => $this->faker->date()
        ];
    }
}
