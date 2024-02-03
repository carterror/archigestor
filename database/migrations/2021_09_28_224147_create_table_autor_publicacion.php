<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableAutorPublicacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autor_publicacion', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('autor_id')->nullable();
            $table->foreign('autor_id')->references('id')->on('autors')->onUpdate('cascade')->onDelete('cascade');
            
            $table->bigInteger('publicacion_id')->nullable();
            $table->foreign('publicacion_id')->references('id')->on('publicacions')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('autor_publicacion');
    }
}
