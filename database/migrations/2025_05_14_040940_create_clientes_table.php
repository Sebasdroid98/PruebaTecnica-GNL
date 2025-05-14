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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('identificacion', 15)->unique();
            $table->string('nombres', 45);
            $table->string('apellidos', 45);
            $table->string('celular', 15);
            $table->string('correo', 100);
            $table->boolean('habeas_data')->default(true);

            $table->unsignedBigInteger('municipio_id');
            $table->foreign('municipio_id')
                ->references('id')
                ->on('municipios')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
