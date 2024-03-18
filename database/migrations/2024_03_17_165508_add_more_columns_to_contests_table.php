<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreColumnsToContestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contests', function (Blueprint $table) {
            $table->string("title")->nullable()->after("id");
            $table->text("description")->nullable()->after("name");
            $table->string("status")->nullable()->after("runner_up_prize");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contest', function (Blueprint $table) {
            $table->dropColumn(['name','description','status']);
        });
    }
}
