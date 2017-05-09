<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('wines');
        Schema::create('wines', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('region')->nullable();
            $table->string('producer')->nullable();
            $table->string('appelation')->nullable();
            $table->string('millesime')->nullable();
            $table->string('description')->nullable();
            $table->enum('color', ['blanc', 'rouge','rosé']);
            $table->string('image')->nullable();
            $table->string('grape');

 
            $table->string('eye')->nullable();
            $table->string('nose')->nullable();
            $table->string('taste')->nullable();
            $table->string('pairing')->nullable();
            $table->string('review')->nullable();

            $table->string('soil')->nullable();
            $table->string('aged')->nullable();

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
        Schema::dropIfExists('wines');
    }
}
