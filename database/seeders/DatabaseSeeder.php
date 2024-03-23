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
        User::factory()->count(5)->create();
    }
}
