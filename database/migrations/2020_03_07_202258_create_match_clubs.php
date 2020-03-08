<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchClubs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match_clubs', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('club_name_home_id');
            $table->bigInteger('club_name_away_id');
            $table->Integer('score_home');
            $table->Integer('score_away');
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
        Schema::dropIfExists('match_clubs');
    }
}
