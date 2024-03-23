<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplaintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->string('post_no')->nullable();
            $table->string('post_address')->nullable();
            $table->string('type_of_fault')->nullable();
            $table->string('date_of_complaint')->nullable();
            $table->string('complainant_name')->nullable();
            $table->string('complaint_rut')->nullable();
            $table->string('phone')->nullable();
            $table->string('image')->nullable();
            $table->string('comuna')->nullable();
            $table->string('sector')->nullable();
            $table->string('population')->nullable();
            $table->string('status')->nullable();
            $table->unsignedBigInteger("contractor_id")->nullable();
            $table->foreign('contractor_id')->references('id')->on('contractors')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('complaints');
    }
}
