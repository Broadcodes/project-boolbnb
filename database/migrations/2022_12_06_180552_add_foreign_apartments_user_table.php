<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignApartmentsUserTable extends Migration
{
    public function up()
    {
        Schema::table('apartments', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable(false)->after('id');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::table('apartments', function (Blueprint $table) {
            $table->dropForeign('apartments_user_id_foreign');
            $table->dropColumn('user_id');
        });
    }
}
