<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumsToPaypalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('pwp_paypals', 'money')) {
            Schema::table('pwp_paypals', function (Blueprint $table) {
                $table->decimal('money', 10, 0)->after('amount');
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
        if (Schema::hasColumn('pwp_paypals', 'money')) {
            Schema::table('pwp_paypals', function (Blueprint $table) {
                $table->dropColumn('money');
            });
        }
    }
}
