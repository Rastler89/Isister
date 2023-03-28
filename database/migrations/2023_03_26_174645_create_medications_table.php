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
        Schema::create('medications', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->unsignedBigInteger('diagnostic_id');
            $table->datetime('init');
            $table->datetime('finish');
            $table->integer('periodicity');
            $table->string('periodicity_type',1);
            $table->timestamps();

            $table->foreign('diagnostic_id')->references('id')->on('diagnostics')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medications');
    }
};
