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
        
        Schema::create('marcas', function (Blueprint $table) {

            $table->id();
            $table->string('nome');
            $table->timestamps();

        });

        Schema::create('categorias', function (Blueprint $table) {

            $table->id();
            $table->string('nome');
            $table->timestamps();

        });

        Schema::create('unidades', function (Blueprint $table) {

            $table->id();
            $table->string('nome');
            $table->string('sigla');
            $table->timestamps();
        });

        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->unsignedBigInteger('marca');
            $table->text('descricao')->nullable();
            $table->unsignedBigInteger('unidade_medida');
            $table->unsignedBigInteger('categoria');
            $table->float('quantidade')->default(0);
            $table->decimal('preco_custo', 8, 2)->default(0.00);
            $table->decimal('preco_venda', 8, 2)->default(0.00);
            $table->timestamps();
            $table->foreign('marca')->references('id')->on('marcas');
            $table->foreign('unidade_medida')->references('id')->on('unidades');
            $table->foreign('categoria')->references('id')->on('categorias');
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
        Schema::dropIfExists('marcas');
        Schema::dropIfExists('unidades');
        Schema::dropIfExists('categorias');
    }
};
