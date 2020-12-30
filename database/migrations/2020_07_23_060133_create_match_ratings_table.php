<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchRatingsTable extends Migration
{

    public function up()
    {
        Schema::create('match_ratings', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('fixture_id');
            $table->unsignedInteger('club_id');
            $table->unsignedBigInteger('player_id');
            $table->unsignedInteger('rating')->nullable();
            $table->unsignedInteger('approved')->default(0);
            $table->timestamps();
            $table->foreign('player_id')
                ->references('id')->on('players')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ratings');
    }
}
