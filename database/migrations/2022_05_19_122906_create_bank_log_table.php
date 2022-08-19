<?php
/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://www.hrace009.com
 * @copyright Copyright (c) 2022.
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pwp_bank_log', static function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('banknum');
            $table->integer('gameID');
            $table->string('loginid');
            $table->string('email');
            $table->string('phone');
            $table->enum('type', ['none', 'inet', 'atm', 'cod'])->default('none');
            $table->enum('bankname', ['none', 'bankName1', 'bankName2', 'bankName3'])->default('none');
            $table->decimal('amount', 10, 0);
            $table->enum('status', ['pending', 'accept', 'reject'])->default('pending');
            $table->string('reason')->nullable();
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
        Schema::dropIfExists('pwp_bank_log');
    }
}
