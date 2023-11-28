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
        Schema::create('exhibiciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion');
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->string('ubicacion');
            $table->string('presentador'); // Cuidador o presentador
            $table->string('especie'); // especie que participa
            $table->integer('capacidad_maxima');
            $table->date('fecha_exhibicion');
            $table->string('category_id'); // Educativa, Interactiva, Tematica
            $table->decimal('costo_entrada', 8, 2);
            $table->timestamps();
        });
    }

    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exhibiciones');
    }
};

class AddCategoryIdToExhibitionsTable extends Migration
{
    public function up()
    {
        Schema::table('exhibiciones', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    public function down()
    {
        Schema::table('exhibiciones', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });
    }
}
