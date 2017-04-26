<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
<<<<<<< HEAD
            //
            $table->integer('phone')->after('birth');
            $table->string('address')->after('phone');
            $table->string('city')->after('address');
            $table->string('state')->after('city');
            $table->integer('ZIP')->after('state');

=======
            $table->integer('phone')->nullable()->after('birth');
            $table->string('address')->nullable()->after('phone');
            $table->string('city')->nullable()->after('address');
            $table->string('state')->nullable()->after('city');
            $table->integer('zip')->nullable()->after('state');
>>>>>>> master
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
            Schema::dropIfExists('users');
        });
    }
}
