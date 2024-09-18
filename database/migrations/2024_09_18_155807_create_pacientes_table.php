<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string(column: 'correo', length: 100)->unique(true)->nullable(false);
            $table->string(column: 'primer_nombre', length: 100)->nullable(false);
            $table->string(column: 'segundo_nombre', length: 100)->nullable(true);
            $table->string(column: 'paterno', length: 100)->nullable(false);
            $table->string(column: 'materno', length: 100)->nullable(true);
            $table->date(column: 'fecha_nacimiento')->nullable(true);
            $table->string(column: 'numero', length: 15)->nullable(true);
            $table->boolean(column: 'estado')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
