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
        Schema::create('integrantes', function (Blueprint $table) {
            $table->bigIncrements('int_id');
            $table->foreignId('ins_id')->references('ins_id')->on('inscripciones');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->integer('int_estado')->unsigned()->default(1);
            $table->timestamp('int_created')->useCurrent();
            $table->timestamp('int_updated')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('integrantes');
    }
};
