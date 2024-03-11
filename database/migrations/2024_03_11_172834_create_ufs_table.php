<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUfsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() // Este método se ejecuta al aplicar la migración para crear la tabla.
    {
        Schema::create('ufs', function (Blueprint $table) { // Crea una nueva tabla llamada 'ufs'.
            $table->id(); // Agrega un campo autoincremental 'id' a la tabla.
            $table->string('fecha'); // Agrega un campo 'fecha' de tipo cadena (string) a la tabla.
            $table->decimal('valor', 10, 2); // Agrega un campo 'valor' de tipo decimal a la tabla con una precisión de 10 dígitos y 2 decimales.
            $table->timestamps(); // Agrega automáticamente los campos 'created_at' y 'updated_at' para mantener las marcas de tiempo de creación y actualización de los registros.
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ufs');
    }
}
