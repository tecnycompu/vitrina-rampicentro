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
        Schema::create('categoria_locals', function (Blueprint $table) {
            $table->id();
            $table->string('nombreCategoria');
            $table->text('descripcion')->nullable();
            $table->string('imagen')->nullable();  // Ruta de la imagen
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categoria_locals');
    }
};
