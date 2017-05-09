<?php

use Illuminate\Database\Migrations\Migration;

class AddMarketUserFields extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function ($table) {
            $table->integer('market_id')->unsigned()->index()->nullable()->after('email');

            $table->foreign('market_id')->references('id')->on('markets')->onDelete('cascade');
          });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('users', function ($table) {
            $table->dropColumn('market_id');
        });
    }
}