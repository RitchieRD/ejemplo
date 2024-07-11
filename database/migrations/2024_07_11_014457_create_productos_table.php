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
        $this->down();
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('producto', 200);
            $table->unsignedBigInteger('marca_id');
            $table->unsignedBigInteger('tipo_id');
            $table->decimal('precio')->default(0);
            $table->decimal('cantidad')->default(0);
            $table->timestamps();

            $table->foreign('marca_id')->references('id')->on('producto_marcas');
            $table->foreign('tipo_id')->references('id')->on('producto_tipos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();  //Deshabilita la revisión
        Schema::dropIfExists('productos');
        Schema::enableForeignKeyConstraints();  //Habilitar la revisión
    }
};
