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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('marca');
            $table->text('descricao')->nullable();
            $table->enum('unidade_medida', ['UN', 'T', 'KG', 'G', 'L', 'ML', 'M', 'CM']);
            $table->enum('categoria', ['Eletrônicos', 'Alimentos', 'Vestuário', 'Geral']);
            $table->float('quantidade')->default(0);
            $table->decimal('preco', 8, 2)->default(0.00);
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
