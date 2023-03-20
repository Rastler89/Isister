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
        Schema::create('disease_specie', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('disease_id');
            $table->unsignedBigInteger('specie_id');
            $table->timestamps();

            $table->foreign('disease_id')->references('id')->on('diseases');
            $table->foreign('specie_id')->references('id')->on('species');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disease_specie');
    }
};
