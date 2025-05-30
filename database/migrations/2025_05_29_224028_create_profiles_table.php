<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name', 155)->nullable(); // Nombre
            $table->string('last_name', 155)->nullable(); // Apellido
            $table->string('dni')->nullable(); // Cédula
            $table->string('phone', 20)->nullable(); // Teléfono
            $table->string('address', 255)->nullable(); // Dirección
            $table->string('city', 100)->nullable(); // Ciudad
            $table->string('state', 100)->nullable(); // Estado/Provincia
            $table->string('country', 100)->nullable(); // País
            $table->string('postal_code', 20)->nullable();  // Código Postal
            $table->date('birthdate')->nullable(); // Fecha de nacimiento
            $table->boolean('status')->default(false); // Estado del perfil
            $table->string('user_id', 11)->nullable(); // ID del usuario asociado
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
        Schema::dropIfExists('profiles');
    }
}
