<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContestDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('contest_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contest_id')->constrained()->onDelete('cascade');
            $table->integer('total_winners');
            $table->integer('total_runner_ups');
            $table->integer('participants_limit');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->decimal('entry_fee', 8, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contest_details');
    }
}