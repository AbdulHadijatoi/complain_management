<?php

namespace Database\Factories;

use App\Models\Contest;
use App\Models\ContestDetails;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContestDetailsFactory extends Factory
{
    protected $model = ContestDetails::class;

    public function definition()
    {
        return [
            'contest_id' => Contest::factory(),
            'total_winners' => $this->faker->numberBetween(1, 10),
            'total_runner_ups' => $this->faker->numberBetween(1, 10),
            'participants_limit' => $this->faker->numberBetween(10, 100),
            'start_date' => $this->faker->dateTimeBetween('+1 week', '+1 month'),
            'end_date' => $this->faker->dateTimeBetween('+2 months', '+3 months'),
            'entry_fee' => $this->faker->randomFloat(2, 10, 100),
        ];
    }
}
