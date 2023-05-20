<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rutes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('angkot_id');
            $table->foreign('angkot_id')->references('id')->on('angkots');
            $table->unsignedBigInteger('street_name_id');
            $table->foreign('street_name_id')->references('id')->on('street_names');
            $table->integer('urutan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rutes');
    }
};
