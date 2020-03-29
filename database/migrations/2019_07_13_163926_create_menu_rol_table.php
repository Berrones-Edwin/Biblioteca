<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuRolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_rol', function (Blueprint $table) {
            $table->bigIncrements('id');


            $table->unsignedBigInteger('rol_id');
            $table->foreign('rol_id', 'fk_menurol_rol')->references('id')->on('rol')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('menu_id');
            $table->foreign('menu_id', 'fk_menurol_menu')->references('id')->on('menu')->onDelete('restrict')->onUpdate('restrict');


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
        Schema::dropIfExists('menu_rol');
    }
}
