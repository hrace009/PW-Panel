<?php
/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://www.hrace009.com
 * @copyright Copyright (c) 2022.
 */


/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://www.hrace009.com
 * @copyright Copyright (c) 2022.
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn('users', 'money')) {
            DB::statement('ALTER TABLE users MODIFY COLUMN money decimal(10, 0) NOT NULL DEFAULT 0');
        }

        if (!Schema::hasColumn('users', 'money')) {
            Schema::table('users', function (Blueprint $table) {
                $table->decimal('money', 10, 0);
            });
        }

        if (Schema::hasColumn('users', 'bonuses')) {
            DB::statement('ALTER TABLE users MODIFY COLUMN bonuses decimal(10, 0) NOT NULL DEFAULT 0');
        }

        if (!Schema::hasColumn('users', 'bonuses')) {
            Schema::table('users', function (Blueprint $table) {
                $table->decimal('bonuses', 10, 0);
            });
        }

        if (Schema::hasColumn('users', 'role')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('role');
            });
        }

        if (Schema::hasColumn('users', 'language')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('language');
            });
        }

        if (Schema::hasColumn('users', 'remember_token')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('remember_token');
            });
        }

        if (Schema::hasColumn('users', 'created_at')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('created_at');
            });
        }

        if (Schema::hasColumn('users', 'updated_at')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('updated_at');
            });
        }

        if (Schema::hasTable('mw_auth')) {
            Schema::table('mw_auth', function (Blueprint $table) {
                $table->drop('mw_auth');
            });
        }

        if (Schema::hasTable('mw_bankdonate')) {
            Schema::table('mw_bankdonate', function (Blueprint $table) {
                $table->drop('mw_bankdonate');
            });
        }

        if (Schema::hasTable('mw_guilds')) {
            Schema::table('mw_guilds', function (Blueprint $table) {
                $table->drop('mw_guilds');
            });
        }

        if (Schema::hasTable('mw_payments')) {
            Schema::table('mw_payments', function (Blueprint $table) {
                $table->drop('mw_payments');
            });
        }

        if (Schema::hasTable('mw_roles')) {
            Schema::table('mw_roles', function (Blueprint $table) {
                $table->drop('mw_roles');
            });
        }

        if (Schema::hasTable('mw_territories')) {
            Schema::table('mw_territories', function (Blueprint $table) {
                $table->drop('mw_territories');
            });
        }

        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'role')) {
                $table->enum('role', ['administrator', 'gamemaster', 'player'])->default('player');
            }

            if (!Schema::hasColumn('users', 'language')) {
                $table->string('language')->default(config('app.locale'));
            }

            if (!Schema::hasColumn('users', 'profile_photo_path')) {
                $table->string('profile_photo_path', 2048)->nullable();
            }

            if (!Schema::hasColumn('users', 'two_factor_secret')) {
                $table->text('two_factor_secret')->nullable();
            }

            if (!Schema::hasColumn('users', 'two_factor_secret')) {
                $table->text('two_factor_recovery_codes')->nullable();
            }
            $table->rememberToken();
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
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
