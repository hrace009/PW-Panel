<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIpaymuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pwp_ipaymu', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('trx_id')->nullable();
            $table->integer('user_id');
            $table->integer('amount');
            $table->decimal('money', 10, 0);
            $table->enum('status', ['pending', 'berhasil', 'expired'])->default('pending');
            $table->enum('status_code', ['0', '1', '2'])->default(0);
            $table->string('sid');
            $table->string('reference_id')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pwp_ipaymu');
    }
}
