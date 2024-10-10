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
        $nids = [];
        for($i = '30000000001' ; $i<='30000000050'; $i++)
        {
            $nids[] = $i;
        }

        return [
            'name' => $this->faker->name(),
            'nid' => $this->faker->unique()->randomElement($nids),
            'date_of_birth' => $this->faker->date()
        ];
    }
}
