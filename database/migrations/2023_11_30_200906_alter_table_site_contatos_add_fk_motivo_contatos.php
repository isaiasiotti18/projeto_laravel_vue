<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
      Schema::table('site_contatos', function (Blueprint $table) {
        $table->unsignedBigInteger('motivo_contatos_id')->after('id');
      });

      //Executar um SQL dentro do banco de dados da conexão
      DB::statement('update site_contatos set motivo_contatos_id = motivo_contato');

      // Criando fk
      Schema::table('site_contatos', function (Blueprint $table) {
        $table->foreign('motivo_contatos_id')->references('id')->on('motivo_contatos');
        $table->dropColumn('motivo_contato');
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
      Schema::table('site_contatos', function (Blueprint $table) {
        $table->integer('motivo_contato');
        $table->dropForeign('site_contatos_motivo_contatos_id_foreign');
      });

      DB::statement('update site_contatos set motivo_contato = motivo_contatos_id');

      Schema::table('site_contatos', function (Blueprint $table) {
        $table->dropColumn('motivo_contatos_id');
      });
    }
};
