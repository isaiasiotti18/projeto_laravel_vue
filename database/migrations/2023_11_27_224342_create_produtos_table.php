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
          $table->string('nome', 100);
          $table->text('descricao')->nullable();
          $table->integer('peso')->default(0);
          $table->float('preco_venda', 8, 2)->default(0);
          $table->integer('estoque_minimo')->default(0);
          $table->integer('estoque_maximo');
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
