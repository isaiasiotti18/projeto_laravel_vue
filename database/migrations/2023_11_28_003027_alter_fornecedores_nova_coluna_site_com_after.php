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
      Schema::table("fornecedores", function (Blueprint $table) {
        $table->string("nome", 150)->after('id');
        $table->string("site", 150)->after('nome')->nullable()->default('');
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
      Schema::table("fornecedores", function (Blueprint $table) {
        $table->dropColumn("site");
      });
    }
};