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
        Schema::create('infos_personnelles', function (Blueprint $table) {
           # $table->id();
           $table->uuid('id')->primary();
          #  $table->foreignId('user_id')->constrained();
          $table->uuid('user_id')->index();
          $table->foreign('user_id')->references('id')->on('projets')->onDelete('cascade');

            $table->string('date_de_naissance')->nullable();
            $table->string('adresse')->nullable();
            $table->string('genre')->nullable();
            $table->string('numero_ifu')->nullable();
            $table->string('nationalite')->nullable();
            $table->string('religion')->nullable();
            $table->string('etat_civil')->nullable();
            $table->string('age_actuel')->nullable();
            $table->string('n_compte_bancaire')->nullable();
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
        //
    }
};
