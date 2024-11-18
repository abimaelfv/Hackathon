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
        Schema::create('personas', function (Blueprint $table) {
            $table->bigIncrements('per_id');
            $table->string('per_documento', 20)->nullable();
            $table->string('per_codigo', 20)->nullable();
            $table->string('per_nombres')->nullable();
            $table->string('per_apellidos')->nullable();
            $table->string('per_email')->nullable();
            $table->string('per_telefono')->nullable();
            $table->string('per_genero')->nullable();
            $table->integer('per_estado')->unsigned()->default(1);
            $table->timestamp('per_created')->useCurrent();
            $table->timestamp('per_updated')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};
