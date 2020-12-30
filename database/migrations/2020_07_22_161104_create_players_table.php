<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('club_id');
            $table->unsignedBigInteger('playermodel_id');
            $table->unsignedInteger('jersey');
            $table->timestamps();
            $table->foreign('club_id')
                ->references('id')->on('clubs')
                ->onDelete('cascade');
            // $table->foreign('playermodel_id')
            //     ->references('id')->on('playermodels')
            //     ->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('players');
    }
}
