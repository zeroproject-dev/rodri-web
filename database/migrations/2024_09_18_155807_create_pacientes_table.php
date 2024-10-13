<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });

        Schema::create('sesiones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paciente_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->date('fecha')->nullable(false);
            $table->string('tipo')->nullable(true);
            $table->text('notas')->nullable(true);
            $table->text('sintomas')->nullable(true);
            $table->time('hora_inicio')->nulleable(false);
            $table->time('hora_fin')->nullable(true);
            $table->integer('duracion_segundos')->nullable(true);
            $table->timestamps();
        });

        Schema::create('estadisticas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sesion_id')->constrained('sesiones', 'id')->cascadeOnDelete();
            $table->string('nombre');
            $table->json('valor')->nullable(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pacientes');
        Schema::dropIfExists('sesiones');
        Schema::dropIfExists('estadisticas');
    }
};
