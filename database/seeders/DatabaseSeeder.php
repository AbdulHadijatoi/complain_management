<?php


use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Contest;
use App\Models\ContestDetails;
use App\Models\Participant;
use App\Models\Winner;
use App\Models\Payment;
use App\Models\Setting;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::factory()->count(20)->create();
        Contest::factory()->count(20)->create();
        ContestDetails::factory()->count(20)->create();
        Participant::factory()->count(20)->create();
        Winner::factory()->count(20)->create();
        Payment::factory()->count(20)->create();
        Setting::factory()->count(10)->create();
    }
}
