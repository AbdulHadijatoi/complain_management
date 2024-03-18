<?php
// database/factories/SettingFactory.php

namespace Database\Factories;

use App\Models\Setting;
use Illuminate\Database\Eloquent\Factories\Factory;

class SettingFactory extends Factory
{
    protected $model = Setting::class;

    public function definition()
    {
        return [
            'key' => $this->faker->unique()->word,
            'value' => $this->faker->sentence,
        ];
    }
}
