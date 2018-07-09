<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1531080867UsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            
if (!Schema::hasColumn('users', 'lastname')) {
                $table->string('lastname');
                }
if (!Schema::hasColumn('users', 'brithdate')) {
                $table->date('brithdate')->nullable();
                }
if (!Schema::hasColumn('users', 'address')) {
                $table->string('address');
                }
if (!Schema::hasColumn('users', 'phone')) {
                $table->integer('phone')->nullable();
                }
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
            $table->dropColumn('lastname');
            $table->dropColumn('brithdate');
            $table->dropColumn('address');
            $table->dropColumn('phone');
            
        });

    }
}
