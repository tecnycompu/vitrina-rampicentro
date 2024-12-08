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
        Schema::create('producto_categorias', function (Blueprint $table) {
            $table->foreignId('producto_id')->constrained('productos')->onDelete('cascade');
            $table->foreignId('categoria_local_id')->constrained('categoria_locals')->onDelete('cascade');
            $table->primary(['producto_id', 'categoria_local_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producto_categorias');
    }
};
