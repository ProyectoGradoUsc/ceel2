<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->increments('id');     
            $table->string('codigo')->unique();
            $table->string('NomServicio');
            $table->integer('IdServicio');
            $table->integer('IdTema');
            $table->integer('IdResponsable');
            $table->string('NomSolicitante');
            $table->integer('cupo');
            $table->boolean('ponencia');
            $table->string('ubicacion');
            $table->string('salon');
            $table->date('fechaCurso');
            $table->time('HoraInicioCurso');
            $table->time('HoraFinCurso');
            $table->string('descripcion');
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
        Schema::dropIfExists('cursos');
    }
}
