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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombreProducto');
            $table->text('descripcion');
            $table->decimal('precio', 10, 2);
            $table->boolean('esIntangible')->default(false);
            $table->unsignedInteger('stock')->nullable();
            $table->string('imagen')->nullable();
            $table->foreignId('categoria_local_id')->constrained('categoria_locals')->onDelete('cascade');
            $table->foreignId('usuario_id')->constrained('users')->onDelete('cascade'); // Verifica este campo
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
