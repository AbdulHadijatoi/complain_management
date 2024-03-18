<?php

namespace Database\Factories;

use App\Models\Contest;
use App\Models\Participant;
use App\Models\Winner;
use Illuminate\Database\Eloquent\Factories\Factory;

class WinnerFactory extends Factory
{
    protected $model = Winner::class;

    public function definition()
    {
        return [
            'contest_id' => Contest::factory(),
            'participant_id' => Participant::factory(),
            'is_winner' => $this->faker->boolean,
            'is_runner_up' => $this->faker->boolean,
        ];
    }
}
