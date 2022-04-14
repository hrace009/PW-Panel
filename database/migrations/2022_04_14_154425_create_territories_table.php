<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTerritoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pwp_territories', static function (Blueprint $table) {
            $table->increments('id');
            $table->integer('level');
            $table->integer('owner');
            $table->string('owner_name');
            $table->integer('occupy_time');
            $table->integer('challenger');
            $table->string('challenger_name');
            $table->integer('deposit');
            $table->integer('cutoff_time');
            $table->integer('battle_time');
            $table->integer('bonus_time');
            $table->integer('color');
            $table->integer('status');
            $table->integer('timeout');
            $table->integer('max_bonus');
            $table->integer('challenge_time');
            $table->text('challenger_details');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('pwp_territories');
    }
}
