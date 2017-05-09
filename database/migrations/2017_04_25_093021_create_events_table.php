<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');

            // defulat creator is the Admin (1)
            $table->integer('creator_id')->unsigned()->index()->nullable()->default(1);
            $table->integer('market_id')->unsigned()->index()->nullable()->default(1);
            $table->string('name');            
            $table->string('description')->nullable();
            $table->string('location');
            $table->string('image')->nullable();
            $table->enum('type', ['open', 'private'])->default('open');
            $table->dateTime('start_at');
            $table->dateTime('end_at')->nullable();
            $table->timestamps();

            $table->foreign('creator_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('market_id')->references('id')->on('markets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
