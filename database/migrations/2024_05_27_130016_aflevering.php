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
        Schema::create('aflevering', function (Blueprint $table) {
            $table->bigIncrements('aflevering_id');
            $table->integer('seizoen_id');
            $table->integer('rang')->nullable();
            $table->string('aflevering_titel');
            $table->string('video_name')->nullable();
            $table->integer('duur')->nullable();
            $table->integer('deleted')->default(0);
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aflevering');
    }
};
