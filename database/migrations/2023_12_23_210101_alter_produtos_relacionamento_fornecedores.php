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
      Schema::table('produtos', function(Blueprint $table) {

        $fornecedorId = DB::table('fornecedores')->insertGetId([
          'nome' => "Fornecedor Padrão",
          'site' => "padraofornecedor.com.br",
          'uf' => "PF",
          'email' => "padrao@fornecedor.com"
        ]);

        $table->unsignedBigInteger('fornecedor_id')->default($fornecedorId)->after('id');
        $table->foreign('fornecedor_id')->references('id')->on('fornecedores');
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
      Schema::table('produtos', function(Blueprint $table) {
        $table->dropForeign('produtos_fornecedor_id_foreign');
        $table->dropColumn('fornecedor_id');
      });
    }
};
