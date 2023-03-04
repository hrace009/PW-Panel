<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumsToShopLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('pwp_shop_logs', 'poin')) {
            Schema::table('pwp_shop_logs', function (Blueprint $table) {
                $table->decimal('poin', 10, 0)->default('0')->after('price');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('pwp_shop_logs', 'poin')) {
            Schema::table('pwp_shop_logs', function (Blueprint $table) {
                $table->dropColumn('poin');
            });
        }
    }
}
