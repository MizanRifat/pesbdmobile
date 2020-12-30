<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFixturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fixtures', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('team1_id');
            $table->unsignedInteger('team2_id');
            $table->dateTime('date')->nullable();
            $table->unsignedBigInteger('tournament_id');
            $table->unsignedInteger('group_')->nullable();
            $table->unsignedInteger('round')->nullable();
            $table->unsignedInteger('leg')->nullable();
            $table->unsignedInteger('completed')->default(0);
            $table->timestamps();
            $table->foreign('tournament_id')
                ->references('id')->on('tournaments')
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
        Schema::dropIfExists('fixtures');
    }
}
