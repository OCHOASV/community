<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taggables', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('tag_id');

            /* Este metodo creara 2 campos, el id del usuario y la entidad, evitamos crearlo nosotros mismos en la tabla */
            $table->morphs('taggable');

            $table->timestamps();

            $table->foreign('tag_id')->references('id')->on('tags')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taggables');
    }
};
