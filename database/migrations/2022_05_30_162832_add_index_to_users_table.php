<?php

use Illuminate\Database\Migrations\Migration;

class AddIndexToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement(
            'ALTER TABLE users ADD FULLTEXT fulltext_index(name, email, truename)'
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement(
            'ALTER TABLE users DROP INDEX fulltext_index'
        );
    }
}
