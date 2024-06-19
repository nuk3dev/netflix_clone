<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('seizoen', function (Blueprint $table) {
            $table->bigIncrements('seizoen_id');
            $table->integer('serie_id');
            $table->integer('rang')->nullable();
            $table->integer('jaar')->nullable();
            $table->integer('IMDBRating')->nullable();
            $table->integer('deleted')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('seizoen');
    }
};
