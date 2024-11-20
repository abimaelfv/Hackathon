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
        Schema::create('inscripciones', function (Blueprint $table) {
            $table->bigIncrements('ins_id');
            $table->string('ins_equipo')->nullable();
            $table->string('ins_categoria', 20)->nullable();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->integer('ins_estado')->unsigned()->default(2); // 2 = Pendiente / 1 = Confirmado
            $table->timestamp('ins_fecha')->nullable();
            $table->timestamp('ins_created')->useCurrent();
            $table->timestamp('ins_updated')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscripciones');
    }
};
