<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioRolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_rol', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('estado');

            $table->unsignedInteger('rol_id');
            $table->foreign('rol_id','fk_usuariorol_rol')->references('id')->on('rol')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedInteger('usuario_id');
            $table->foreign('usuario_id','fk_usuariorol_usuario')->references('id')->on('usuario')->onDelete('restrict')->onUpdate('restrict');
            
            $table->timestamps();

            $table->charset = 'utf8mb4';
            $table->collation='utf8mb4_spanish_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario_rol');
    }
}
