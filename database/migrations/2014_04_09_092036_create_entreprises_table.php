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
        Schema::create('entreprises', function (Blueprint $table) {
           # $table->id();
           $table->uuid('id')->primary();
            $table->string('nom');
            $table->string('email')->unique();
            $table->string('telephone')->unique();
            $table->string('pays');
            $table->string('devise')->nullable();
            $table->integer('nombreProjets')->nullable();
            $table->integer('nombreEmployes')->nullable();
            $table->integer('nombreDossiers')->nullable();
            $table->foreignId('type_entreprise_id')->nullable();
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
        Schema::dropIfExists('entreprises');
    }
};
