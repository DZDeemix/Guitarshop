<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVotesToSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->integer('paginatoin_admin_product')->default(6);
            $table->integer('paginatoin_site_product')->default(6);
            $table->integer('paginatoin_site_onMain_products')->default(6);
            $table->string('email_password');
            $table->string('email_send1');
            $table->string('email_send2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            //
        });
    }
}
