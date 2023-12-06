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
        Schema::create('estudiante_detalles', function (Blueprint $table) {
            $table->id();
            $table->integer('praMod1');
            $table->integer('praMod2');
            $table->integer('praMod3');
            $table->integer('udMod1');
            $table->integer('udMod2');
            $table->integer('udMod3');
            $table->integer('certIdi');
            $table->integer('modTit');
            $table->date('fecDet');
            $table->string('estDet');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiante_detalles');
    }
};
