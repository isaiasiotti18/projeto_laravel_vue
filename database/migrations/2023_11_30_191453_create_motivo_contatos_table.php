<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\MotivoContato;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('motivo_contatos', function (Blueprint $table) {
            $table->id();
            $table->string('motivo_contato', 15);
            $table->timestamps();
        });

        MotivoContato::create(["motivo_contato" => "Dúvida"]);
        MotivoContato::create(["motivo_contato" => "Reclamação"]);
        MotivoContato::create(["motivo_contato" => "Elógio"]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('motivo_contatos');
    }
};
