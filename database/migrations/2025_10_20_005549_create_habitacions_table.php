<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('habitaciones', function (Blueprint $table) {
            $table->id();
            $table->string('numero')->unique();
            $table->string('tipo'); // Ej: sencilla, doble, suite
            $table->decimal('precio_noche', 10, 2);
            $table->enum('estado', ['libre', 'ocupada', 'mantenimiento'])->default('libre');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('habitaciones');
    }
};
