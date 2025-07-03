<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('code', 100)->nullable(); // Código del evento
            $table->string('name', 155)->nullable(); // Nombre del evento
            $table->string('address', 255)->nullable(); // Dirección del evento
            $table->string('country', 100)->nullable(); // Pais
            $table->string('city', 100)->nullable(); // Ciudad del evento
            $table->string('type_id', 11)->nullable(); // ID del tipo de evento
            $table->string('resolution_code', 100)->nullable(); // Código de resolución del evento
            $table->date('start_date')->nullable(); // Fecha de inicio del evento
            $table->date('end_date')->nullable(); // Fecha de fin del evento
            $table->string('open_file')->nullable(); // Ruta del PDF de apertura del evento
            $table->string('close_file')->nullable(); // Ruta del PDF de cierre del evento
            $table->time('start_time')->nullable(); // Hora de inicio del evento
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
