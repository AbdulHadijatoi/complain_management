<?php

// database/factories/PaymentFactory.php

namespace Database\Factories;

use App\Models\Contest;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    protected $model = Payment::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'contest_id' => Contest::factory(),
            'amount' => $this->faker->randomFloat(2, 10, 100),
            'payment_type' => $this->faker->randomElement(['credit_card', 'paypal', 'bank_transfer']),
            'payment_status' => $this->faker->randomElement(['pending', 'completed', 'failed']),
            'description' => $this->faker->sentence,
        ];
    }
}

