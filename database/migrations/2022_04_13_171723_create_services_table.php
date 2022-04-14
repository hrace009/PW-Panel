<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pwp_services', static function (Blueprint $table) {
            $table->string('key');
            $table->string('icon');
            $table->enum('currency_type', ['virtual', 'gold'])->default('virtual');
            $table->integer('price');
            $table->tinyInteger('enabled');
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
        Schema::dropIfExists('pwp_services');
    }
}
