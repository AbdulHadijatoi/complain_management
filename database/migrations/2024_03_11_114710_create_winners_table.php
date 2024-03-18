<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWinnersTable extends Migration
{
    public function up()
    {
        Schema::create('winners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contest_id')->constrained()->onDelete('cascade');
            $table->foreignId('participant_id')->constrained()->onDelete('cascade');
            $table->boolean('is_winner')->default(0);
            $table->boolean('is_runner_up')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('winners');
    }
}