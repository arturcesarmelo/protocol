<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->dateTime('delivered_at')->nullable();
            $table->dateTime('confirmed_at')->nullable();
            $table->dateTime('resitent_id')->nullable();
            $table->dateTime('receiver_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->dropColumn('delivered_at');
            $table->dropColumn('confirmed_at');
            $table->dropColumn('resitent_id');
            $table->dropColumn('receiver_id');
        });
    }
};
