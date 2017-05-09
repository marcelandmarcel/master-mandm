<?php

use Illuminate\Database\Migrations\Migration;

class AddSocialUserFields extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function ($table) {
            $table->string('facebook_id')->nullable()->after('email');
            $table->string('google_id')->unique()->nullable()->after('facebook_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('users', function ($table) {
            $table->dropColumn('facebook_id');
            $table->dropColumn('google_id');
        });
    }
}