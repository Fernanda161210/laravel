<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('administrador', function (Blueprint $table) {
            $table->id();

            $table->string('nome');
            $table->string('email');
            $table->string('telefone', 20);
            $table->string('cpf', 14);
            $table->string('usuario');
            $table->string('senha');
            $table->string('status', 50);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('administrador');
    }
};