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
        Schema::create('documents_projets', function (Blueprint $table) {

            $table->id();

            $table->uuid('projet_id')->index();
            $table->foreign('projet_id')->references('id')->on('projets')->onDelete('cascade');

            $table->string('path_document');

            $table->string('nom');
            $table->string('extension');
            $table->string('taille');

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
        Schema::dropIfExists('documents_projets');
    }
};
