<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContestsTable extends Migration
{
    public function up()
    {
        Schema::create('contests', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('winner_prize');
            $table->string('runner_up_prize');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contests');
    }
}