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
        Schema::create('transacao', function (Blueprint $table) {
            $table->id();
            $table->integer('numero_conta');
            $table->decimal('valor', 10, 2);
            $table->string('forma_pagamento');
            $table->decimal('taxa', 10, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transacao');
    }
};
