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
        //criando a tabela filiais
        Schema::create('filiais', function(Blueprint $table){
            $table->id();
            $table->string('filial', 30);
            $table->timestamps();
        });
        //criando a tabela produto_filiais
        Schema::create('produto_filiais', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('filial_id');
            $table->unsignedBigInteger('produto_id');
            $table->decimal('preco_venda', 8, 2);
            $table->integer('estoque_minimo');
            $table->integer('estoque_maximo');
            $table->timestamps();

            //adicionar as constraints
            $table->foreign('filial_id')->references('id')->on('filiais');
            $table->foreign('produto_id')->references('id')->on('produtos');
        });
        //modificando as tabelas de produtos para que seja colocado na tabela produto_filiais
        Schema::table('produtos', function(Blueprint $table){
            $table->dropColumn(['preco_venda', 'estoque_minimo', 'estoque_maximo']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //adicionando as colunas da tabela produtos
        Schema::table('produtos', function(Blueprint $table){
            $table->integer('estoque_minimo');
            $table->integer('estoque_maximo');
            $table->decimal('preco_venda', 8, 2);
        });
        //excluir a tabela de relacionamento produto_filiais
        Schema::dropIfExists('produto_filiais');
        //excluir de fato a tabela filiais
        Schema::dropIfExists('filiais');
    }
};
