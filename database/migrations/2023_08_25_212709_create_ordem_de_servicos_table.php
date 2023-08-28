<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('ordem_de_servicos', function (Blueprint $table) {
            $table->id();
            $table->string('nome_tecnico');
            $table->date('data_solicitacao');
            $table->date('prazo_atendimento');
            $table->string('endereco_atendimento');
            $table->string('status');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('ordem_de_servicos');
    }
};
