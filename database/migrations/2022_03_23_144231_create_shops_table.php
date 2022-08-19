<?php
/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://www.hrace009.com
 * @copyright Copyright (c) 2022.
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pwp_shops', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('image');
            $table->string('icon');
            $table->text('description');
            $table->integer('price');
            $table->integer('discount');
            $table->integer('item_id');
            $table->text('octet');
            $table->integer('mask');
            $table->integer('count');
            $table->integer('max_count');
            $table->integer('protection_type');
            $table->integer('expire_date');
            $table->integer('times_bought');
            $table->tinyInteger('custom_quantity');
            $table->tinyInteger('shareable');
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
        Schema::dropIfExists('pwp_shops');
    }
}
