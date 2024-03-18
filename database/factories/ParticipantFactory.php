<?php

namespace Database\Factories;

use App\Models\Contest;
use App\Models\Participant;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ParticipantFactory extends Factory
{
    protected $model = Participant::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'contest_id' => Contest::factory(),
        ];
    }
}